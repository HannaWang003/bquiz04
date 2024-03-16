<?php
include_once "db.php";
$Bot->save($_POST);
to("../back.php?do=bot");
