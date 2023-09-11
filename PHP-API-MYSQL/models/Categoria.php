<?php

class Categoria extends Conectar
{
    /////Para hacer un GET
    public function get_categoria()
    {
        $conectar = parent::conexion();
    
        parent::st_name();
    
        $sql = "SELECT * FROM tm_categoria WHERE est=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
    
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    ///CONSULTA Tipo SQL por ID
    public function get_categoria_per_ID($cat_id)
    {
        $conectar = parent::conexion();
        parent::st_name();
        $sql = "SELECT * FROM tm_categoria WHERE est=1 AND cat_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
    
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //// Para INSERTAR CATEGORIA en la BD
    public function insert_categoria($cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::st_name();
        $sql = "INSERT INTO tm_categoria(cat_id, cat_nom, cat_obs, est) VALUES(NULL, ?, ?, '1')";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->execute();
    
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    /////////UPDATE CATEGORIA
    public function update_categoria($cat_id, $cat_nom, $cat_obs)
    {
        $conectar = parent::conexion();
        parent::st_name();
        $sql = "UPDATE tm_categoria set cat_nom=? , cat_obs=? WHERE cat_id=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_obs);
        $sql->bindValue(3, $cat_id);
        $sql->execute();
    
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

     /////////DELETE CATEGORIA
     public function delete_categoria($cat_id)
     {
         $conectar = parent::conexion();
         parent::st_name();
         $sql = "UPDATE tm_categoria set est='0' WHERE cat_id=?";
         $sql = $conectar->prepare($sql);
         $sql->bindValue(1, $cat_id);
         $sql->execute();
         return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
     }



}


?>