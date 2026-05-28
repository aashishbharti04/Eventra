<?php
require 'classes/db1.php';
require_once 'classes/EventStore.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($db_offline) {
    echo "<script>alert('Database not connected.'); window.location.href='adminPage.php';</script>";
    exit;
}

if (EventStore::deleteEvent($id)) {
    echo "<script>alert('Event deleted successfully'); window.location.href='adminPage.php';</script>";
} else {
    echo "<script>alert('Error deleting event.'); window.location.href='adminPage.php';</script>";
}
?>
