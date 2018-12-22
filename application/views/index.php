<?php $this->load->view('header');?>
		<section>
			<video autoplay loop id="background" poster="">
				<source src="../assets/vids/fundo.mp4" type="video/mp4">
				<source src="../assets/vids/fundo.webm" type="video/webm">
			</video>
			<div id="botoes-do-index" align="center">
				<h1 class="titulo-do-index" >Empregü</h1>
				<h2 class="titulo-do-index" >A sua experiência vale muito mais.</h2>
				<button align="center" class="botao botoes-do-index" onclick="form_login()"> Logar </button>
				<button align="center" class="botao botoes-do-index" onclick="form_registrar()"> Registrar </button>
			</div>
			<!--  FORMULARIO DE LOGIN  -->
			<div id="form_login">
				<button class="seta" onclick="form_login()"><img src="../../assets/img/seta.png"></button>
				<h1 align="center" >Login</h1>
				<form action="" method="post" accept-charset="utf-8">
					<input type="email" class="text-input" name="email_login" value="<?php echo set_value("email_login"); ?>" placeholder="Email">
					<br><br>
					<input type="password" class="text-input" name="senha_login" value="" placeholder="Senha">
					<br><br>
					<input type="submit" class="botao">
				</form>
			</div>
			<!--  FORMULARIO DE REGISTRO  -->
			<div id="form_registrar">
				<button class="seta" onclick="form_registrar()"><img src="../../assets/img/seta.png"></button>
				<!-- UNIVERSITARIO -->
				<form action="" id="universitario" method="post" accept-charset="utf-8">
					<h1 align="center">Universitários</h1>
					<input type="text" class="text-input" name="nome_registrar_universitario" value="<?php echo set_value("nome_registrar_universitario"); ?>" placeholder="Nome Completo">
					<br><br>
					<input type="email" class="text-input" name="email_registrar_universitario" value="<?php echo set_value("email_registrar_universitario"); ?>" placeholder="Email">
					<br><br>
					<input type="text" class="text-input" name="cpf_registrar_universitario" value="<?php echo set_value("cpf_registrar_universitario"); ?>" placeholder="CPF">
					<br><br>
					<input type="password" class="text-input" name="senha_registrar_universitario" value="" placeholder="Senha">
					<br><br>
					<input type="password" class="text-input" name="senhac_registrar_universitario" value="" placeholder="Repetir Senha">
					<br><br>
					<input type="submit" class="botao">
				</form>
				<!-- EMPRESAS -->
				<form id="empresas" action="" method="post" accept-charset="utf-8">
					<h1 align="center">Empresas</h1>
					<input type="text" class="text-input" name="cnpj_registrar_empresa" value="<?php echo set_value("cnpj_registrar_empresa"); ?>" placeholder="CNPJ">
					<br><br>
					<input type="text" class="text-input" name="nome_registrar_empresa" value="<?php echo set_value("nome_registrar_empresa"); ?>" placeholder="Nome">
					<br><br>
					<input type="text" class="text-input" name="telefone_registrar_empresa" value="<?php echo set_value("telefone_registrar_empresa"); ?>" placeholder="Telefone">
					<br><br>
					<input type="email" class="text-input" name="email_registrar_empresa" value="<?php echo set_value("email_registrar_empresa"); ?>" placeholder="Email">
					<br><br>
					<input type="password" class="text-input" name="senha_registrar_empresa" value="" placeholder="Senha">
					<br><br>
					<input type="password" class="text-input" name="senhac_registrar_empresa" value="" placeholder="Repetir Senha">
					<br><br>
					<input type="submit" class="botao regis">
				</form>
			</div>
		</section>
			<!-- <img id="empregu_onepage" src="assets/img/empregu_onepage.png" width="1664" height=""> -->

<?php if (isset($formerror) and $campo != 'nenhum') { ?>
	<h1>
	<?php echo $formerror; ?>
	</h1>
<?php } ?>

<?php $this->load->view('footer.php');?>