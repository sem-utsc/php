<?php
session_start();

// Check if a session is active
if (session_status() === PHP_SESSION_ACTIVE) {
    // Get the session ID
    $sessionId = session_id();

    // Validate the session token
    if ($sessionId === $_SESSION['token']) {
        // Session token is valid
        echo "Session token is valid.";
    } else {
        // Session token is invalid
        echo "Session token is invalid. $sessionId !== ".$_SESSION['token'];
    }
} else {
    // No active session
    echo "No active session.";
}
?>

<H1>Es el dashboard</H1>