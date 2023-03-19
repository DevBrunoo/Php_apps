
<?php

$cep = readline("Digite o CEP que deseja consultar: ");

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

?>
