<?php 

namespace App\Awesome;
class Economia{

    /**
     * URL base da API de Economia
     * @var string
     */
    const BASE_URL = 'https://economia.awesomeapi.com.br/json';
   
    /**
     *  Metodo responsavel por consultar a cotacao atual das moedas
     * @param string $moedaA
     * @param string $moedaB
     * @return array
     */
    public function consultarCotacao($moedaA,$moedaB){
        return $this->get('/last/'.$moedaA.'-'.$moedaB);
    }
   
    /**
     *  Metodo responsavel por consultar a cotacao atual das moedas
     * @param string $moedaA
     * @param string $moedaB
     * @param integer $dias
     * @return array
     */
    /* Metodo para consultar a cotacao */
    public function consultarUltimosFechamentos($moedaA,$moedaB,$dias = 1){
        return $this->get('/daily/'.$moedaA.'-'.$moedaB.'/'.$dias);
    }

    /**
     * Metodo responsavel por executar a requisicao na API de Economia Awersome
     * @param string $resouce
     * @return array
     */
    public function get($resource){
        //ENDPOINT
        $endpoint = self::BASE_URL.$resource;
        
        //INICIAR O CURL
        $curl = curl_init();

        //CONFIGURACOES DO CURL
        curl_setopt_array($curl,[
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => 'GET'
        ]);

        //RESPONSE
        $response = curl_exec($curl);

        //FECHA A CONXAO DO CURL
        curl_close($curl);

        //RETORNA O RESULTADO EM ARRAY
        return json_decode($response,true);
    }
}