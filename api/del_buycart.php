<?php
include_once "db.php";
unset($_SESSION['cart'][$_GET['id']]);
to("../index.php?do=buycart");
