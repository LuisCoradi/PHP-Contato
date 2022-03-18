<?php


if(isset($_POST["acao"])){
	if($_POST["acao"] == "inserir"){
		inserirPessoa();
	}
	if($_POST["acao"] == "alterar"){
		alterarPessoa();
	}
	if($_POST["acao"] == "excluir"){
		excluirPessoa();
	}
}

//funções
function abrirBanco(){
	$conexao = new mysqli("localhost", "root", "", "agenda");
	return $conexao;
}

//função para inserir os dados no bd
function inserirPessoa(){
	$banco = abrirBanco();
	$sql = "INSERT INTO contato(nome, idade, cpf, email, nascimento, endereco, telefone)"
		." VALUES ('{$_POST["nome"]}','{$_POST["idade"]}','{$_POST["cpf"]}','{$_POST["email"]}','{$_POST["nascimento"]}','{$_POST["endereco"]}','{$_POST["telefone"]}')"; 
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função para alterar os dados no bd
function alterarPessoa(){
	$banco = abrirBanco();
	$sql = "UPDATE contato SET nome='{$_POST["nome"]}',"."nascimento='{$_POST["nascimento"]}', idade='{$_POST["idade"]}', cpf='{$_POST["cpf"]}', email='{$_POST["email"]}', endereco='{$_POST["endereco"]}',"."telefone='{$_POST["telefone"]}' WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função para excluir os dados no bd
function excluirPessoa(){
	$banco = abrirBanco();
	$sql = "DELETE FROM contato WHERE id='{$_POST["id"]}'";
	$banco->query($sql);
	$banco->close();
	voltarIndex();
}

//função que busca todas as pessoas no bd
function selectAllPessoa(){
	$banco = abrirBanco();
	$sql = "SELECT * FROM contato ORDER BY nome";
	$resultado = $banco->query($sql);
	while($row = mysqli_fetch_array($resultado)){
		$grupo[] = $row;
	}
	return $grupo;
}

//
function selectIdPessoa($id){
	$banco = abrirBanco();
	$sql = "SELECT * FROM contato WHERE id =".$id;
	$resultado = $banco->query($sql);
	$pessoa = mysqli_fetch_assoc($resultado);
	return $pessoa;
}

//
function voltarIndex(){
	header("Location:index.php");
}



?>
