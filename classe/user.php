<?php

class user{

    //Propiétés
    private $_iduser;
    private $_username;
    private $_type;
    private $_password;

    public function __construct($leid, $leusername,$letype,$lepassword)
    {
        $this->_iduser = $leid;
        $this->_username = $leusername;
        $this->_type = $letype;
        $this->_password = $lepassword;
    }

    public function afficheruser()
    {
        echo '<p>Ton pseudo est ' . $this->_username. '</p>';
        echo '<p>Son id est ' . $this->_iduser . '</p>';
    }

    public function supprimerUser(){
        $this->_id = "";
        $this->_username = "";
       
    }
    
    public function getIdUser(){
        return $this->_iduser;
    }
    
    public function getUsername(){
        return $this->_username;
    }

    public function getType(){
        return $this->_type;
    }
    
    public function getPassword(){
        return $this->_password;
    
    }

    public function log($iduser,$username,$password)
    {
        $this->_iduser = $iduser;
        $this->_username = $username;
        $this->_password = $password;
        
    }

}

?>