<?php $this->load->view('header');?>

<section>

    <img src="[image]" width=0 alt=""> <!-- make to refresh -->
	
	<title> Empregu - <?php echo $nome_universitario ?> </title>
	<img src="/assets/img/un/<?php echo $nick_universitario ?>" width="250" height="250" onClick="">
    
    <div>
        <?php if (isset($error)) {echo $error;} ?>

        <?php echo form_open_multipart('../../uploadun/do_upload');?>

        <input type="file" name="userfile" size="20">

        <br><br>

        <input type="submit" value="upload">

        </form>
    </div>

    <h2 class="titulos">Aqui estão todas as informações da sua conta que você pode mudar!</h2><br>
    <button class="botao" onclick="window.location.href='../../'">Visualizar perfil</button><br><br>
    <form action="../../un/editarperfil" method="post" accept-charset="utf-8">
        <h4>Nome</h4><br>
        <label><?php if ($quantidade_edicao == 0) { ?>
        	Você não pode mais alterar seu nome.
        <?php } elseif ($quantidade_edicao == 1) { ?>
        	No momento, você só pode alterar seu nome mais uma vez.
        <?php } else { ?>
        	No momento, você só pode alterar seu nome <?php echo $quantidade_edicao ?> vezes.
        <?php } ?></label>
        <br><br>
        <input type="text" class="text-input" name="nome" value="<?php echo set_value("nome"); ?>" placeholder="Nome">
        <br><br>
        <h4>Descrição</h4>
        <br><br>
        <input type="text" class="text-input" name="descricao" value="<?php echo set_value("descricao"); ?>" placeholder="Descrição">
        <br><br>
        <h4>Email</h4>
        <br><br>
        <input type="email" class="text-input" name="email" value="<?php echo set_value("email"); ?>" placeholder="Email">
        <br><br>
        <h4>Senha Antiga</h4>
        <br><br>
        <input type="password" class="text-input" name="senha_antiga" value="<?php echo set_value("senha_antiga"); ?>" placeholder="senha_antiga">
        <br><br>
        <h4>Nova Senha</h4>
        <br><br>
        <input type="password" class="text-input" name="senha_nova" value="<?php echo set_value("senha_nova"); ?>" placeholder="Senha Nova">
        <br><br>
        <h4>Repetir Nova Senha</h4>
        <br><br>
        <input type="password" class="text-input" name="senha_novac" value="<?php echo set_value("senha_novac"); ?>" placeholder="Repetir Nova Senha">
        <br><br>
        <input type="submit" name="submit" class="botao branco">
    </form>

    <?php if (isset($formerror)) { ?>
	<h1>
	<?php echo $formerror; ?>
	</h1>
	<?php } ?>

</section>

<?php $this->load->view('footer.php');?>