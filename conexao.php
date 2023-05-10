<?php

$nome_escola = "Escola Marthe";
$url = "http://localhost/escolar/";
$endereco_escola = "Av. Padre José, 150, Alto do Cardoso";
$fone_escola = "(12) 3642-0000";
$email_admin = "escola@escola.com";
$rodape_relatorios = "Desenvolvido por Marcelo Silva - Marthec Desenvolvimento";

//VARIAVEIS DO BANCO DE DADOS LOCAL
$servidor = 'sql203.epizy.com';
$usuario = 'root';
$senha = '';
$banco = 'epiz.34079008_marthec';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
	
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}

?>