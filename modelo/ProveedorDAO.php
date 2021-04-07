<?php

require_once("../class/conexion_db.php");

class ProveedorDAO extends Conectar{
    private $proveedores;
    
    //constructor, inicializamos la variable proveedores
    public function __construct(){
        $this->proveedores=array();
    }

    //Leemos todos los proveedores registrados
    public function readall(){  //read

        $sql="select * from proveedor";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }
    //Insertamos proveedor
    public function insert($idu,$name_shop,$address,$address_web,$descripcion){

        $sql="insert into proveedor(nombre_establecimiento,direccion_fisica,direccion_web,descripcion_tienda,id_usuario)
        values('$name_shop','$address','$address_web','$descripcion','$idu')";

        $resul=mysqli_query($this->con(),$sql);

         return $resul;
    }

    //actualizamos tienda de  proveedor
    public function update($idp,$name_shop,$address,$address_web,$descripcion){

        $sql="update proveedor set nombre_establecimiento='$name_shop', direccion_fisica='$address',
            direccion_web='$address_web', descripcion_tienda='$descripcion'
            where id_proveedor=$idp";

        $resul=mysqli_query($this->con(),$sql);

         return $resul;
    }

    //Insertamos categoría a tienda de proveedor
    public function insert_categoria_pro($id_proveedor,$categoria){
        
        $sql="insert into categorias_proveedor(id_proveedor,id_tipo_categoria)
        values('$id_proveedor','$categoria')";

        $resul=mysqli_query($this->con(),$sql);
        return $resul;
    }

    public function read_categorias_byProv($id_proveedor,$categoria){
        $sql="select * from categorias_proveedor 
            where id_proveedor=$id_proveedor and id_tipo_categoria=$categoria";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

    //Leemos las categorias de tiendas
    public function read_categorias(){
        $sql="select * from categoria_shop";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

    //leemos las tiendas que tiene un proveedor
    public function read_tiendas_user($idu){

        $sql="select p.id_proveedor, p.nombre_establecimiento, p.direccion_fisica, p.direccion_web,
        p.descripcion_tienda, t.telefono_usuario, p.id_usuario
        from proveedor p
        INNER JOIN usuario u on  p.id_usuario = u.id_usuario
        INNER JOIN no_telefonos_usuario t on  p.id_usuario = t.id_usuario
         where p.id_usuario=$idu";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

    //Leemos la información de la tienda de un proveedor
    public function read_tienda_u($idu){

        $sql="select * from proveedor where id_usuario=$idu";

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;

    }

}

?>