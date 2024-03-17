<?php
include_once "db.php";
if (isset($_POST['qt']) && isset($_POST['id'])) {
    $_SESSION['cart'][$_POST['id']] = $_POST['qt'];
} elseif (isset($_POST['id'])) {
    $_SESSION['cart'][$_POST['id']] = 1;
}
dd($_SESSION['cart']);
