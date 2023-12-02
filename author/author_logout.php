<?php
ob_start();
if (isset($_SESSION['author_id'])) {
    session_unset();
    session_destroy();
}
header("location: ../index.php");
ob_end_flush();
