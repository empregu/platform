<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->db->query("create table if not exists empresas (
			id integer auto_increment primary key,
			sessao varchar(30),
			nome varchar(70),
			cnpj varchar(14),
			telefone varchar(18),
			email varchar(64),
			verificacao_email boolean default false,
			senha varchar(64),
			ferramentas_compradas text default '',
		    admin boolean default false,
		    descricao text,
		    nick varchar(70) default ''
		)");
	}

	public function existe_login_email($email, $senha) {
		$codigo_sql = "select id from empresas where email = '$email' and senha = '$senha';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}

	public function setar_sessao_login($sessao, $email, $senha) {
		$codigo_sql = "update empresas set sessao = '$sessao' where email = '$email' and senha = '$senha';";
		$this->db->query($codigo_sql);
	}

	public function criar_usuario($sessao, $nome, $cnpj, $telefone, $email, $senha, $nick) {
		$codigo_sql = "insert into empresas (sessao, nome, cnpj, telefone, email, senha, nick, descricao)
			values ('$sessao', '$nome', '$cnpj', '$telefone', '$email', '$senha', '$nick', '');";
		$this->db->query($codigo_sql);
	}
	public function existe_sessao($sessao) {
		$codigo_sql = "select id from empresas where sessao = '$sessao';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_nome($nome) {
		$codigo_sql = "select id from empresas where nome = '$nome';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_nick($nick) {
		$codigo_sql = "select id from empresas where nick = '$nick';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_cnpj($cnpj) {
		$codigo_sql = "select id from empresas where cnpj = '$cnpj';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_email($email) {
		$codigo_sql = "select id from empresas where email = '$email';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_telefone($telefone) {
		$codigo_sql = "select id from empresas where telefone = '$telefone';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function pegar_id_sessao($sessao) {
		$codigo_sql = "select id from empresas where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->id;
	}
	public function pegar_nick_sessao($sessao) {
		$codigo_sql = "select nick from empresas where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->nick;
	}
	public function pegar_nome_nick($nick) {
		$codigo_sql = "select nome from empresas where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->nome;
	}
	public function pegar_descricao_nick($nick) {
		$codigo_sql = "select descricao from empresas where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->descricao;
	}
	public function pegar_telefone_nick($nick) {
		$codigo_sql = "select telefone from empresas where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->telefone;
	}
	public function pegar_sessao_nick($nick) {
		$codigo_sql = "select sessao from empresas where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->sessao;
	}
}

?>
