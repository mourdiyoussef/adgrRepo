<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:57
 */
include_once('modeles\donneur.php');
include_once('dao\donneurdao.php');

$dDao = new DonneurDAO();


$donn = new Donneur();
$donn->setNom("Josef");

//$dDao->delDonneur(2);
$dDao->addDonneur($donn);

?>