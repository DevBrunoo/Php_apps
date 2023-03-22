<?php 

require __DIR__ .'/vendor/autoload.php';

//DEPENDENCIAS
use \App\Awesome\Economia;

//INSTANCIA DA CLASSE DE API
$obEconomia = new Economia;

//VERIFICAR OS ARGUMENTOS
if(!isset($argv[2])){
    die('É necessario enviar duas moedas');
}

//MOEDAS
$moedaA = $argv[1];
$moedaB = $argv[2];

//EXECUTAR A REQUISICAO NA API
$dadosFechamento = $obEconomia->consultarUltimosFechamentos($moedaA,$moedaB, 15); /* 15 esta representando o numero de dias */

//Imprime retorno da cotacao
echo 'Moedas: '.$moedaA.' -> '.$moedaB."\n";

foreach($dadosFechamento as $fechamento){
    //output
    $output = [
        date('Y-m-d',$fechamento['timestamp']),
        number_format($fechamento['bid'],4,'.',''),
        number_format($fechamento['ask'],4,'.','')
    ];

    //IMPRIME O RESULTADO
    echo implode(' | ', $output)."\n";
}



