<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:57
 */
include_once('entities\donneur.php');
include_once('dao\donneurdao.php');

$donn = new Donneur();
$donn->setNom("Josef");
$dDao = new DonneurDAO();
$dDao->delDonneur(2);
//$dDao->addDonneur($donn);


?>