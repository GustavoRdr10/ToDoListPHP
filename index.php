<!DOCTYPE html>
<?php
	session_start();
	require_once 'controller/cTarefa.php';
	$tarefa = new cTarefa();
	$listaTarefa = $tarefa->getTarefa();
	date_default_timezone_set('Brasil/Rio_de_janeiro');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sua Agenda</title>
		<meta http-equiv="Content-Language" content="pt-br">
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<meta name="author" content="Gustavo"/>
		<meta name="description" content="MiniProjeto"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
		
		<div class="titulo">
			<h1 class="centro">Bem Vindo!</h1>
		</div>
		
		<div><br><br>
			<h2 class="centro">Lista de Tarefas</h2>
		</div>
		<div class="validacao">
			<fieldset class="field">
				<table>
					<thead>
						<tr>
							<th>Nome</th><th>Data de Início</th><th>Status</th><th>Funções</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($listaTarefa as $item): ?>
							<tr>
								<td><?php echo $item['nome'];?></td>
								<td><?php echo  date("d/m/Y" , strtotime($item['dataInicio']));?></td>
								<td>
									<?php
										
										$dataInicio = strtotime($item["dataInicio"]);
										$data = strtotime("now - 10 days");
										
										if ($item['status'] === "Aberta") {
											if(($dataInicio <= $data)) {
												echo "Aberta +10 dias";
											} else {
												echo "Aberta";
											}
										} else {
											echo $item['status'];
										}
										
									?>
								</td>
								<td>
									<form action="view/editarTarefa.php" method="POST">
										<input type="hidden" value="<?php echo $item['id'];?>" name="id"/>
										<input type="submit" class="btnEditar" value="Editar" name="editar"/>
									</form>

									<script language='javascript'>
										function confirmarExclusao(nome, idForm){
											result = confirm("Tem certeza que deseja excluir a terefa \"" + nome + "\"?");
											if (result == true) {
												document.getElementById(idForm).action="controller/deleteTarefa.php";
											} else {
												
											}
										}
									</script>									
									
									<form id="<?php echo ($item['id'])?>" action="" method="post">
										<input type="hidden" value="<?php echo $item['id'];?>" name="id"/>
										<input type="submit" class="btnDeletar" onclick="confirmarExclusao(<?php echo ("'" .$item['nome'] ."'");?>, <?php echo ("'" .$item['id'] ."'");?>)" value="Deletar" name="deletar"/>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>

					</tbody>
				</table><br>
				<div class="centro">
					<input "type="button" class="btn btn-success" value="Criar Tarefa" onclick="location.href='view/criarTarefa.php'"/></p>
				</div>
			</fieldset>
		</div>	
		
		<div id="bLogOut">
			<fieldset>
				<?php
				
					if (!isset($_SESSION['logado']) && $_SESSION['logado'] != true) {
						header("Location: view/login.php");
					}else{		 
						echo ("<div class='center'>");
						echo ("<input type='button' class='btn btn-warning' value='Log Out' onclick=\"location.href='controller/logout.php'\" />");
						echo ("</div>");
					}
				?>
			</fieldset>
		</div>
		
    </body>
</html>
