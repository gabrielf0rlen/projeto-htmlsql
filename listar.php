   
<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once("controller/ControllerCadastro.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="format-detection" content="telephone=no"> <meta name="msapplication-tap-highlight" content="no">
	<meta name="viewport" content="initial-scale=1, width=device-width, viewport-fit=cover"> <meta name="color-scheme" content="light dark"> 
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
	<link rel="stylesheet" href="css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script>
		function confirmDelete(delUrl) {
  			if (confirm("Deseja excluir o registro?")) {
   				document.location = delUrl;
	        }  
		}
	</script>
	<title>Listar Agendamentos</title>
</head> 
<body> 
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #181818;">
            <div class="container-fluid">
			<a class="navbar-brand" href="index.php">Listar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="inserir.php">Inserir</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="listar.php">Listar</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
		<div class="container">
		<div class="row" style="padding-top: 10%">
			<div class="card mb-3 col-12" style="background-color: white">
				<div class="card-body" style="margin: auto;">
					<h5 class="card-title">Consultar - Contatos Agendados</h5>
					<table class="table table-responsive" style="width: auto;">
						<thead class="table-active bg-light">
							<tr>
								<th scope="col">Nome</th>
								<th scope="col">Telefone</th>
								<th scope="col">Origem</th>
								<th scope="col">Contato</th>
								<th scope="col">Observação</th>
								<th scope="col">Ação</th>
							</tr>
						</thead>
						<tbody id="TableData">
						<?php
							$controller = new cadastroController();
							$resultado = $controller->listar(0);
							for($i=0;$i<count($resultado);$i++){ 
						?>
								<tr>
									<td scope="col"><?php echo $resultado[$i]['nome']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['telefone']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['origem']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['data_contato']; ?></td>
									<td scope="col"><?php echo $resultado[$i]['observacao']; ?></td>
									<td scope="col">
										<button type="button" class="btn btn-outline-primary" onclick="location.href='update.php?id=<?php echo $resultado[$i]['id']; ?>'" style="width: 72px;">Editar</button>
										<button type="button" class="btn btn-outline-primary" onclick="javascript:confirmDelete('excluir.php?id=<?php echo $resultado[$i]['id']; ?>')" style="width: 72px;">Excluir</button>
									</td>
								</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
</body>
</html>
