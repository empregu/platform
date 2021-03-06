<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_universitario extends CI_Controller {



	public function index() {
		redirect("../..");
	}



	public function registrar() {

		// Carregando o helper form
		$this->load->helper('form');
		// Carregando a biblioteca form_validation
		$this->load->library('form_validation');
		// Carregando o model
		$this->load->model('universitarios_model', 'universitarios');
		// Recebendo o input
		$input = $_POST;
		// Recebendo a sessao
		$sessao = $this->session->sessao;			

		if ($this->universitarios->existe_sessao($sessao)) {
			die("usuario ja logado");
		}

		$sessao = gerar_sessao($this->universitarios);
		$this->session->set_userdata('sessao', $sessao);

		/*
		id integer auto_increment primary key,
			sessao varchar(30) default 'a',
            nome varchar(100),
            quantidade_restante_mudar_nome integer default 2,
            cpf varchar(11),
            apelido varchar(50),
            admin boolean default false,
            descricao varchar(700) default 'Um estudante.',
            email varchar(256),
            verificacao_email boolean default false,
            senha varchar(32),
            foto varchar(50) default '/assets/img/usuario.png',
            data_cadastro date */

		if (
			isset($input['apelido']) == false ||
			isset($input['senha']) == false ||
			isset($input['nome']) == false ||
			isset($input['cpf']) == false ||
			isset($input['email']) == false
		) {
			die("sem credenciais o suficiente");
		}

		$apelido = $input['apelido'];
		$senha = $input['senha'];
		$nome = $input['nome'];
		$cpf = $input['cpf'];
		$email = $input['email'];

		if (
			$apelido == "" ||
			$senha == "" ||
			$nome == "" ||
			$cpf == "" ||
			$email == ""
		) {
			die("sem credenciais o suficiente");
		}

		$this->form_validation->set_rules('apelido', 'apelido', 'trim|required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('nome', 'nome', 'trim|required|alpha_numeric|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('cpf', 'cpf', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|min_length[4]|max_length[32]');
	}



	public function deslogar() {

		$this->session->unset_userdata('sessao');
		redirect('../../');

	}



	public function logar() {
		
		// Carregando o helper form
		$this->load->helper('form');
		// Carregando a biblioteca form_validation
		$this->load->library('form_validation');
		// Carregando o model
		$this->load->model('universitarios_model', 'universitarios');
		// Recebendo o input
		$input = $_POST;
		// Recebendo a sessao
		$sessao = $this->session->sessao;			

		if ($this->universitarios->existe_sessao($sessao)) {
			die("usuario ja logado");
		}

		$sessao = gerar_sessao($this->universitarios);
		$this->session->set_userdata('sessao', $sessao);

		if (isset($input['apelido']) == false || isset($input['senha']) == false) {
			die("sem credenciais");
		}

		$apelido = $input['apelido'];
		$senha = $input['senha'];

		if ($apelido == "" || $senha == "") {
			die("sem credenciais");
		}

		$this->form_validation->set_rules('apelido', 'apelido', 'trim|required|min_length[4]|max_length[100]');
		$this->form_validation->set_rules('senha', 'senha', 'trim|required|min_length[4]|max_length[32]');

		if ($this->form_validation->run() == false) {
			die(validation_errors());
		}

		if ($this->universitarios->existe_apelido_e_senha($apelido, $senha)) {

			$this->universitarios->setar_sessao_apelido($sessao, $apelido);

		} else if ($this->universitarios->existe_email_e_senha($apelido, $senha)) {

			$this->universitarios->setar_sessao_email($sessao, $apelido);

		} else {
			die("credenciais invalidas");
		}
	}

	
}
