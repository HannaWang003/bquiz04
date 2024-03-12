<?php
session_start();
if (isset($_SESSION['mag'])) {
    unset($_SESSION['mag']);
}
if (isset($_SESSION['mem'])) {
    unset($_SESSION['mem']);
}
header("location:../index.php");
