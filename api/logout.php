<?php
session_start();
unset($_SESSION['mem'], $_SESSION['admin']);
header("location:../index.php");
