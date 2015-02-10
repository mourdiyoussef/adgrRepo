<?php
/**
 * User: youssef
 * Date: 09/02/2015
 * Time: 18:48
 */

class switchDate {
    function __construct(){   }

    /** change le format de la date vers celui de la base de donnée a savoir YYYY-MM-JJ **/
    public function formToDB($date){
        $date2 = explode("/",$date);
        $nouvelleDate = $date2[2]."-".$date2[1]."-".$date2[0];
        return $nouvelleDate;
    }
    /** change le format de la date vers JJ/MM/YYYY **/
    public function DBToForm($date){
        $date2 = explode("-",$date);
        $nouvelleDate = $date2[2]."/".$date2[1]."/".$date2[0];
        return $nouvelleDate;
    }

}