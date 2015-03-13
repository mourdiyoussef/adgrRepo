<?php
/**
 * User: youssef
 * Date: 13/02/2015
 * Time: 19:46
 */
session_start();
if(empty($_SESSION['login']))
    header("location:login.php");
?>