<?php

namespace App\Controllers;

use getIdicadoresbyCodigoyfecha;

class Home extends BaseController
{

    public function index()
    {
        return view('welcome_message');
    }


    // post function to send indicadores
    public function getIndicadoresUF()
    {
        $data = $this->request->getPost()->this->request->isAJAX();
        $codigoIndicador = $data['codigoIndicador'];
        $fechaInicial = $data['fechaInicial'];
        $fechaFinal = $data['fechaFinal'];
        
        $indicadores = new getIdicadoresbyCodigoyfecha();
        $indicadores->getIndicadoresbyCodigoyfecha($codigoIndicador, $fechaInicial, $fechaFinal);

        echo json_encode($indicadores);
    }


}
