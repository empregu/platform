<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Universitarios_model extends CI_Model {

	public function __construct() {

        parent::__construct();
        
	    $this->db->query("create table if not exists universitarios (
		    id integer auto_increment primary key,
			sessao varchar(30) default 'a',
            nome varchar(100),
            quantidade_restante_mudar_nome integer default 2,
            cpf varchar(11),
            apelido varchar(50),
            admin boolean default false,
            descricao text,
            email varchar(256),
            verificacao_email boolean default false,
            senha varchar(32),
            foto varchar(50) default '/assets/img/usuario.png',
            data_cadastro date
        )");
        
    }

    public function existe_sessao($sessao) {
        $this->db->select('id');
        $query = $this->db->get_where('universitarios', array('sessao' => $sessao));
        if ($query->num_rows() != 0) {
            return True;
        } else {
            return False;
        }
    }

    public function existe_apelido_e_senha($apelido, $senha) {
        $this->db->select('id');
        $query = $this->db->get_where('universitarios', array('apelido' => $apelido, 'senha' => $senha));
        if ($query->num_rows() != 0) {
            return True;
        } else {
            return False;
        }
    }

    public function existe_email_e_senha($email, $senha) {
        $this->db->select('id');
        $query = $this->db->get_where('universitarios', array('email' => $email, 'senha' => $senha));
        if ($query->num_rows() != 0) {
            return True;
        } else {
            return False;
        }
    }
}
?>