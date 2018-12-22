<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Empresas extends CI_Controller {
		
	public function __construct() {
		parent::__construct();

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
}

?>