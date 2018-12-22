<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Universitarios_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->db->query("create table if not exists universitarios (
			id integer auto_increment primary key,
			sessao varchar(30),
			nome varchar(70),
			cpf varchar(11),
			email varchar(64),
			verificacao_email boolean default false,
			senha varchar(64),
			admin boolean default false,
			descricao text,
			nick varchar(70) default '',
			participa text default '',
			quantidade_edicao integer default 2
		)");
	}

	public function existe_login_email($email, $senha) {
		$codigo_sql = "select id from universitarios where email = '$email' and senha = '$senha';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}

	public function existe_login_sessao($sessao, $senha) {
		$codigo_sql = "select id from universitarios where sessao = '$sessao' and senha = '$senha';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}

	public function setar_nome_sessao($nome, $sessao) {
		$codigo_sql = "update universitarios set nome = '$nome' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_descricao_sessao($descricao, $sessao) {
		$codigo_sql = "update universitarios set descricao = '$descricao' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_email_sessao($email, $sessao) {
		$codigo_sql = "update universitarios set email = '$email' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_senha_sessao($senha, $sessao) {
		$codigo_sql = "update universitarios set senha = '$senha' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_quantidade_edicao_sessao($quantidade_edicao, $sessao) {
		$codigo_sql = "update universitarios set quantidade_edicao = '$quantidade_edicao' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_nick_sessao($nick, $sessao) {
		$codigo_sql = "update universitarios set nick = '$nick' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_participa_sessao($participa, $sessao) {
		$codigo_sql = "update universitarios set participa = '$participa' where sessao = '$sessao';";
		$this->db->query($codigo_sql);
	}
	public function setar_sessao_login($sessao, $email, $senha) {
		$codigo_sql = "update universitarios set sessao = '$sessao' where email = '$email' and senha = '$senha';";
		$this->db->query($codigo_sql);
	}
	public function setar_nome_nick($nome, $nick) {
		$codigo_sql = "update universitarios set nome = '$nome' where nick = '$nick';";
		$this->db->query($codigo_sql);
	}
	public function setar_descricao_nick($descricao, $nick) {
		$codigo_sql = "update universitarios set descricao = '$descricao' where nick = '$nick';";
		$this->db->query($codigo_sql);
	}
	public function setar_email_nick($email, $nick) {
		$codigo_sql = "update universitarios set email = '$email' where nick = '$nick';";
		$this->db->query($codigo_sql);
	}
	public function setar_senha_nick($senha, $nick) {
		$codigo_sql = "update universitarios set senha = '$senha' where nick = '$nick';";
		$this->db->query($codigo_sql);
	}

	public function criar_usuario($sessao, $nome, $cpf, $email, $senha, $nick) {
		$codigo_sql = "insert into universitarios (sessao, nome, cpf, email, senha, nick, descricao)
			values ('$sessao', '$nome', '$cpf', '$email', '$senha', '$nick', '');";
		$this->db->query($codigo_sql);
	}
	public function existe_sessao($sessao) {
		$codigo_sql = "select id from universitarios where sessao = '$sessao';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_nome($nome) {
		$codigo_sql = "select id from universitarios where nome = '$nome';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_nick($nick) {
		$codigo_sql = "select id from universitarios where nick = '$nick';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_cpf($cpf) {
		$codigo_sql = "select id from universitarios where cpf = '$cpf';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_email($email) {
		$codigo_sql = "select id from universitarios where email = '$email';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function pegar_id_sessao($sessao) {
		$codigo_sql = "select id from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->id;
	}
	public function pegar_nick_sessao($sessao) {
		$codigo_sql = "select nick from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->nick;
	}
	public function pegar_nome_sessao($sessao) {
		$codigo_sql = "select nome from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->nome;
	}
	public function pegar_quantidade_edicao_sessao($sessao) {
		$codigo_sql = "select quantidade_edicao from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->quantidade_edicao;
	}
	public function pegar_participa_sessao($sessao) {
		$codigo_sql = "select participa from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->participa;
	}
	public function pegar_descricao_sessao($sessao) {
		$codigo_sql = "select descricao from universitarios where sessao = '$sessao';";
		return $this->db->query($codigo_sql)->result()[0]->descricao;
	}
	public function pegar_nome_nick($nick) {
		$codigo_sql = "select nome from universitarios where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->nome;
	}
	public function pegar_descricao_nick($nick) {
		$codigo_sql = "select descricao from universitarios where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->descricao;
	}
	public function pegar_sessao_nick($nick) {
		$codigo_sql = "select sessao from universitarios where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->sessao;
	}
	public function pegar_quantidade_edicao_nick($nick) {
		$codigo_sql = "select quantidade_edicao from universitarios where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->quantidade_edicao;
	}
	public function pegar_participa_nick($nick) {
		$codigo_sql = "select participa from universitarios where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->participa;
	}
}

?>
