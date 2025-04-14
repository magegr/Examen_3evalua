<?php
//Ejercicio 2 

class Lamp
{
    private $id;
    private $name;
    private $estado;
    private $modelo;
    private $potencia;
    private $zona;

    public function __construct($id , $name , $estado , $modelo , $potencia , $zona){
        $this->id = $id;
        $this->name = $name;
        $this->estado = $estado;
        $this->modelo = $modelo;
        $this->potencia = $potencia;
        $this->zona = $zona;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getPotencia(){
        return $this->potencia;
    }
    public function getZona(){
        return $this->zona;
    }
    public function setEstado($estado){
        $this->estado = $estado;
    }

}


?>