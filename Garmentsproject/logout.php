<?php session_start();
ob_start();
session_unset();
session_destroy();
header('Location: index.php'); ?>