<?php
	require_once("controller/ControllerCadastro.php");
	$controller = new cadastroController();
	$resultado = $controller->excluir($_GET['id']);
?>