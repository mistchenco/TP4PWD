<?php
class persona
{
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeoperacion;

    public function __construct()
    {
        $this->nroDni = "";
        $this->apellido = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->mensajeoperacion = "";
    }
    public function setear($nroDni, $apellido,$nombre, $fechaNac, $telefono, $domicilio)
    {
        $this->setNroDni($nroDni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
        $this->setDomicilio($domicilio);
    }



    public function getNroDni()
    {
        return $this->nroDni;
    }


    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;
    }

    /**
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of fechaNac
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * Set the value of fechaNac
     *
     * @return  self
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

    /**
     * Get the value of telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get the value of domicilio
     */
    public function getDomicilio()
    {
        return $this->domicilio;
    }

    /**
     * Set the value of domicilio
     *
     * @return  self
     */
    public function setDomicilio($domicilio)
    {
        $this->domicilio = $domicilio;
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
    }


    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona WHERE nroDni = " . $this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['nroDni'], $row['apellido'],$row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio']);
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }
        return $resp;
    }

    public function insertar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(nroDni, apellido, nombre, fechaNac, telefono, domicilio) 
        VALUES('".$this->getNroDni()."','" . $this->getApellido() . "','" . $this->getNombre() . "','" . $this->getFechaNac() . "','" . $this->getTelefono() . "','" . $this->getDomicilio() . "')";
        if ($base->Iniciar()) {
            if ($nroDni = $base->Ejecutar($sql)) {
                $this->setNroDni($nroDni);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
                $resp = false;
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: " . $base->getError());
            $resp = false;
        }
        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET apellido='" . $this->getApellido() . "',nombre='" . $this->getNombre() . "',domicilio='" . $this->getDomicilio() 
        ."', telefono='" . $this->getTelefono() . "', fechaNac='"  . $this->getFechaNac() . "' WHERE nroDni='" . $this->getNroDni() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE nroDni=" . $this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "")
    {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new persona();
                    $obj->setear($row['nroDni'], $row['apellido'],$row['nombre'], $row['fechaNac'], $row['telefono'], $row['domicilio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
          // $this->setMensajeoperacion("Persona->Listar: ".$base->getError());
        }

        return $arreglo;
    }
}
?>