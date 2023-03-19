<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1>Calculadora</h1>
    <form>
        <input type="text" name="produto1" placeholder="Valor">
        <input type="text" name="produto2" placeholder="Taixa">
        <select name="operator">
            <option>None</option>
            <option>Add</option>
            <option>Subtract</option>
            <option>Multiplay</option>
            <option>Divide</option>
            <option name="CDI" >CDI anual</option>
            <option>CDI mensal</option>
        </select>
        <br>
        <br>
        <button type="submit" name="submit" value="submit">Calcular</button>
    </form>

    <fieldset>
        <legend>Resultado</legend>
    <?php
     if (isset($_GET['submit'])){
             $resultado1 = $_GET['produto1'];
             $resultado2 = $_GET['produto2'];
             $operator = $_GET['operator'];
             $tx = 13.75 * 0.0105; /* Taixa da selic vezes 105% do CDI */
             switch ($operator){
                 case"None":
                    echo "Selecione um metodo ";
                break;
                 case"Add":
                    echo $resultado1 + $resultado2;
                break;
                 case"Subtract":
                    echo $resultado1 - $resultado2;
                break;
                 case"Multiplay":
                    echo $resultado1 * $resultado2;
                break;
                 case"Divide":
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
    
</body>
</html>