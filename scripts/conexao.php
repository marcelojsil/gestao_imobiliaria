<?php

//VARIAVEIS DO BANCO DE DADOS LOCAL
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'imobiliiaria';

//VARIAVEIS DO BANCO DE DADOS SERVIDOR
/*
$servidor = 'sql203.epizy.com';
$usuario = 'epiz_34079008';
$senha = '9LRx2lH3L4qk8mi';
$banco = 'epiz_34079008_marthec';
*/

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
	
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! " . $e;
}

?>