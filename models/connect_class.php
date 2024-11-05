<?php
class Connect{
    public function __construct(protected $db=null){

        $address = 'mysql:host=localhost;dbname=midiasDB;';
        
        $this->db = new PDO($address, 'root', '');
    }
}
?>