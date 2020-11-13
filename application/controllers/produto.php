<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

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
	public function verificar_sessao(){
		if ($this->session->userdata('logado')==false){
				redirect('dashboard/login');
		}
	}
	public function index(){
		
	}
	public function cadastrar()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('produto');
		$this->load->view('includes/html_footer');
	}
	
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$dados['produto'] = $this->db->get('produto')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		if($indice==1){
			$data['msg']="Cadastro concluído com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==2){
			$data['msg']="Houve um Erro ao Cadastrar!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
		else if($indice==3){
			$data['msg']=" Exclusão Efetuada com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==4){
			$data['msg']="Houve um Erro ao Excluír o Cadastro!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
		else if($indice==5){
			$data['msg']=" Alteração Efetuada com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==6){
			$data['msg']="Houve um Erro ao Alterar o Cadastro!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
		$this->load->view('listar_produto',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['status'] = 'A';
			$data['descricao'] = $this->input->post('descricao');
			$data['foto'] = '';
			$data['estoque_minimo'] = $this->input->post('estoque_minimo');
			$data['estoque_maximo'] = $this->input->post('estoque_maximo');

			if($this->db->insert('produto',$data)){
					redirect('produto/listar_cadastro/1');
			}else{
				   redirect('produto/listar_cadastro/2');
			}
		
	}
	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->where('idproduto',$id);
		if($this->db->delete('produto')){
			redirect('produto/listar_cadastro/3');
	}else{
		   redirect('produto/listar_cadastro/4');
	}
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->where('idproduto',$id);
		$data['produto'] = $this->db->get('produto')->result();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_produto',$data);
		$this->load->view('includes/html_footer');

	}

	public function update_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');		
		$data['status'] = $this->input->post('status');
		$data['descricao'] = $this->input->post('descricao');
		$data['foto'] = '';
		$data['estoque_minimo'] = $this->input->post('estoque_minimo');
		$data['estoque_maximo'] = $this->input->post('estoque_maximo');

		$this->db->where('idproduto',$id);

		if($this->db->update('produto',$data)){
				redirect('produto/listar_cadastro/5');
		}else{
			   redirect('produto/listar_cadastro/6');
		}	
	}


}
