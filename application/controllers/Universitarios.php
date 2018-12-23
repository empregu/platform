<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Universitarios extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function un() {
		// Recebendo o argumento da url
		$universitario_input = $this->uri->segment(2);
		// Carregando o helper form
		$this->load->helper('form');
		// Carregando a biblioteca form_validation
		$this->load->library('form_validation');
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('projetos_model', 'projetos');
		// Procurar no banco de dados
		$existe_universitario = $this->universitarios->existe_nick($universitario_input);

		if ($existe_universitario) {

			$nick = $universitario_input;
			$dados["nome"] = $this->universitarios->pegar_nome_nick($nick);
			$dados["descricao"] = $this->universitarios->pegar_descricao_nick($nick);
			$dados["sessao"] = $this->universitarios->pegar_sessao_nick($nick);

			$input = $this->input->post();

			if (isset($input["submit"])) {

				$this->form_validation->set_rules('nome_projeto', 'Nome Projeto', 'trim|alpha_numeric_spaces|min_length[3]|max_length[400]');
				$existe_projeto = $this->projetos->existe_nick(gerarNick($input["nome_projeto"]));

				if ($this->form_validation->run() == false) {
					// Ocorreram problemas com o input do usuário
					$dados['error'] = validation_errors();
				} elseif ($existe_projeto) {
					$dados['error'] = "Nome já foi usado!";
				} else {
					// Tudo passou pelas verificações
					$this->projetos->criar_projeto($input["nome_projeto"], gerarNick($input["nome_projeto"]), "", $nick, $nick);
					$participa = $this->universitarios->pegar_participa_sessao($this->session->usuario);
					$participa = $participa.",".gerarNick($input["nome_projeto"]);
					$this->universitarios->setar_participa_sessao($participa, $this->session->usuario);
				}
			}

			// Colocar o perfil do universitário na tela
			$participa = $this->universitarios->pegar_participa_nick($nick);
			$participa = explode(',', $participa);
			$dados["participa"] = $participa;
			$dados["nick"] = $nick;

			$this->load->view('universitario', $dados);
		} else {
			// Informação não bateu com o nosso banco de dados
			echo "Universitario(a) não encontrado(a) em nosso sistema.";
		}
	}

	public function meusprojetos() {
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('projetos_model', 'projetos');
		// checar a sessão no banco de dados
		$existe_universitario = $this->universitarios->existe_sessao($this->session->usuario);
		$participa_nick = $this->universitarios->pegar_participa_sessao($this->session->usuario);
		$participa_nick = explode(',', $participa_nick);
		array_shift($participa_nick);
		$participa = [];/*
		foreach ($participa_nick as $key => $value) {
			array_push($participa, $this->projetos->pegar_nome_nick($value));
		}*/
		$dados["participa"] = $participa_nick;
		
		if ($existe_universitario) {
			$this->load->view('meusprojetos', $dados);
		} else {
			$dados['formerror'] = "Você precisa estar logado para editar seu perfil.";
		}
	}

	public function deletarprojeto() {
		// Recebendo o argumento da url
		$projeto_para_deletar = $this->uri->segment(3);
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('projetos_model', 'projetos');
		// checar a sessão no banco de dados
		$existe_universitario = $this->universitarios->existe_sessao($this->session->usuario);
		if ($existe_universitario) {
			$nick_universitario = $this->universitarios->pegar_nick_sessao($this->session->usuario);
			$admins_projeto = explode(',', $this->projetos->pegar_admins_nick($projeto_para_deletar));
			if (in_array($nick_universitario, $admins_projeto)) {
				# deletar o projeto de todos os participantes
				$participantes = explode(',', $this->projetos->pegar_participantes_nick($projeto_para_deletar));
				array_shift($participantes);
				foreach ($participantes as $key => $value) {
					$participa = $this->universitarios->pegar_participa_nick($value);
					$participa = str_replace(",".$projeto_para_deletar, "", $participa);
					$this->universitarios->setar_participa_nick($participa, $value);
				}
				# deletar o projeto em si
				$this->projetos->deletar_nick($projeto_para_deletar);
			}
		}
	}

	public function editarperfil() {
		// Carregando o helper form
		$this->load->helper('form');
		// Carregando a biblioteca form_validation
		$this->load->library('form_validation');
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		// checar a sessão no banco de dados
		$existe_universitario = $this->universitarios->existe_sessao($this->session->usuario);
		
		if ($existe_universitario) {
			// Liberar a edição do perfil do universitário

			$dados['nome_universitario'] = $this->universitarios->pegar_nome_sessao($this->session->usuario);
			$dados['nick_universitario'] = $this->universitarios->pegar_nick_sessao($this->session->usuario);
			$dados['quantidade_edicao'] = $this->universitarios->pegar_quantidade_edicao_sessao($this->session->usuario);

			$input = $this->input->post();

			if (isset($input['submit'])) {
				// Algum campo foi preenchido
				$dados['campo'] = 'algum';
			} else {
				// Nenhum campo foi preenchido
				$dados['campo'] = 'nenhum';
			}

			if ($dados['campo'] == 'algum') {

				if ($input['nome'] != '') {
					// O campo nome foi modificado
					$this->form_validation->set_rules('nome', 'Nome', 'trim|min_length[6]|max_length[70]');
				}

				if ($input['descricao'] != '') {
					// O campo descricao foi modificado
					$this->form_validation->set_rules('descricao', 'Descrição', 'trim|max_length[400]');
				}

				if ($input['email'] != '') {
					// O campo email foi modificado
					$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|min_length[7]|max_length[64]');
				}

				if ($input['senha_antiga'] != '' or $input['senha_nova'] != '' or $input['senha_novac'] != '') {
					// O campo senha foi modificado
					$this->form_validation->set_rules('senha_antiga', 'Senha Antiga',
						'trim|required|min_length[7]|max_length[64]');
					$this->form_validation->set_rules('senha_nova', 'Senha Nova',
						'trim|required|min_length[7]|max_length[64]');
					$this->form_validation->set_rules('senha_novac', 'Confirmação da Senha Nova',
						'trim|required|min_length[7]|max_length[64]|matches[senha_nova]');
				}

				if ($this->form_validation->run() == false) {
					// Ocorreram problemas com o input do usuário
					$dados['formerror'] = validation_errors();
				} else {
					// Tudo passou pelas verificações
					// Agora é necessário verificar se os dados já existem no banco de dados

					$existe_nome = false;
					$existe_email = false;
					$nao_existe_login = false;

					$this->universitarios->setar_descricao_sessao($input['descricao'], $this->session->usuario);

					if ($input['nome'] != '') {
						// O campo nome foi modificado
						if($this->universitarios->existe_nome($input['nome']) or $dados['quantidade_edicao'] <= 0) {
							$dados['formerror'] = "Não foi possível escolher esse nome.";
						} else {
							$this->universitarios->setar_quantidade_edicao_sessao($dados['quantidade_edicao'] - 1, $this->session->usuario);
							$this->universitarios->setar_nome_sessao($input['nome'], $this->session->usuario);
							$nick = str_replace(' ', '_', strtolower($input['nome']));
							rename("assets/img/un/".$dados['nick_universitario'], "assets/img/un/$nick");
							$this->universitarios->setar_nick_sessao($nick, $this->session->usuario);
						}
					}

					if ($input['email'] != '') {
						// O campo email foi modificado
						if($this->universitarios->existe_email($input['email'])) {
							$dados['formerror'] = "Esse email já existe. Escolha outro.";
						} else {
							$this->universitarios->setar_email_sessao($input['email'], $this->session->usuario);
						}
					}

					if ($input['senha_antiga'] != '' or $input['senha_nova'] != '' or $input['senha_novac'] != '') {
						// O campo senha foi modificado
						if (!($this->universitarios->existe_login_sessao($this->session->usuario, $input['senha_antiga']))) {
							$dados['formerror'] = "Senha inválida.";
						} else {
							$this->universitarios->setar_senha_sessao($input['senha_nova'], $this->session->usuario);
						}
					}
				}
			}

			$this->load->view('editarperfilun', $dados);
		} else {
			$dados['formerror'] = "Você precisa estar logado para editar seu perfil.";
		}

	}

}

?>