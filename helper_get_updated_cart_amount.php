<?php
// Start the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('function.php');

// Start output buffering
ob_start();
echo $item_count;
?>


<?php
// End output buffering and echo the content
echo ob_get_clean();
?>