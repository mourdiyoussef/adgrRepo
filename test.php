<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:57
 */
include_once('utils\switchDate.php');
include_once('modeles\donneur.php');
include_once('dao\donneurdao.php');
include_once('metier\donneurcontroller.php');

$dDao = new DonneurDAO();

    $ctrl = new DonneurController();
$oneg = $ctrl->getNbreAllDonneurByCollecte(4);
    echo $oneg;

//echo $t;
?>
