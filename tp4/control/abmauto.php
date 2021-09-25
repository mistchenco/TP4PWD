<?php

class abmauto{

    private function cargarObjeto($param){
        $obj = null;
        
        if (
            array_key_exists('patente', $param) and array_key_exists('marca', $param) and array_key_exists('modelo', $param)
            and array_key_exists('objPersona', $param)
        ) {
            $obj = new auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['objPersona']);
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
        if (isset($param)){
            $resp = true;
        }

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
        // echo 'estoy buscando'; 
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['patente']))
                $where .= ' and patente = ' ."'". $param['patente']."'";

            if (isset($param['marca']))
                $where .= ' and marca =' . $param['marca'] . "'";

            if (isset($param['modelo']))
                $where .= ' and modelo = ' . $param['modelo'] . "'";
            
            if (isset($param['DniDuenio']))
                $where .= ' and DniDuenio = '."'" . $param['DniDuenio'] . "'";
            //preguntar sobre el dniDuenio....
           
             
        }
       
        $arreglo = auto::listar($where);
      
        return $arreglo;
    }
}
