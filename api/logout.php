<?php
session_start();
if ($_GET['do'] == "mag") {
    unset($_SESSION['mag']);
}
if ($_GET['do'] == "mem") {
    unset($_SESSION['user']);
}
header("location:../index.php");
