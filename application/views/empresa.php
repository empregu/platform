<html>
    <head>
        <title> Empregu - <?php echo $nome_empresa ?> </title>
        <link rel='shortcut icon' href='assets/img/logo_empregu.png' />
        <meta charset='UTF-8'>
    </head>
    <body>
        <h1> Empresa: <?php echo $nome_empresa ?> </h1>
        Descrição: <?php echo $descricao_empresa ?> <br>
        Telefone: <?php echo $telefone_empresa ?> <br>

        <?php if ($this->session->usuario == $sessao_empresa) { ?>
        <button onclick="window.location.href='../welcome/unset_session'">Fechar sessão</button>
        <?php } ?>
    </body>
</html>
