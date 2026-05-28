-- =============================================================
-- Eventra schema for Supabase / Postgres
-- Paste this into Supabase  ->  SQL Editor  ->  New query  ->  Run.
-- It creates every table the app uses and inserts the seed events.
-- Safe to re-run: every CREATE uses IF NOT EXISTS.
-- =============================================================

-- Categories table is implicit (type_id 1..4):
--   1 = Technical, 2 = Gaming, 3 = On-Stage, 4 = Off-Stage

CREATE TABLE IF NOT EXISTS events (
    event_id      integer PRIMARY KEY,
    event_title   varchar(80) NOT NULL,
    event_price   integer DEFAULT 0,
    participents  integer DEFAULT 0,
    img_link      text,
    type_id       integer
);

CREATE TABLE IF NOT EXISTS event_info (
    event_id   integer PRIMARY KEY REFERENCES events(event_id) ON DELETE CASCADE,
    "Date"     date,
    "time"     varchar(40),
    location   varchar(120)
);

CREATE TABLE IF NOT EXISTS student_coordinator (
    sid        serial PRIMARY KEY,
    st_name    varchar(80),
    phone      varchar(20),
    event_id   integer REFERENCES events(event_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS staff_coordinator (
    stid       serial PRIMARY KEY,
    name       varchar(80),
    phone      varchar(20),
    event_id   integer REFERENCES events(event_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS participent (
    usn        varchar(40) PRIMARY KEY,
    name       varchar(80),
    branch     varchar(40),
    sem        integer,
    email      varchar(120),
    phone      varchar(20),
    college    varchar(120)
);

CREATE TABLE IF NOT EXISTS registered (
    id         serial PRIMARY KEY,
    usn        varchar(40) REFERENCES participent(usn) ON DELETE CASCADE,
    event_id   integer    REFERENCES events(event_id) ON DELETE CASCADE,
    UNIQUE (usn, event_id)
);

-- ---- Seed events (mirrors cems.sql, but with Unsplash CDN images) ----

INSERT INTO events (event_id, event_title, event_price, participents, img_link, type_id) VALUES
(1,  'Cryptohunt',           100, 0, 'https://images.unsplash.com/photo-1639762681485-074b7f938ba0?auto=format&fit=crop&w=900&q=80', 1),
(2,  'Search-it',              50, 2, 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80', 1),
(3,  'Technical-Quiz',         50, 2, 'https://images.unsplash.com/photo-1606326608606-aa0b62935f2b?auto=format&fit=crop&w=900&q=80', 1),
(4,  'Competitive-Coding',     50, 1, 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=900&q=80', 1),
(5,  'Pubg',                   50, 1, 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=900&q=80', 2),
(6,  'Counter-Strike',        100, 1, 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=900&q=80', 2),
(7,  'Fashion-Show',          200, 1, 'https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=900&q=80', 3),
(8,  'Dance',                 100, 0, 'https://images.unsplash.com/photo-1504609813442-a8924e83f76e?auto=format&fit=crop&w=900&q=80', 3),
(9,  'Singing',                50, 0, 'https://images.unsplash.com/photo-1499415479124-43c32433a620?auto=format&fit=crop&w=900&q=80', 3),
(10, 'Svit-Idol',             100, 0, 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?auto=format&fit=crop&w=900&q=80', 3),
(11, 'Cooking-Without-Fire',   50, 0, 'https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=900&q=80', 4),
(12, 'Short-Movie',           200, 0, 'https://images.unsplash.com/photo-1485846234645-a62644f84728?auto=format&fit=crop&w=900&q=80', 4),
(13, 'Mehandi',               100, 0, 'https://images.unsplash.com/photo-1610208440447-32a4dad94e5d?auto=format&fit=crop&w=900&q=80', 4),
(14, 'Rangoli',                50, 0, 'https://images.unsplash.com/photo-1604423043492-41303fc645f3?auto=format&fit=crop&w=900&q=80', 4)
ON CONFLICT (event_id) DO NOTHING;

INSERT INTO event_info (event_id, "Date", "time", location) VALUES
(1,  CURRENT_DATE + 21, '10:00 AM', 'Main Auditorium, Block A'),
(2,  CURRENT_DATE + 22, '11:00 AM', 'Seminar Hall 1'),
(3,  CURRENT_DATE + 23, '02:00 PM', 'Seminar Hall 2'),
(4,  CURRENT_DATE + 24, '10:00 AM', 'CS Lab 3'),
(5,  CURRENT_DATE + 21, '06:00 PM', 'Gaming Arena'),
(6,  CURRENT_DATE + 22, '06:00 PM', 'Gaming Arena'),
(7,  CURRENT_DATE + 25, '07:00 PM', 'Open Stage'),
(8,  CURRENT_DATE + 25, '08:00 PM', 'Open Stage'),
(9,  CURRENT_DATE + 26, '07:00 PM', 'Open Stage'),
(10, CURRENT_DATE + 27, '07:30 PM', 'Open Stage'),
(11, CURRENT_DATE + 24, '11:00 AM', 'Cafeteria'),
(12, CURRENT_DATE + 25, '04:00 PM', 'AV Hall'),
(13, CURRENT_DATE + 25, '10:00 AM', 'Cultural Block'),
(14, CURRENT_DATE + 26, '10:00 AM', 'Cultural Block')
ON CONFLICT (event_id) DO NOTHING;

INSERT INTO student_coordinator (st_name, phone, event_id) VALUES
('Priya Sharma',  '9876500001', 1),
('Rahul V.',      '9876500002', 2),
('Kavya M.',      '9876500003', 3),
('Aman J.',       '9876500004', 4),
('Sneha R.',      '9876500005', 5),
('Vikas D.',      '9876500006', 6),
('Aanya T.',      '9876500007', 7),
('Ishaan K.',     '9876500008', 8),
('Pooja N.',      '9876500009', 9),
('Rohan B.',      '9876500010', 10),
('Mahi G.',       '9876500011', 11),
('Tanmay S.',     '9876500012', 12),
('Riya P.',       '9876500013', 13),
('Anvi C.',       '9876500014', 14)
ON CONFLICT DO NOTHING;

INSERT INTO staff_coordinator (name, phone, event_id) VALUES
('Prof. Anita Rao',     '9000000001', 1),
('Prof. Suresh K.',     '9000000002', 2),
('Prof. Meena P.',      '9000000003', 3),
('Prof. Naveen J.',     '9000000004', 4),
('Prof. Rajesh M.',     '9000000005', 5),
('Prof. Lata S.',       '9000000006', 6),
('Prof. Divya R.',      '9000000007', 7),
('Prof. Karthik V.',    '9000000008', 8),
('Prof. Smitha A.',     '9000000009', 9),
('Prof. Anand B.',      '9000000010', 10),
('Prof. Vimala G.',     '9000000011', 11),
('Prof. Ashok L.',      '9000000012', 12),
('Prof. Nandini T.',    '9000000013', 13),
('Prof. Madhu C.',      '9000000014', 14)
ON CONFLICT DO NOTHING;

-- ---- Optional: Row-Level Security ----
-- For a quick start, leave RLS off (the service-role key bypasses it anyway).
-- For a real deployment, enable RLS and write SELECT/INSERT policies per role.
--
-- Example:
-- ALTER TABLE events ENABLE ROW LEVEL SECURITY;
-- CREATE POLICY "events_read_all" ON events FOR SELECT USING (true);
