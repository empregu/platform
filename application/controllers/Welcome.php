<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this->load->model('usuarios_model', 'usuarios');
		$this->load->view('welcome_message');
	}
}
