<?php
session_start();
unset($_SESSION['mag']);
header("location:../index.php");
