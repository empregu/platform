<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();

	}

	public function unset_session() {
		$this->session->unset_userdata('usuario');
		redirect('../../');
	}

	public function em() {
		// Recebendo o argumento da url
		$empresa_input = $this->uri->segment(2);
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('empresas_model', 'empresas');
		// Procurar no banco de dados
		$existe_empresa = $this->empresas->existe_nick($empresa_input);
		// Criando o array de dados

		if ($existe_empresa) {
			// Colocar o perfil da empresa na tela
			$nick_empresa = $empresa_input;
			$dados["nome_empresa"] = $this->empresas->pegar_nome_nick($nick_empresa);
			$dados["descricao_empresa"] = $this->empresas->pegar_descricao_nick($nick_empresa);
			$dados["telefone_empresa"] = $this->empresas->pegar_telefone_nick($nick_empresa);
			$dados["sessao_empresa"] = $this->empresas->pegar_sessao_nick($nick_empresa);
			$dados["nick_empresa"] = $nick_empresa;

			$this->load->view('empresa', $dados);
		} else {
			// Informação não bateu com o nosso banco de dados
			echo "Empresa não encontrada em nosso sistema.";

		}
	}

	public function un() {
		// Recebendo o argumento da url
		$universitario_input = $this->uri->segment(2);
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('empresas_model', 'empresas');
		// Procurar no banco de dados
		$existe_universitario = $this->universitarios->existe_nick($universitario_input);

		if ($existe_universitario) {
			// Colocar o perfil do universitario na tela
			$nick_universitario = $universitario_input;
			$dados["nome_universitario"] = $this->universitarios->pegar_nome_nick($nick_universitario);
			$dados["descricao_universitario"] = $this->universitarios->pegar_descricao_nick($nick_universitario);
			$dados["sessao_universitario"] = $this->universitarios->pegar_sessao_nick($nick_universitario);
			$dados["nick_universitario"] = $nick_universitario;

			// Carregando a biblioteca form_validation
			$this->load->library('form_validation');

			$this->load->view('universitario', $dados);
		} else {
			// Informação não bateu com o nosso banco de dados
			echo "Universitario(a) não encontrado(a) em nosso sistema.";

		}
	}

	public function index() {
		// Carregando o helper form
		$this->load->helper('form');
		// Carregando a biblioteca form_validation
		$this->load->library('form_validation');
		// Carregando os models
		$this->load->model('universitarios_model', 'universitarios');
		$this->load->model('empresas_model', 'empresas');

		// checar a sessao no banco de dados
		$existe_universitario = $this->universitarios->existe_sessao($this->session->usuario);
		$existe_empresa = $this->empresas->existe_sessao($this->session->usuario);

		if ($existe_empresa) {
			// Redirecionar para a página da empresa
			$nick = $this->empresas->pegar_nick_sessao($this->session->usuario);
			redirect("../../em/$nick");
		} elseif ($existe_universitario) {
			// Redirecionar para a página do universitário
			$nick = $this->universitarios->pegar_nick_sessao($this->session->usuario);
			redirect("../../un/$nick");
		} else {
			// Se não tem, criamos uma
			$this->session->set_userdata('usuario', gerarStringsAleatorias($this->universitarios, $this->empresas));

			// Recebendo os dados
			$input = $this->input->post();

			// Criando o campo
			$dados['campo'] = '';

			if (isset($input['email_login'])) {
				// Se o campo de login for preenchido
				$dados['campo'] = 'login';
				$this->form_validation->set_rules('email_login', 'Email', 'trim|required|valid_email|min_length[7]|max_length[64]');
				$this->form_validation->set_rules('senha_login', 'Senha', 'trim|required|min_length[7]|max_length[64]');

			} elseif (isset($input['nome_registrar_universitario'])) {
				// Se o campo de universitário for preenchido
				$dados['campo'] = 'un';
				$this->form_validation->set_rules('nome_registrar_universitario', 'Nome Completo',
					'trim|required|min_length[6]|max_length[70]');
				$this->form_validation->set_rules('email_registrar_universitario', 'Email',
					'trim|required|valid_email|min_length[7]|max_length[64]');
				$this->form_validation->set_rules('cpf_registrar_universitario', 'CPF',
					'trim|required|exact_length[11]|is_natural');
				$this->form_validation->set_rules('senha_registrar_universitario', 'Senha',
					'trim|required|min_length[7]|max_length[64]');
				$this->form_validation->set_rules('senhac_registrar_universitario', 'Confirmar Senha',
					'trim|required|matches[senha_registrar_universitario]');

			} elseif (isset($input['cnpj_registrar_empresa'])) {
				// Se o campo de empresa for preenchido
				$dados['campo'] = 'em';
				$this->form_validation->set_rules('cnpj_registrar_empresa', 'CNPJ',
					'trim|required|exact_length[14]|is_natural');
				$this->form_validation->set_rules('nome_registrar_empresa', 'Nome',
					'trim|required|min_length[6]|max_length[70]');
				$this->form_validation->set_rules('telefone_registrar_empresa', 'Telefone',
					'trim|required|min_length[12]|max_length[13]');
				$this->form_validation->set_rules('email_registrar_empresa', 'Email',
					'trim|required|valid_email|min_length[7]|max_length[64]');
				$this->form_validation->set_rules('senha_registrar_empresa', 'Senha',
					'trim|required|min_length[7]|max_length[64]');
				$this->form_validation->set_rules('senhac_registrar_empresa', 'Confirmar Senha',
					'trim|required|matches[senha_registrar_empresa]');

			} else {
				// O usuário acabou de entrar na página
				$dados['campo'] = 'nenhum';
			}

			// Utilizando as regras de validação nas entradas
			if ($this->form_validation->run() == false) {
				// $dados['formerror'] = $dados['campo'] . validation_errors();  <- Isso foi pra debugar
				$dados['formerror'] = validation_errors();
			} else {
				// Precisamos verificar se o registro já existe

				if ($dados['campo'] == 'login') {
					// É login
					// Checando no banco de dados

					if ($this->universitarios->existe_login_email($input['email_login'], $input['senha_login'])) {
						// Existe login de universitário
						$this->universitarios->setar_sessao_login(
							$this->session->usuario,
							$input['email_login'],
							$input['senha_login']);
						$nick = $this->empresas->pegar_nick_sessao($this->session->usuario);
						redirect('..', 'refresh');
					} elseif ($this->empresas->existe_login_email($input['email_login'], $input['senha_login'])) {
						// Existe login de empresa
						$this->empresas->setar_sessao_login($this->session->usuario,
							$input['email_login'], $input['senha_login']);
						$nick = $this->empresas->pegar_nick_sessao($this->session->usuario);
						redirect('..', 'refresh');
					} else {
						$dados['formerror'] = 'Dados inválidos.';
					}

				} elseif ($dados['campo'] == 'un') {
					// É registro de um universitario
					$nick = gerarNick($input['nome_registrar_universitario']);
					// Checando se existe outro registro
					if ($this->universitarios->existe_nome($input['nome_registrar_universitario']) or
						$this->universitarios->existe_nick($nick) or
						$this->universitarios->existe_cpf($input['cpf_registrar_universitario']) or
						$this->universitarios->existe_email($input['email_registrar_universitario'])) {
						$existe_registro = True;
					} else {
						$existe_registro = False;
					}

					if ($existe_registro) {
						// Já existe registro
						$dados['formerror'] = 'Já existe registro.';
					} else {
						// Criando usuario no banco de dados
						$dados['formerror'] = 'Usuário criado.';

						$this->universitarios->criar_usuario(
							$this->session->usuario,
							$input['nome_registrar_universitario'],
							$input['cpf_registrar_universitario'],
							$input['email_registrar_universitario'],
							$input['senha_registrar_universitario'],
							$nick,
							'');

						// Criando a foto de perfil padrão
						copy("assets/img/user.png", "assets/img/un/$nick");

						redirect('..', 'refresh');
					}
				} elseif ($dados['campo'] == 'em') {
					// É registro de uma empresa
					$nick = gerarNick($input['nome_registrar_empresa']);
					// Checando se existe outro registro
					if ($this->empresas->existe_nome($input['nome_registrar_empresa']) or
						$this->empresas->existe_nick($nick) or
						$this->empresas->existe_cnpj($input['cnpj_registrar_empresa']) or
						$this->empresas->existe_email($input['email_registrar_empresa']) or
						$this->empresas->existe_telefone($input['telefone_registrar_empresa'])) {
						$existe_registro = True;
					} else {
						$existe_registro = False;
					}

					if ($existe_registro) {
						$dados['formerror'] = 'Já existe registro.';
					} else {
						// Criando usuario no banco de dados
						$dados['formerror'] = 'Usuário criado.';

						$this->empresas->criar_usuario(
							$this->session->usuario,
							$input['nome_registrar_empresa'],
							$input['cnpj_registrar_empresa'],
							$input['telefone_registrar_empresa'],
							$input['email_registrar_empresa'],
							$input['senha_registrar_empresa'],
							$nick,
							'');

						// Criando a foto de perfil padrão
						copy("assets/img/user.png", "assets/img/em/$nick");

						redirect('..', 'refresh');
					}
				}
			}
			// Colocando o index na tela
			$this->load->view('index', $dados);
		}
	}

}

?>
