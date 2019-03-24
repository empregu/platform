<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Empregü</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/assets/css/main.css">

</head>
<body class="right-nice">

<nav>
    <div class="nav-wrapper grey lighten-3">
        <a href="#" class="brand-logo nice-text left" style="margin-left: 1%; font-weight: 300;">Empregü</a>
        <ul id="nav-mobile" class="right">
        <li><a href="#sobre" class="nice-text">Sobre nós</a></li>
        </ul>
    </div>
</nav>

<ul id="tabs-swipe-demo" class="tabs hide">
<li class="tab col s3"><a href="#logar">Logar</a></li>
<?php if($pagina == "registrar") { ?>
<li class="tab col s3"><a class="active" href="#registrar">Registrar</a></li>
<?php } else { ?>
<li class="tab col s3"><a href="#registrar">Registrar</a></li>
<?php } ?>
</ul>

<section id="logar">
<?php $this->load->view('paginas_de_entrada/logar') ?>
</section>

<section id="registrar">
<?php $this->load->view('paginas_de_entrada/registrar') ?>
</section>
<?php $this->load->view('paginas_de_entrada/sobre') ?>
<section id="sobre">

</section>

</body>
<script src="/assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="/assets/js/html2canvas.min.js"></script>
    <script src="/assets/js/paginas_de_entrada.js"></script>
</html>