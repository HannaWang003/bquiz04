<?php
include_once "db.php";
if (isset($_POST['qt'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
} else {
    ($_SESSION['cart'][$_POST['id']]) ?? 1;
}
// dd($_SESSION['cart']);