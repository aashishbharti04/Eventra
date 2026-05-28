<?php
/**
 * Single point of truth for reading events / coordinators / registrations.
 *
 * Routes every read through either Supabase (when Settings::isSupabaseReady() is true and
 * the global $supabase is connected) OR mysqli (the legacy path). Pages never have to
 * branch by backend — they just call EventStore methods and get back arrays of rows.
 *
 * Note: PostgREST in Supabase can return joined data via embedded selects like
 * `select=*,event_info(*),student_coordinator(*),staff_coordinator(*)`. We flatten the
 * result into the same shape that the old mysqli JOINs produced, so view templates don't
 * need to change.
 */
class EventStore
{
    /**
     * Events for a given type_id (category 1..4) with all join data flattened.
     * Returns an array of associative rows with keys:
     *   event_id, event_title, event_price, participents, img_link, type_id,
     *   Date, time, location, st_name (student coord), name (staff coord)
     */
    public static function eventsByCategory($type_id)
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline) return [];

        if ($supabase) {
            $rows = $supabase->select(
                'events',
                ['type_id' => 'eq.' . (int)$type_id],
                '*,event_info(*),student_coordinator(*),staff_coordinator(*)'
            );
            return self::flatten($rows);
        }

        if (!$conn) return [];
        $id  = (int)$type_id;
        $res = @mysqli_query(
            $conn,
            "SELECT * FROM events,event_info ef,student_coordinator s,staff_coordinator st
             WHERE type_id = $id
               AND ef.event_id = events.event_id
               AND s.event_id  = events.event_id
               AND st.event_id = events.event_id"
        );
        $out = [];
        if ($res) while ($r = mysqli_fetch_array($res)) { $out[] = $r; }
        return $out;
    }

    /** All events joined with coordinators + info (admin dashboard). */
    public static function allEventsJoined()
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline) return [];

        if ($supabase) {
            $rows = $supabase->select(
                'events',
                [],
                '*,event_info(*),student_coordinator(*),staff_coordinator(*)',
                'event_id.asc'
            );
            return self::flatten($rows);
        }

        if (!$conn) return [];
        $res = @mysqli_query(
            $conn,
            "SELECT * FROM staff_coordinator s ,event_info ef ,student_coordinator st,events e
             WHERE e.event_id = ef.event_id
               AND e.event_id = s.event_id
               AND e.event_id = st.event_id"
        );
        $out = [];
        if ($res) while ($r = mysqli_fetch_array($res)) { $out[] = $r; }
        return $out;
    }

    /** Count helper for the admin KPI cards. */
    public static function counts()
    {
        global $conn, $supabase, $db_offline;
        $z = ['events'=>0,'participants'=>0,'staff'=>0,'students'=>0];
        if ($db_offline) return $z;

        if ($supabase) {
            $z['events']       = count($supabase->select('events',              [], 'event_id'));
            $z['participants'] = count($supabase->select('participent',         [], 'usn'));
            $z['staff']        = count($supabase->select('staff_coordinator',   [], 'stid'));
            $z['students']     = count($supabase->select('student_coordinator', [], 'sid'));
            return $z;
        }

        if (!$conn) return $z;
        foreach (['events'=>'events','participent'=>'participants','staff_coordinator'=>'staff','student_coordinator'=>'students'] as $tbl => $k) {
            $r = @mysqli_query($conn, "SELECT COUNT(*) AS c FROM $tbl");
            if ($r) $z[$k] = (int)mysqli_fetch_assoc($r)['c'];
        }
        return $z;
    }

    /** Registered events for a given USN. */
    public static function registeredFor($usn)
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline || $usn === '') return [];

        if ($supabase) {
            $regs = $supabase->select('registered', ['usn' => 'eq.' . $usn], '*');
            $out = [];
            foreach ($regs as $reg) {
                $events = self::eventsByEventId($reg['event_id']);
                foreach ($events as $ev) { $out[] = $ev; }
            }
            return $out;
        }

        if (!$conn) return [];
        $usn_safe = mysqli_real_escape_string($conn, $usn);
        $res = @mysqli_query(
            $conn,
            "SELECT * FROM registered r,staff_coordinator s ,event_info ef ,student_coordinator st,events e
             WHERE e.event_id = ef.event_id
               AND e.event_id = s.event_id
               AND e.event_id = st.event_id
               AND r.usn = '$usn_safe'
               AND r.event_id = e.event_id"
        );
        $out = [];
        if ($res) while ($r = mysqli_fetch_array($res)) { $out[] = $r; }
        return $out;
    }

    /** All participants with their events (admin Students page). */
    public static function allParticipantsWithEvents()
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline) return [];

        if ($supabase) {
            $regs = $supabase->select('registered', [], '*,participent(*),events(*)');
            $out = [];
            foreach ($regs as $r) {
                $p = $r['participent'] ?? [];
                $e = $r['events']      ?? [];
                $out[] = array_merge($p, $e);
            }
            return $out;
        }

        if (!$conn) return [];
        $res = @mysqli_query($conn, "SELECT * FROM events,registered r ,participent p WHERE events.event_id=r.event_id and r.usn = p.usn order by event_title");
        $out = [];
        if ($res) while ($r = mysqli_fetch_array($res)) { $out[] = $r; }
        return $out;
    }

    /** Coordinator listings for the admin tables. */
    public static function studentCoordinators()
    {
        return self::coordinators('student_coordinator');
    }
    public static function staffCoordinators()
    {
        return self::coordinators('staff_coordinator');
    }
    private static function coordinators($table)
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline) return [];
        if ($supabase) {
            $rows = $supabase->select($table, [], '*,events(*)');
            $out = [];
            foreach ($rows as $r) {
                $e = $r['events'] ?? [];
                unset($r['events']);
                $out[] = array_merge($r, $e);
            }
            return $out;
        }
        if (!$conn) return [];
        $sql = ($table === 'student_coordinator')
            ? "SELECT * FROM student_coordinator s ,events e where e.event_id= s.event_id"
            : "SELECT * FROM staff_coordinator s ,events e where e.event_id= s.event_id";
        $res = @mysqli_query($conn, $sql);
        $out = [];
        if ($res) while ($r = mysqli_fetch_array($res)) { $out[] = $r; }
        return $out;
    }

    /** Delete an event (cascades through related tables). */
    public static function deleteEvent($event_id)
    {
        global $conn, $supabase, $db_offline;
        if ($db_offline) return false;

        if ($supabase) {
            // ON DELETE CASCADE in supabase_schema.sql takes care of the join tables.
            $supabase->delete('events', ['event_id' => 'eq.' . (int)$event_id]);
            return ($supabase->last_status >= 200 && $supabase->last_status < 300);
        }

        if (!$conn) return false;
        $id  = (int)$event_id;
        $sql = "delete from events where event_id='$id';"
             . "delete from event_info where event_id='$id';"
             . "delete from staff_coordinator where event_id='$id';"
             . "delete from student_coordinator where event_id='$id';"
             . "delete from registered where event_id='$id'";
        return $conn->multi_query($sql) === true;
    }

    // ---- private helpers ----

    /**
     * Flatten Supabase's nested embed shape into the legacy "joined row" shape
     * the existing views expect.
     */
    private static function flatten(array $rows)
    {
        $out = [];
        foreach ($rows as $row) {
            $base = $row;
            $info = $row['event_info']          ?? null;
            $stu  = $row['student_coordinator'] ?? null;
            $stf  = $row['staff_coordinator']   ?? null;
            unset($base['event_info'], $base['student_coordinator'], $base['staff_coordinator']);
            // event_info is a 1-to-1 record returned as object.
            if (is_array($info) && !isset($info[0])) {
                $base['Date']     = $info['Date']     ?? null;
                $base['time']     = $info['time']     ?? null;
                $base['location'] = $info['location'] ?? null;
            }
            // student/staff coordinator are 1-to-many; take first for the listing.
            if (is_array($stu) && isset($stu[0])) {
                $base['st_name'] = $stu[0]['st_name'] ?? null;
            }
            if (is_array($stf) && isset($stf[0])) {
                $base['name'] = $stf[0]['name'] ?? null;
            }
            $out[] = $base;
        }
        return $out;
    }

    private static function eventsByEventId($event_id)
    {
        global $supabase;
        $rows = $supabase->select(
            'events',
            ['event_id' => 'eq.' . (int)$event_id],
            '*,event_info(*),student_coordinator(*),staff_coordinator(*)'
        );
        return self::flatten($rows);
    }
}
