<?php
require_once('scripts/conexao.php');
require_once('scripts/variaveis.php');
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title_erp ?></title>
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

</head>
<body>

<nav class="sidebar">
	

		
			<ul class="nav navbar-nav" id="menu">
				<li>
					<a href="./index.php?pg=home">Inicio</a>
				</li>
				<li>
					<a href="./index.php?pg=equipe">Empresa</a>
				</li>
				
		
				
</nav>

<!-- Div que receberá as páginas 
<nav class="main" id="conteudo"></nav>-->

	<div class="main" id="conteudo"> 
		<div class="col-sm-12 w-auto p-3">
<?php   
// -----------------------
//Código em php funcionando
// -----------------------
if (isset($_GET['pg'])) { 
$Pagina = $_GET['pg'];
	if ($Pagina == "home") {
		include('home.php');
	} else if ($Pagina == "equipe") {
		include('cadastros/equipe.php');
	} else if ($Pagina == "estoque") {
		include('pages/estoque.php');
	} else if ($Pagina == "") {
		include('pages/home.php');
	} else {
		include("pages/error.php");
	}
}
?>
		</div>
	</div>
<!--------------------
Rodapé do site
--------------------->

<!--
<footer id="myFooter"> 
    <div id="footer-copyright" class="container">
        © 2020 Copyright - Moraes Automóveis
    </div>
    <div class="footer-social">
        <a href="https://fb.com/moraesautomoveis" class="social-icons"><i class="fa fa-facebook"></i></a>
        <a href="https://instagram.com/moraesautomoveis" class="social-icons"><i class="fa fa-instagram"></i></a>
    </div>
</footer>
-->
</body>
</html>