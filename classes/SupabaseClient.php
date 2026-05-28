<?php
/**
 * Thin PostgREST client for Supabase. Uses curl. No external deps.
 *
 * Usage:
 *   $sb = SupabaseClient::fromSettings();
 *   $events = $sb->select('events', ['type_id' => 'eq.1']);
 *   $sb->insert('participent', ['usn' => '1XX', 'name' => 'Aashish']);
 *   $sb->update('events', ['event_id' => 'eq.5'], ['event_price' => 100]);
 *   $sb->delete('events', ['event_id' => 'eq.5']);
 *   list($ok, $msg) = $sb->ping();
 */
class SupabaseClient
{
    public  $url;
    private $key;
    public  $last_error = '';
    public  $last_status = 0;

    public function __construct($url, $key)
    {
        $this->url = rtrim((string)$url, '/');
        $this->key = (string)$key;
    }

    public static function fromSettings($preferServiceKey = true)
    {
        if (!class_exists('Settings')) require_once __DIR__ . '/Settings.php';
        $url     = Settings::get('supabase_url');
        $service = Settings::get('supabase_service');
        $anon    = Settings::get('supabase_anon');
        $key = $preferServiceKey ? ($service ?: $anon) : ($anon ?: $service);
        if (!$url || !$key) return null;
        return new self($url, $key);
    }

    public function isAvailable()
    {
        return function_exists('curl_init') && $this->url && $this->key;
    }

    /**
     * Quick connectivity / auth check. Hits /rest/v1/ which returns metadata.
     * Returns [bool $ok, string $message].
     */
    public function ping()
    {
        if (!function_exists('curl_init')) return [false, 'PHP curl extension is not available.'];
        $r = $this->request('GET', '/rest/v1/', null, [], false);
        if ($r === null) return [false, $this->last_error ?: 'Network error'];
        if ($this->last_status >= 200 && $this->last_status < 400) return [true, 'Connected — HTTP ' . $this->last_status];
        return [false, 'HTTP ' . $this->last_status . ' — check URL and key.'];
    }

    public function select($table, array $filters = [], $select = '*', $order = null, $limit = null)
    {
        $qs = ['select' => $select];
        foreach ($filters as $col => $expr) { $qs[$col] = $expr; }
        if ($order) $qs['order'] = $order;
        if ($limit) $qs['limit'] = $limit;
        $path = '/rest/v1/' . rawurlencode($table) . '?' . http_build_query($qs);
        $body = $this->request('GET', $path);
        return is_array($body) ? $body : [];
    }

    public function insert($table, array $row)
    {
        $path = '/rest/v1/' . rawurlencode($table);
        return $this->request('POST', $path, [$row], ['Prefer: return=representation']);
    }

    public function update($table, array $filters, array $patch)
    {
        $qs = [];
        foreach ($filters as $col => $expr) { $qs[$col] = $expr; }
        $path = '/rest/v1/' . rawurlencode($table) . '?' . http_build_query($qs);
        return $this->request('PATCH', $path, $patch, ['Prefer: return=representation']);
    }

    public function delete($table, array $filters)
    {
        $qs = [];
        foreach ($filters as $col => $expr) { $qs[$col] = $expr; }
        $path = '/rest/v1/' . rawurlencode($table) . '?' . http_build_query($qs);
        return $this->request('DELETE', $path);
    }

    private function request($method, $path, $body = null, array $extraHeaders = [], $decodeJson = true)
    {
        $this->last_error  = '';
        $this->last_status = 0;
        $ch = curl_init($this->url . $path);
        $headers = array_merge([
            'apikey: ' . $this->key,
            'Authorization: Bearer ' . $this->key,
            'Content-Type: application/json',
            'Accept: application/json',
        ], $extraHeaders);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_CONNECTTIMEOUT => 8,
            CURLOPT_TIMEOUT        => 20,
        ]);
        if ($body !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
        $resp = curl_exec($ch);
        if ($resp === false) {
            $this->last_error = curl_error($ch);
            curl_close($ch);
            return null;
        }
        $this->last_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if (!$decodeJson) return $resp;
        $decoded = json_decode($resp, true);
        return $decoded;
    }
}
