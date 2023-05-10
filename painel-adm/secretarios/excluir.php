<?php 
require_once("../../conexao.php"); 

//Tabelas de exclusao dos dados
$tab1 = 'secretarios';
$tab2 = 'users';

$id = $_POST['id'];

$query = $pdo->query("SELECT * FROM $tab1 where id = '$id' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$cpf_usu = $res[0]['cpf'];

$query_id = $pdo->query("SELECT * FROM $tab2 where cpf = '$cpf_usu' ");
$res_id = $query_id->fetchAll(PDO::FETCH_ASSOC);
$id_usu = $res_id[0]['id'];


$pdo->query("DELETE FROM $tab1 WHERE id = '$id'");
$pdo->query("DELETE FROM $tab2 WHERE id = '$id_usu'");

echo 'Excluído com Sucesso!';

?>