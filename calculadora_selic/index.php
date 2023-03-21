<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caluladora</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
 <h1>Calculadora</h1>
 <fieldset class="fiel_1">
    <legend class="leg1">Calcule o CDI</legend>
    <form>
        <input type="text" name="produto1" placeholder="Valor">
        <input type="text" name="produto2" placeholder="Taixa">
        <select name="operator">
            <option>None</option>
            <option>Adição</option>
            <option>Subtração</option>
            <option>Multiplicação</option>
            <option>Divisão</option>
            <option name="CDI" >CDI anual</option>
            <option>CDI mensal</option>
        </select>
        <br>
        <br>
        <button class="button2" type="submit" name="submit" value="submit">Calcular</button>
    </form>

    <fieldset>
        <legend class="fied_2">Resultado</legend>
        <?php
         if (isset($_GET['submit'])){
                 $resultado1 = $_GET['produto1']; /* Aqui estou usando uma requisição GET para obter o valor de minha variável. É importante lembrar que o método GET pode apresentar riscos de segurança se não for usado adequadamente, portanto, é importante tomar medidas de segurança, como validar e filtrar os dados recebidos antes de usá-los. Legallllll neeeee amooooo*/
                 $resultado2 = $_GET['produto2'];
                 $operator = $_GET['operator'];
                 $tx = 13.75 * 0.0105; /* Taixa da selic vezes 105% do CDI. O 13.75 esta representando a SELIC, caso voce queira mudar fique a vontade */
                 switch ($operator){
                     case"None":
                        echo "Selecione um metodo ";
                    break;
                     case"Adição":
                        echo $resultado1 + $resultado2;
                    break;
                    case"Subtração": /* Ira fazer calculos de subtração conforme a requesição isso tambem vale para os outros */
                        echo $resultado1 - $resultado2;
                    break;
                     case"Multiplicação":
                        echo $resultado1 * $resultado2;
                    break;
                     case"Divisão":
                        echo $resultado1 / $resultado2;
                    break;
                     case"CDI anual":
                        $aa = $resultado1 * $tx;
                        $int = number_format($aa,2,",",".");
                        echo "Sua rentabilidade anual e de: $int";
                    break;
                    case"CDI mensal":
                        $mm = $resultado1 * $tx;
                        $mc = $mm / 12;
                        $mensal = number_format($mc,2,",",".");                   
                        echo "Sua rentabilidade mensal e de: $mensal";
                    break;
                 }
         } 
        
    ?>
    </fieldset>
   
    <p><b>Detalhe:</b> Nao adicione o numero com pontos nem virgulas, coloque o numero por inteiro. <br>
    <b>Exemplo:</b>R$7,890.90 coloque 7890.90</p>
    </fieldset>
</body>
</html>