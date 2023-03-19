
<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa de CEP</title>
</head>
<body>
    <form method="post">
        <input type="text" name="cep" placeholder="cep">
        <br>
        <button type="submit" name="submit" value="submit">Calcular</button>
    </form>
    <fieldset>
        <legend>Resultado</legend>
        
        <?php
        if(isset($_POST['submit'])) {
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
        
    </fieldset>
</body>
</html>

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

?>

