<?php 
session_start();
$arrayData = json_decode($_POST['current_order']);
$_SESSION['current_order'] = $arrayData;
?>