<?php $this->load->view('header');?>

<section>
	
	<title> Empregu - <?php echo $nome_universitario ?> </title>
	<img src="/assets/img/un/<?php echo $nick_universitario ?>" width="250" height="250">

    <h2 class="titulos">Aqui estão todas as informações da sua conta que você pode mudar!</h2><br>
    <form action="" method="post" accept-charset="utf-8">
        <h4>Nome</h4><br>
        <label>No momento, você só pode alterar seu nome <?php echo $quantidade_edicao; if ($quantidade_edicao == 1) {echo " vez";} else {echo " vezes";} ?>.</label>
        <br><br>
        <input type="text" class="text-input" name="nome" value="<?php echo set_value("nome"); ?>" placeholder="Nome">
        <br><br>
        <h4>Descrição</h4>
        <br><br>
        <input type="text" class="text-input" name="descricao" value="<?php echo set_value("descricao"); ?>" placeholder="Descrição">
        <br><br>
        <h4>Email</h4>
        <br><br>
        <input type="text" class="text-input" name="email" value="<?php echo set_value("email"); ?>" placeholder="Email">
        <br><br>
        <h4>Senha Antiga</h4>
        <br><br>
        <input type="text" class="text-input" name="senha_antiga" value="<?php echo set_value("senha_antiga"); ?>" placeholder="senha_antiga">
        <br><br>
        <h4>Nova Senha</h4>
        <br><br>
        <input type="text" class="text-input" name="senha_nova" value="<?php echo set_value("senha_nova"); ?>" placeholder="Senha Nova">
        <br><br>
        <h4>Repetir Nova Senha</h4>
        <br><br>
        <input type="text" class="text-input" name="senha_novac" value="<?php echo set_value("senha_novac"); ?>" placeholder="Repetir Nova Senha">
        <br><br>
        <input type="submit" class="botao branco">
    </form>

</section>

<?php $this->load->view('footer.php');?>