<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <form action="" method="GET">
        <p>
				Nome do aluno: <br> <input type="text" name="nome">
			</p>
            <p>
				Cidade: <br> <input type="text" name="cidade">
			</p>
            <p>
				Estado: <br> 
				<select id="uf" name="uf">
                <option value=""></option>
                
			    <option value="AC">Acre</option>
			    <option value="AL">Alagoas</option>
			    <option value="AP">Amapá</option>
			    <option value="AM">Amazonas</option>
			    <option value="BA">Bahia</option>
			    <option value="CE">Ceará</option>
			    <option value="DF">Distrito Federal</option>
			    <option value="ES">Espírito Santo</option>
			    <option value="GO">Goiás</option>
			    <option value="MA">Maranhão</option>
			    <option value="MT">Mato Grosso</option>
			    <option value="MS">Mato Grosso do Sul</option>
			    <option value="MG">Minas Gerais</option>
			    <option value="PA">Pará</option>
			    <option value="PB">Paraíba</option>
			    <option value="PR">Paraná</option>
			    <option value="PE">Pernambuco</option>
			    <option value="PI">Piauí</option>
			    <option value="RJ">Rio de Janeiro</option>
			    <option value="RN">Rio Grande do Norte</option>
			    <option value="RS">Rio Grande do Sul</option>
			    <option value="RO">Rondônia</option>
			    <option value="RR">Roraima</option>
			    <option value="SC">Santa Catarina</option>
			    <option value="SP">São Paulo</option>
			    <option value="SE">Sergipe</option>
			    <option value="TO">Tocantins</option>
			    <option value="EX">Estrangeiro</option>
				</select>
			<p>
				<input type="submit" name="btn" value="Cadastrar">
			</p>
        </form>
    </fieldset>
</body>
</html>

<?php
    require 'conexao.php';
    if(isset($_GET['btn'])){
        $nome = $_GET['nome'];
        $cidade = $_GET['cidade'];
        $uf = $_GET['uf'];
        $cad = $conexao->prepare("insert into alunos (nome, cidade, uf) values ('$nome', '$cidade', '$uf')");
        $cad->execute();
        echo "<h2>Aluno  $nome cadastrado com sucesso!</h2>";
    }


?>