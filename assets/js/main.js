function form_login(){

	// Vendo se o form_login esta na tela
	var element = document.getElementById('form_login'),
    style = window.getComputedStyle(element),
    form_login_display = style.getPropertyValue('display');

    // Tendo acesso aos botoes do index
    var botoes_do_index = document.getElementsByClassName("botoes-do-index");
    var titulo_do_index = document.getElementsByClassName("titulo-do-index");

    // Se o form_login ainda nao esta na tela, coloque
	if(form_login_display == "none") {
		// Tirando os botoes
		botoes_do_index[0].style.animation = "fechar_botao 0.4s";
		botoes_do_index[1].style.animation = "fechar_botao 0.4s";
		titulo_do_index[0].style.animation = "fechar_h1 0.4s";
		titulo_do_index[1].style.animation = "fechar_h2 0.4s";

		setTimeout(function () {
			document.getElementById('form_login').style.display = "block";
		    document.getElementById('botoes-do-index').style.display = "none";

			// Abrindo janela
			document.getElementById('form_login').style.animation = "abrir_janela 0.4s";
		    }, 350);
	}

	// Se o form_login esta na tela, tire
	if(form_login_display == "block") {
		// Tirando a janela
		document.getElementById('form_login').style.animation = "fechar_janela 0.4s";

		setTimeout( function () {
			document.getElementById('form_login').style.display = "none";
			document.getElementById('botoes-do-index').style.display = "block";

			// Colocando os botoes
			botoes_do_index[0].style.animation = "abrir_botao 0.4s";
			botoes_do_index[1].style.animation = "abrir_botao 0.4s";
			titulo_do_index[0].style.animation = "abrir_h1 0.4s";
			titulo_do_index[1].style.animation = "abrir_h2 0.4s";
		}, 350)	
	    
	}
	
}








function form_registrar(){

	// Vendo se o form_registrar esta na tela
	var element = document.getElementById('form_registrar'),
    style = window.getComputedStyle(element),
    form_registrar_display = style.getPropertyValue('display');

    // Tendo acesso aos botoes do index
    var botoes_do_index = document.getElementsByClassName("botoes-do-index");

    // Se o form_registrar ainda nao esta na tela, coloque
	if(form_registrar_display == "none") {
		// Tirando os botoes
		botoes_do_index[0].style.animation = "fechar_botao 0.4s";
		botoes_do_index[1].style.animation = "fechar_botao 0.4s";

		setTimeout(function () {
			document.getElementById('form_registrar').style.display = "block";
		    document.getElementById('botoes-do-index').style.display = "none";

			// Abrindo janela
			document.getElementById('form_registrar').style.animation = "abrir_janela 0.4s";
		    }, 350);
	}

	// Se o form_registrar esta na tela, tire
	if(form_registrar_display == "block") {
		// Tirando a janela
		document.getElementById('form_registrar').style.animation = "fechar_janela 0.4s";

		setTimeout( function () {
			document.getElementById('form_registrar').style.display = "none";
			document.getElementById('botoes-do-index').style.display = "block";

			// Colocando os botoes
			botoes_do_index[0].style.animation = "abrir_botao 0.4s";
			botoes_do_index[1].style.animation = "abrir_botao 0.4s";
		}, 350)	
	    
	}
	
}