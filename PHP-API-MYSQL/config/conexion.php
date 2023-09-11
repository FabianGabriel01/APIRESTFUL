<?php

class Conectar
{
    protected $dbh;

    protected function Conexion()
    {
        try
        {
            $conectar = $this->dbh=new PDO("mysql:local=localhost;dbname=php-api" , "root", "");
            return $conectar;
        }
        catch(Exception $e)
        {
            print "!error DB: " .$e->getMessage()."<br/>";

            die();
        }        
    }

    public function st_name()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
        
    }
    
}

?>