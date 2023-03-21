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

//moedas as definindo
$moedaA = $argv[1];
$moedaB = $argv[2];

//EXECUTAR A REQUISICAO NA API
$dadosCotacao = $obEconomia->consultarCotacao($moedaA,$moedaB);

//AJUSTAR RESPONSE DOS DADOS
$dadosCotacao = $dadosCotacao[$moedaA.$moedaB] ?? [];

//Imprime retorno da cotacao
echo 'Moedas: '.$moedaA.' -> '.$moedaB."\n";
echo 'Compra: '.($dadosCotacao['bid']?? 'Desconhecido')."\n";
echo 'Venda: '.($dadosCotacao['ask']?? 'Desconhecido')."\n";