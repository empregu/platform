<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projetos_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->db->query("create table if not exists projetos (
			id integer auto_increment primary key,
			nome varchar(70),
			nick varchar(70) default '',
		    descricao text,
		    participantes text,
		    admins text
		)");
	}
	public function criar_projeto($nome, $nick, $descricao, $participantes, $admins) {
		$codigo_sql = "insert into projetos (nome, nick, descricao, participantes, admins)
			values ('$nome', '$nick', '$descricao', '$participantes', '$admins');";
		$this->db->query($codigo_sql);
	}
	public function existe_nome($nome) {
		$codigo_sql = "select id from projetos where nome = '$nome';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function existe_nick($nick) {
		$codigo_sql = "select id from projetos where nick = '$nick';";
		if ($this->db->query($codigo_sql)->num_rows() != 0) {
			return True;
		} else {
			return False;
		}
	}
	public function pegar_nome_nick($nick) {
		$codigo_sql = "select nome from projetos where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->nome;
	}
	public function pegar_admins_nick($nick) {
		$codigo_sql = "select admins from projetos where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->admins;
	}
	public function pegar_participantes_nick($nick) {
		$codigo_sql = "select participantes from projetos where nick = '$nick';";
		return $this->db->query($codigo_sql)->result()[0]->participantes;
	}
	public function deletar_nick($nick) {
		$codigo_sql = "delete from projetos where nick = '$nick';";
		$this->db->query($codigo_sql);
	}
	
}

?>