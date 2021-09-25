<?php

class abmpersona
{

    private function cargarObjeto($param){
        $obj = null;
        if (
            array_key_exists('nroDni', $param) and array_key_exists('apellido', $param) and array_key_exists('nombre', $param)
            and array_key_exists('fechaNac', $param) and array_key_exists('telefono', $param) and array_key_exists('domicilio', $param)
        ) {
            $obj = new persona();
            $obj->setear($param['nroDni'], $param['apellido'], $param['nombre'], $param['fechaNac'], $param['telefono'], $param['domicilio']);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['nroDni']))
            $resp = true;
        return $resp;
    }

    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null and $elObjtTabla->insertar()) {
            $resp = true;
        }
        return $resp;
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null and $elObjtTabla->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param)
    {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['nroDni']))
                $where .= " and nroDni =" . $param['nroDni'];

            if (isset($param['apellido']))
                $where .= " and apellido ='" . $param['apellido'] . "'";

            if (isset($param['nombre']))
                $where .= " and nombre ='" . $param['nombre'] . "'";
            
                if (isset($param['fechaNac']))
                $where .= " and fechaNac ='" . $param['fechaNac'] . "'";
            
                if (isset($param['telefono']))
                $where .= " and telefono ='" . $param['telefono'] . "'";
            
                if (isset($param['domicilio']))
                $where .= " and domicilio ='" . $param['domicilio'] . "'";
        }
        $arreglo = persona::listar($where);
        return $arreglo;
    }
}
