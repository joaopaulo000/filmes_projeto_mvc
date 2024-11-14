<?php
    class Connect{
        public function __construct(protected $db = null) {
            try {
                $address = 'mysql:host=localhost;dbname=midiasDB;';
                $this->db = new PDO($address, 'root', ''); 
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
            }
        }
    }
?>