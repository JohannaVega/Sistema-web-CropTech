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

    //buscamos categoría de productos de una tienda en especifico
    public function read_categorias_byProv($id_proveedor,$categoria){
        $sql="select * from categorias_proveedor 
            where id_proveedor=$id_proveedor and id_tipo_categoria=$categoria";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }
    //Leemos categorías de productos de una tienda
    public function read_categorias_tienda($id_proveedor){
        $sql="select cs.name_categoria 
        from categorias_proveedor c
        INNER JOIN categoria_shop cs on  c.id_tipo_categoria = cs.id_tipo_categoria
            where id_proveedor=$id_proveedor";

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

    //leemos las tiendas que tiene un proveedor, buscando por id_usuario
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

    //Leemos la información de la tienda de un proveedor, buscando por id_usuario
    public function read_tienda_u($idu){

        $sql="select * from proveedor where id_usuario=$idu";

        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;

    }
   
    //leemos datos de tienda de un proveedor en especifico
    public function read_tienda_proveedor($idp){

        $sql="select p.id_proveedor, p.nombre_establecimiento, p.direccion_fisica, p.direccion_web,
        p.descripcion_tienda, t.telefono_usuario, p.id_usuario
        from proveedor p
        INNER JOIN usuario u on  p.id_usuario = u.id_usuario
        INNER JOIN no_telefonos_usuario t on  p.id_usuario = t.id_usuario
         where p.id_proveedor=$idp";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

    //leemos tiendas buscando por categoria
    public function read_tienda_categoria($idc){

        $sql="select p.id_proveedor, p.nombre_establecimiento, p.direccion_fisica, p.direccion_web,
        p.descripcion_tienda, p.id_usuario
        from categorias_proveedor c
            INNER JOIN proveedor p on c.id_proveedor = p.id_proveedor
            INNER JOIN usuario u on  p.id_usuario = u.id_usuario
        where c.id_tipo_categoria=$idc";
        
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;
    }

    //Leemos todas las tiendas registradas
    public function read_alltiendas(){
        $sql="select p.id_proveedor, p.nombre_establecimiento, p.direccion_fisica, p.direccion_web,
        p.descripcion_tienda, p.id_usuario
        from proveedor p
        INNER JOIN usuario u on  p.id_usuario = u.id_usuario";
        $resul=mysqli_query($this->con(),$sql);
        while($row=mysqli_fetch_assoc($resul)){
            $this->proveedores[]=$row;
        }
        return $this->proveedores;

    }

}

?>