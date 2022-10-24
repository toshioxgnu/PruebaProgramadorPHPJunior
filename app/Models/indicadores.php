<?php

class Indicadores {
    //attributes
    private $id;
    private $nobreIndicador;
    private $codigoIndicador;
    private $unidadMedida;
    private $valorIndicador;
    private $fechaIndicador;
    private $origenIndicador;

    //constructor
    public function __construct($id, $nobreIndicador, $codigoIndicador, $unidadMedida, $valorIndicador, $fechaIndicador, $origenIndicador) {
        $this->id = $id;
        $this->nobreIndicador = $nobreIndicador;
        $this->codigoIndicador = $codigoIndicador;
        $this->unidadMedida = $unidadMedida;
        $this->valorIndicador = $valorIndicador;
        $this->fechaIndicador = $fechaIndicador;
        $this->origenIndicador = $origenIndicador;
    }

    // getters and setters
    public function getId() {
        return $this->id;
    }
    public function getNobreIndicador() {
        return $this->nobreIndicador;
    }
    public function getCodigoIndicador() {
        return $this->codigoIndicador;
    }
    public function getUnidadMedida() {
        return $this->unidadMedida;
    }
    public function getValorIndicador() {
        return $this->valorIndicador;
    }
    public function getFechaIndicador() {
        return $this->fechaIndicador;
    }
    public function getOrigenIndicador() {
        return $this->origenIndicador;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setNobreIndicador($nobreIndicador) {
        $this->nobreIndicador = $nobreIndicador;
    }
    public function setCodigoIndicador($codigoIndicador) {
        $this->codigoIndicador = $codigoIndicador;
    }
    public function setUnidadMedida($unidadMedida) {
        $this->unidadMedida = $unidadMedida;
    }
    public function setValorIndicador($valorIndicador) {
        $this->valorIndicador = $valorIndicador;
    }
    public function setFechaIndicador($fechaIndicador) {
        $this->fechaIndicador = $fechaIndicador;
    }
    public function setOrigenIndicador($origenIndicador) {
        $this->origenIndicador = $origenIndicador;
    }




}

class getIdicadoresbyCodigoyfecha{
    public function getIndicadoresbyCodigoyfecha($codigoIndicador, $fechaInicial, $fechaFinal){
        // connect to database
        $db = \Config\Database::connect();
        $builder = $db->table('indicadores');
        $builder->select('*');
        $builder->where('codigoIndicador', $codigoIndicador);
        $builder->where('fechaIndicador >=', $fechaInicial);
        $builder->where('fechaIndicador <=', $fechaFinal);
        $query = $builder->get();
        $result = $query->getResult();
        // pass result to indicadores
        $indicadores = array();
        foreach ($result as $row) {
            $indicador = new Indicadores($row->id, $row->nobreIndicador, $row->codigoIndicador, $row->unidadMedida, $row->valorIndicador, $row->fechaIndicador, $row->origenIndicador);
            array_push($indicadores, $indicador);
        }
        return $indicadores;
    }
}

class getTipoIndicadores{
    public function getTipoIndicadores(){
        // connect to database
        $db = \Config\Database::connect();
        $builder = $db->table('indicadores');
        $builder->select('codigoIndicador');
        $builder->distinct();
        $builder->groupBy('codigoIndicador');
        $query = $builder->get();
        $result = $query->getResult();
        // pass result to indicadores
        $tipoindicadores = array();
        foreach ($result as $row) {
            $tipoindicador = $row -> codigoIndicador;
            array_push($tipoindicadores, $tipoindicador);
        }
        return $tipoindicadores;
    }
}