<?php

class auto
{
    private $patente;
    private $marca;
    private $modelo;
    private $objPersona; //referencia al objeto persona
    private $mensajeoperacion;
    public function __construct()
    {
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->objPersona;
    }
    public function setear($patente, $marca, $modelo, $objPersona)
    {
        
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setObjPersona($objPersona);
    }





    /**
     * Get the value of patente
     */
    public function getPatente()
    {
        return $this->patente;
    }

    /**
     * Set the value of patente
     *
     * @return  self
     */
    public function setPatente($patente)
    {
        $this->patente = $patente;
    }

    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * Get the value of modelo
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * Get the value of objPersona
     */
    public function getObjPersona()
    {
        return $this->objPersona;
    }

    /**
     * Set the value of objPersona
     *
     * @return  self
     */
    public function setObjPersona($objPersona)
    {
        $this->objPersona = $objPersona;
    }
 /**
     * Get the value of mensajeoperacion
     */ 
    public function getMensajeoperacion()
    {
        return $this->mensajeoperacion;
    }

    /**
     * Set the value of mensajeoperacion
     *
     * @return  self
     */ 
    public function setMensajeoperacion($mensajeoperacion)
    {
        $this->mensajeoperacion = $mensajeoperacion;

        return $this;
    }
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM auto WHERE patente = ".$this->getPatente();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $persona = new persona();
                    $persona->setNroDni($row['DniDuenio']);
                    $persona->cargar();
                    $this->setear($row[$persona],$row['marca'],$row['modelo'], $row['patente']);
                }
            }
        } else {
          //  $this->setMensajeoperacion("Auto->listar: ".$base->getError());
        }
        return $resp;
    
        
    }


public function insertar(){
    // echo 'insertando';
    $resp = false;
    $base = new BaseDatos();
    $objPersona = $this->getObjPersona();
    print_r($objPersona);
    $dni = $objPersona[0]->getNroDni();
    print_r($dni);
    $sql = "INSERT INTO auto(DniDuenio,marca,modelo,patente)  VALUES('".$dni."','".$this->getMarca() . "','" . $this->getModelo()."','". $this->getPatente(). "');";
    echo $sql;
    if ($base->Iniciar()) {
        if ($elid = $base->Ejecutar($sql)) {
            $this->setPatente($elid);
            $resp = true;
        } else {
          //  $this->setMensajeoperacion("Auto->insertar: ".$base->getError());
        }
    } else {
        //$this->setMensajeoperacion("Auto->insertar: ".$base->getError());
    }
    return $resp;
}

public function modificar(){
    $resp = false;
    $base = new BaseDatos();
    // $objPersona = $this->getObjPersona();
    $dni = $this->getObjPersona()->getNroDni(); 
    $sql = "UPDATE auto SET marca='".$this->getMarca()."', modelo='".$this->getModelo()."', DniDuenio='".$dni."' WHERE patente='".$this->getPatente()."'";
    
    // echo $sql; 

    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            $resp = true;
        } else {
            $this->setMensajeoperacion("Auto->modificar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("Auto->modificar: ".$base->getError());
    }
    return $resp;
}


public function eliminar(){
    $resp = false;
    $base=new BaseDatos();
    $sql="DELETE FROM auto WHERE patente=".$this->getPatente();
    if ($base->Iniciar()) {
        if ($base->Ejecutar($sql)) {
            return true;
        } else {
            $this->setMensajeoperacion("Auto->eliminar: ".$base->getError());
        }
    } else {
        $this->setMensajeoperacion("Auto->eliminar: ".$base->getError());
    }
    return $resp;
}

public static function listar($parametro=''){
    // echo ' estoy en litar'; 
    $arreglo = array();
    $base=new BaseDatos();
    $sql="SELECT * FROM auto ";
    if ($parametro!="") {
        $sql.='WHERE '.$parametro;
    }

    $res = $base->Ejecutar($sql);
    
    if($res>-1){
        if($res>0){
            // echo 'respuesta desde listar'; 
            while ($row = $base->Registro()){
                $obj= new Auto();
                $persona = new Persona();
                $persona->setNroDni($row['DniDuenio']);
                $persona->cargar();
                $obj->setear($row['patente'], $row['marca'], $row['modelo'], $persona);
                array_push($arreglo, $obj);
            }
        }
        
    } else {
        $this->setMensajeoperacion("Auto->listar: ".$base->getError()); 
    }
    // print_r($arreglo);
    return $arreglo;
}


   
}
?>