<?php session_start();

if (!isset($_SESSION['email']) or !isset($_SESSION['senha'])) {
	header('Location:javascript:history.go(-1)');
}



if (!isset($_SESSION['email']) or !isset($_SESSION['senha'])) {
	session_destroy();
	$sessaoNome = "";
} else {
	$email = $_SESSION['email'];
	$senha = $_SESSION['senha'];

	include_once('conexao.php');

	$select = ("select * from clientes where email='$email' and senha='$senha'");
	$result = $conn->query($select);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$sessaoNome = " " . $row['nome'] . "";

			$nome = "" . $row['nome'] . "";
			$sobrenome = "" . $row['sobrenome'] . "";
			$datanascimento = "" . $row['datanascimento'] . "";
			$cpf = "" . $row['cpf'] . "";
			$senha = "";
			$email = "" . $row['email'] . "";
		}
	}
	mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Cadastro</title>

	<<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../Public/vendor/bootstrap/css/bootstrap.min.css">
		<!-- Estilos -->
		<link rel="stylesheet" href="../../Public/css/style.css">
		<!-- Bootstrap JavaScript -->
		<script src="../../Public/vendor/js/jquery.js"></script>
		<!-- Validation JavaScript -->
		<script src="../../Public/js/validation/cpf.js"></script>
		<script src="../../Public/js/validation/senha.js"></script>
		<script src="../../Public/js/validation/email.js"></script>
		<script src="../../Public/js/validation/mascara.js"></script>


</head>



<style type="text/css">

</style>

<body>
	<div id="wrap">
		<div id="main">

			<div style="margin-top: 15px;"></div>
			<div align="center"><a href="../index.php"><img src="../img/pi.png" class="img-fluid mt-5"></a></div>
			<div style="margin-top: 15px;"></div>

			<div class="container" style="color: white">
				<form class="mt-5" method="post" action="atualizando_conta.php">

					<div class="row">
						<div class="col mt-4">
							<label>* Nome:</label>
							<input required type="text" name="nome" value="<?php echo $nome ?>" class="form-control form-control-lg">
						</div>
						<div class="col mt-4">
							<label>* Sobrenome:</label>
							<input required type="text" name="sobrenome" value="<?php echo $sobrenome ?>" class="form-control form-control-lg">
						</div>
					</div>

					<div class="row">
						<div class="col mt-4">
							<label>* Data De Nascimento: </label>
							<input required id="datanascimento" min="1900-01-01" max="<?php $date = date('Y-m-d');
																						echo ("$date") ?>" name="datanascimento" type="date" value="<?php echo $datanascimento ?>" class="form-control form-control-lg">
						</div>

						<div class="col mt-4">
							<label>* CPF:</label>
							<input required onkeypress="mascara(this, '###.###.###-##')" type="text" maxlength="14" minlength="14" id="cpf" pattern="[0-9 -.]+" name="cpf" value="<?php echo $cpf ?>" class="form-control form-control-lg">
						</div>
					</div>

					<div class="row">
						<div class="col mt-4">
							<label>* Alterar Sua Senha:</label>
							<input id="senha" name="senha" type="password" value="<?php echo $senha ?>" class="form-control form-control-lg">
							<label><small>Pelo menos 8 caracteres</small></label>
						</div>
						<div class="col mt-4">
							<label>* Confirmar Nova Senha:</label>
							<input id="vsenha" type="password" value="<?php echo $senha ?>" class="form-control form-control-lg">
						</div>
					</div>

					<div class="row">
						<div class="col mt-4">
							<label>* E-mail:</label>
							<input required id="email" name="email" type="email" value="<?php echo $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control form-control-lg">
						</div>
						<div class="col mt-4">
							<label>* Confirmar E-mail:</label>
							<input required id="vemail" type="email" value="<?php echo $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control form-control-lg">
						</div>
					</div>
					<div class="" style="float: right;">
						<br>
						<button type="submit" class="btn btn-lg mb-2 btn-confirma">Confirmar!</button>
					</div>
				</form>
			</div>
			<!-- uma margem top -->
			<div style="margin-top: 100px;"></div>
			<!-- Footer -->
		</div>
	</div>

	<footer class="py-5 footer" style="background-color: black;">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Purple Informática 2018</p>
		</div>
		<!-- /.container -->
	</footer>



</body>

</html>