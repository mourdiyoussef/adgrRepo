<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:28
 */

class ConnectionDB {

    public function connect(){
        $bdd = mysqli_connect("localhost", "root", "", "adgr_db");
        return $bdd;
    }

    public function close($db){
        mysqli_close($db);
    }


}

?>