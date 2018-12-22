<?php

class Uploadun extends CI_Controller {

        public function __construct() {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function do_upload() {

                // Carregando os models
                $this->load->model('universitarios_model', 'universitarios');

                // checar a sessão no banco de dados
                $existe_universitario = $this->universitarios->existe_sessao($this->session->usuario);
                
                if ($existe_universitario) {

                        $nick_universitario = $this->universitarios->pegar_nick_sessao($this->session->usuario);
                        $dados['nick_universitario'] = $nick_universitario;
                        $dados['quantidade_edicao'] = $this->universitarios->pegar_quantidade_edicao_sessao($this->session->usuario);
                        $dados['nome_universitario'] = $this->universitarios->pegar_nome_sessao($this->session->usuario);

                        $config = array(
                                'upload_path'          => './assets/img/un',
                                'allowed_types'        => 'gif|jpg|jpeg|png',
                                'max_size'             => 100,
                                'max_width'            => 3840,
                                'max_height'           => 2160,
                                'file_name'             => $nick_universitario.'.jpg',
                                'overwrite'            => true,
                        );

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('userfile')) {

                                $dados['error'] = $this->upload->display_errors();

                        } else {

                                $dados['error'] = 'Upload com sucesso.';
                                
                                exec("rm assets/img/un/$nick_universitario");
                                exec("ffmpeg -y -i assets/img/un/$nick_universitario.jpg -vf scale=237:237 assets/img/un/$nick_universitario.jpg");
                                exec("mv assets/img/un/$nick_universitario.jpg assets/img/un/$nick_universitario");

                        }
                        $this->load->view('editarperfilun', $dados);
                }
        }
}
?>