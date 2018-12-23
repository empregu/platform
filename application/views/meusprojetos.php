<?php foreach($participa as $projeto) { ?>
<div>
<?php echo $projeto; ?>
<button>Editar</button>
<button onClick="window.location.href='''../../deletarprojeto/<?php echo gerarNick($projeto);?>'">Excluir</button>
</div>
<?php } ?>
