<?php

class Conectar
{
    protected $dbhost;
    protected function Conexion()
    {
        try {
            $conectar = $this->dbhost = new PDO("mysql:local=localhost;dbname=crud_mvc", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "!Error DB: " . $e->getMessage() . "<br>";
            die();
        }
    }

    public function set_names()
    {
        return $this->dbhost->query("SET NAMES 'utf8'");
    }
}
