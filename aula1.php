<?php
   /* echo "<h1>ola</h1>";
    $var = "futebol";
    echo $var;
    echo "esporte preferido: $var"
    */
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Forms</h1>
    <fieldset>
        <form action="" method="GET">
            <p>Digite seu nome: <br> <input type="text" name="username" required></p>
            <p>
                EM qual ano você nasceu? <br> <input type="number" name="n1" required>
                <br>
                Em que ano estamos? <br> <input type="number" name="n2" required>
            </p>
    <p>
        <input type="submit" name="btn" value="Calcular">
    </p>
        </form>
    </fieldset>
</body>
</html>

<?php

if (isset($_GET['btn'])){


    $user = $_GET['username'];
    
    $n1 = $_GET["n1"];
    $n2 = $_GET["n2"];
    $diferenca = $n2 - $n1;

    if($diferenca > 18){
        echo "Prezado $user, arrocha logo pra tirar a carteira";
    }
    else{
        echo"Ta de curtição menor, vaza";
    }



    echo $diferenca;
}
else{
    echo "ainda nao foram enviados os dados.";
}
?>
