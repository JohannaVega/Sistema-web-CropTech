<?php
require '../controlador/facade.php';

class Control{

    private $obj_facade;
   

    public function __construct(){
        $this->obj_control = new facade(); 
    }