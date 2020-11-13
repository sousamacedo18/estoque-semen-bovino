<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Animal extends CI_Controller {

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
		
	}
	public function cadastrar()
	{
		
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa());
		$dados['cadastro'] = $this->db->get('cadastro')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('animal',$dados);
		$this->load->view('includes/html_footer');
	}
	
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa());
		$dados['animal'] = $this->db->get('animal')->result();
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
		$this->load->view('listar_animal',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['nomeanimal'] = $this->input->post('nomeanimal');
			$data['raca'] = $this->input->post('raca');
			$data['iduser'] = $this->session->userdata('id');
			$data['chave_auth_animal']=$this->buscar_chave_empresa();



			if($this->db->insert('animal',$data)){
					redirect('animal/listar_cadastro/1');
			}else{
				   redirect('animal/listar_cadastro/2');
			}
		
	}
	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->like('chave_auth_animal',$this->buscar_chave_empresa());
		$this->db->where('idanimal',$id);
		if($this->db->delete('animal')){
			redirect('animal/listar_cadastro/3');
	}else{
		   redirect('animal/listar_cadastro/4');
	}
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa());
		$this->db->where('idanimal',$id);
		$data['animal'] = $this->db->get('animal')->result();
		$this->db->select('*');
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa());
		$this->db->order_by('nome','ASC');
		$data['cadastro'] = $this->db->get('cadastro')->result();



		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_animal',$data);
		$this->load->view('includes/html_footer');

	}
	public function montar_select_animal(){
		$this->verificar_sessao();	
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
		$this->db->order_by("nomeanimal");
		$dados= $this->db->get('animal')->result();
		foreach($dados as $row){

			echo"<option value =$row->idanimal>".$row->nomeanimal."</option>";
		}
	}
	public function update_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');		
		$data['idproprietario'] = $this->input->post('idproprietario');
		$data['nomeanimal'] = $this->input->post('nomeanimal');
		$data['raca'] = $this->input->post('raca');
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa());
		$this->db->where('idanimal',$id);

		if($this->db->update('animal',$data)){
				redirect('animal/listar_cadastro/5');
		}else{
			   redirect('animal/listar_cadastro/6');
		}	
	}


}
