<?php
// Eventra DB bootstrap. Reads connection details from Settings so the admin Settings page can change them.
require_once __DIR__ . '/Settings.php';
require_once __DIR__ . '/SupabaseClient.php';

$servername = Settings::get('mysql_host', 'localhost');
$username   = Settings::get('mysql_user', 'root');
$password   = Settings::get('mysql_pass', '');
$dbname     = Settings::get('mysql_db',   'cems');

$db_offline    = false;
$db_last_error = "";
$conn          = null;
$supabase      = null;
$use_supabase  = Settings::isSupabaseReady();

if ($use_supabase) {
    $supabase = SupabaseClient::fromSettings();
    if (!$supabase || !$supabase->isAvailable()) {
        $db_offline    = true;
        $db_last_error = "Supabase is enabled but the client could not initialise (check PHP curl + saved keys).";
    }
} else {
    if (!class_exists('mysqli')) {
        $db_offline    = true;
        $db_last_error = "PHP mysqli extension is not enabled in this install.";
    } else {
        if (function_exists('mysqli_report')) { @mysqli_report(MYSQLI_REPORT_OFF); }
        $conn = @new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            $db_offline    = true;
            $db_last_error = $conn->connect_error;
            $conn          = null;
        }
    }
}

/**
 * Friendly offline banner. Adapts message to which backend is selected.
 */
function db_offline_banner($error = "") {
    $using_sb = Settings::isSupabaseReady();
    $title = $using_sb
        ? "Supabase not reachable."
        : "Database not connected.";
    $how = $using_sb
        ? "Verify your Supabase project URL + keys on the <a href=\"settings.php\"><b>Settings page</b></a>, and that the PHP curl extension is enabled."
        : "This page needs MySQL/MariaDB with the <code>cems</code> database imported from <code>cems.sql</code>, OR switch to Supabase on the <a href=\"settings.php\"><b>Settings page</b></a>.";
    $err = $error ? '<div class="mt-2 small" style="color:#7c2d12;opacity:.8;">Details: '.htmlspecialchars($error).'</div>' : '';
    return '<div class="banner-warn">'
         . '<i class="bi bi-database-exclamation fs-4"></i>'
         . '<div><b>' . $title . '</b> ' . $how . $err . '</div></div>';
}
