<?php

try{
    $conexao = new PDO('mysql:host=localhost; dbname=ti2024', 'root', '');

}
catch(Exception $erro){
    echo $erro->getMessage();
}

?>