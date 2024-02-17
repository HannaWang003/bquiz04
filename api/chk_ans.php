<?php
session_start();
echo ($_SESSION['ans'] == $_GET['ans']) ? 1 : 0;
