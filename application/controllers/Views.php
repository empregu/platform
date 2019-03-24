<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

	public function index() {
		redirect("../..");
	}

	public function logar() {
		$dados["pagina"] = "logar";
		$this->load->view('paginas_de_entrada', $dados);
	}

	public function registrar() {
		$dados["pagina"] = "registrar";
		$this->load->view('paginas_de_entrada', $dados);
	}

	public function home() {
		// não esqueça de verificar se o usuário esta logado

		// Carregando o model
		$this->load->model('universitarios_model', 'universitarios');
		// Recebendo a sessao
		$sessao = $this->session->sessao;			

		if ($this->universitarios->existe_sessao($sessao)) {
			/*
			$dados["nome"] = 
			$dados["apelido"] = 
			$dados["descricao"] = 
			$dados["email"] = 
			$dados["verificacao_email"] = 
			$dados["foto"] = 
			$dados["data_cadastro"] = 
			*/
			$this->load->view('home');
		} else {
			$dados["pagina"] = "logar";
			$this->load->view('paginas_de_entrada', $dados);
		}
	}

	public function visualizar_perfil_universitario() {
		$this->load->view('perfil');
	}
}
