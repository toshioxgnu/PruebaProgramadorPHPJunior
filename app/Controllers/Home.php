<?php

namespace App\Controllers;

use getIdicadoresbyCodigoyfecha;

class Home extends BaseController
{

    public function index()
    {
        return view('welcome_message');
    }


    function getIndicadoresUF( $codigoIndicador, $fechaInicio, $fechaTermino ) {
        $getIndicadoresporfecha = new getIdicadoresbyCodigoyfecha();
        $arrayIndicadores = $getIndicadoresporfecha->getIndicadoresbyCodigoyfecha($codigoIndicador, $fechaInicio, $fechaTermino);
        
        //convert array to json
        $jsonIndicadores = json_encode($arrayIndicadores);
        return $jsonIndicadores;
    }


}
