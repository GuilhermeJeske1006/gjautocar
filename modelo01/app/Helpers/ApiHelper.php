<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class ApiHelper
{
    public static function getDataFromApi($search = null, $request = null, $ordenacao = null)
    {
        $client = new Client();
        
        $url = env('API_BASE') . 'site/' . env('EMPRESA_ID');

        if ($search) {
            $url .= '?search=' . urlencode($search);
        }

        else if($ordenacao){
            $url .= '?ordenacao=' . urlencode($ordenacao);
        }

        else if ($request) {
            $url .= '?tipo=' . urlencode($request->tipo).'&marca=' 
             . urlencode($request->marca). '&modelo='
             . urlencode($request->modelo). '&valor_min='
             . urlencode($request->valor_min). '&valor_max='
             . urlencode($request->valor_max). '&ano='. urlencode($request->ano). '&motor='
             . urlencode($request->motor). '&combustivel='
             . urlencode($request->combustivel). '&qtd_portas='
             . urlencode($request->qtd_portas). '&cor='
             . urlencode($request->cor). '&ano_min='
             . urlencode($request->ano_min). '&ano_max='
             . urlencode($request->ano_max) . '&categoria='
             . urlencode($request->categoria) . '&cambio='
             . urlencode($request->cambio);
        }

        //  dd($url);

        $response = $client->request('GET', $url);
        return $response->getBody()->getContents();
    }

    public static function getMarcaApi()
    {
        $client = new Client();
        $url = env('API_BASE') . 'marcas/';

        $response = $client->request('GET', $url);

        return $response->getBody()->getContents();
    }

    public static function somente_numeros(String $telefone)
    {
        return preg_replace("/[^0-9]/", "", $telefone);
    }
    
    public static function format_val($val, $decimals = 2)
    {
      $val = number_format($val, $decimals, ',', '.');
      return $val;
    }
    public static function format_int($val)
    {
        $val = number_format($val, 0, ',', '.');
        
        return $val;
    }
}
