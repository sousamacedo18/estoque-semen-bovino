<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Andrologico extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function buscar_chave_empresa(){
		$iduser=$this->session->userdata('id');
		$this->db->where("idusuario",$iduser);
		$dados=$this->db->get('usuario')->result();
		return $dados[0]->chave_auth_usuario;
	}
	public function verificar_sessao(){
		if ($this->session->userdata('logado')==false){
				redirect('dashboard/login');
		}
	}

	public function index(){
        $this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa());
		//$dados['cadastro'] = $this->db->get('cadastro')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastrar_andrologico');
		$this->load->view('includes/html_footer');
    }
}
?>