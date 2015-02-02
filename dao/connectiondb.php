<?php
/**
 * User: youssef
 * Date: 02/02/2015
 * Time: 12:28
 */

class ConnectionDB {
    private $host;
    private $user;
    private $mdp;
    private $db;

    public function __construct()
    {
        $this->host = "localhost";
        $this->user = "root";
        $this->mdp = "";
        $this->db = "iirg1";
    }

    public function connect(){
        $bdd = mysqli_connect("localhost", "root", "", "iirg1");
        return $bdd;
    }

    public function close($db){
        mysqli_close($db);
    }


}

?>