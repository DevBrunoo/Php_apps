<?php 

require __DIR__.'/vendor/autoload.php';

//Dependencias da api 
use \App\WebService\ViaCEP;

//Pega o que foi digitado no comando do terminal
if(!isset($argv[1])){
    die("CEP não definido\n");
}

//EXECUTA A CONSULTA DE CEPS
$dadosCEP = ViaCEP::consultarCEP($argv[1]);

//IMPRIME O RESULTADO
print_r($dadosCEP);