<?php
require 'Dbase.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: inscription.php");
