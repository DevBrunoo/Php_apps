Readme - API de Consulta de CEP
Este é um programa em PHP que utiliza a API do ViaCEP para realizar consultas de CEP.

Requisitos
PHP 7 ou superior instalado no sistema.
Extensão curl habilitada.
Instalação
Clone o repositório para o seu sistema local.
Navegue até o diretório onde o repositório foi clonado.
Execute o comando composer install para instalar as dependências.
Utilização
Para utilizar a API de consulta de CEP, execute o arquivo index.php no terminal.

Copy code
php index.php
Será solicitado que informe o CEP que deseja consultar.

yaml
Copy code
Digite o CEP que deseja consultar:
Após digitar o CEP e pressionar a tecla Enter, o programa irá realizar a consulta na API do ViaCEP e exibirá as informações do endereço correspondente.

Caso ocorra algum erro na consulta, será exibida uma mensagem de erro.

Personalização
Você pode personalizar a exibição das informações do endereço alterando o método printAddress na classe Address.

Licença
Este programa é distribuído sob a Licença MIT. Consulte o arquivo LICENSE para obter mais informações.