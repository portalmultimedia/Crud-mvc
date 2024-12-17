<?php

class Producto extends Conectar
{
    public function get_producto()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_producto";
        $sql = $conectar->prepare($sql);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function get_producto_x_id($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function delete_producto($prod_id)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE tm_producto SET est=0, fecha_eli=now() WHERE prod_id =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function insert_producto($prod_nombre)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "INSERT INTO tm_producto (prod_id, prod_nombre, fecha_crea, fecha_mod, fecha_eli, estado) VALUES (NULL, ?, now(), NULL, NULL, 1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }

    public function update_producto($prod_id, $prod_nombre)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $sql = "UPDATE tm_producto SET prod_nom=?, fecha_mod=now() WHERE prod_id =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $prod_nombre);
        $sql->bindValue(2, $prod_id);
        $sql->execute();

        return $resultado = $sql->fetchAll();
    }
}
