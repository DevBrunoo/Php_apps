<!DOCTYPE html>
<html>

<head>
    <title>Pesquisa de CEP</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body class="container bodysuperior">
    <fieldset class="container field_1">

        <form class="container" method="post">
            <div class="seach_bar">
                <input class="input_search" type="text" name="cep" placeholder="cep">
                <button class="button-seach-cep" type="submit" name="submit" value="submit">Calcular</button>
            </div>
            <br>
        </form>
</body>
<div class="container div_1">
    <fieldset class="container field-resultado">
        <legend class="leg_fiel">Resultado</legend>
       
        <br>
        <br>

        <!-- Codigo abaixo que possibilita a busca de CEP
        ------------------------------------------------- -->
        <p class="p_fiel">
            <?php
            if (isset($_POST['submit'])) {
                $cep = $_POST['cep'];
                $url = "https://viacep.com.br/ws/" . $cep . "/json/";
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
                if ($response) {
                    $address = json_decode($response);
                    if (isset($address->erro)) {
                        echo "Erro: CEP não encontrado.\n";
                    } else {
                        echo "Endereço:\n";
                        echo "CEP: " . $address->cep . "\n";
                        echo "Logradouro: " . $address->logradouro . "\n";
                        echo "Complemento: " . $address->complemento . "\n";
                        echo "Bairro: " . $address->bairro . "\n";
                        echo "Cidade: " . $address->localidade . "\n";
                        echo "Estado: " . $address->uf . "\n";
                    }
                } else {
                    echo "Erro na consulta.\n";
                }
            }
            ?>

        </p>
    </fieldset>

    </fieldset>
</div>



<br>
</body>

</html>

<?php

require __DIR__ . '/vendor/autoload.php';

//Dependencias da api 
use \App\WebService\ViaCEP;

//Pega o que foi digitado no comando do terminal
if (!isset($argv[1])) {
    die("CEP não definido\n");
}

//EXECUTA A CONSULTA DE CEPS
$dadosCEP = ViaCEP::consultarCEP($argv[1]);

//IMPRIME O RESULTADO
print_r($dadosCEP);

?>