<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propriedade extends CI_Controller {

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
	private function buscar_chave_empresa(){
		$id=$this->session->userdata('id');
		$this->db->where("idusuario",$id);
		$dados=$this->db->get("usuario")->result();
		return $dados[0]->chave_auth_usuario;
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
		$this->load->view('propriedade',$dados);
		$this->load->view('includes/html_footer');
	}



	public function listadinamica()
	{
		$id=$this->input->post('id');
	
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		$this->db->where('idproprietario',$id);
		
		$dados= $this->db->get('propriedade')->result();
		
	
		foreach($dados as $row){
		echo"<option value=$row->idpropriedade;>";
		 echo$row->nomepropriedade;
		 echo"</option>";
		
	}	
		
	}
	public function montar()
	{
		$id=$this->input->post('id');
	
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		$this->db->where('idproprietario',$id);
		
		$dados= $this->db->get('propriedade')->result();
		
	   if($dados>0){
		foreach($dados as $row){
		echo "<div class='col-md-12'> <b>NOME</b>: ";
		 echo$row->nomepropriedade;
		 echo"</div>";
		}
		}
		else{
			echo "<div class='col-md-12'>";
			echo" Sem dados!";
			echo"</div>";	
		}
		
	}	
	public function montar_propriedade()
	{
		$id=$this->input->post('id');
	
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		$this->db->where('idproprietario',$id);
		
		$dados= $this->db->get('propriedade')->result();
		echo"<option></option>";
	   if($dados>0){
		foreach($dados as $row){
		echo"<option value $row->idpropriedade>$row->nomepropriedade</option>";
		}
		}
		
	}	
		
	
	
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$dados['propriedade'] = $this->db->get('propriedade')->result();
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
		$this->load->view('listar_propriedade',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['idproprietario'] = $this->input->post('idproprietario');
			$data['nomepropriedade'] = $this->input->post('nomepropriedade');
			$data['inscestadual'] = $this->input->post('inscestadual');
			$data['enderecopropriedade'] = $this->input->post('enderecopropriedade');
			$data['municipiopropriedade'] = $this->input->post('municipiopropriedade');
			$data['ufpropriedade'] = $this->input->post('ufpropriedade');
			$data['chave_auth_propriedade']=$this->buscar_chave_empresa();


			if($this->db->insert('propriedade',$data)){
					redirect('propriedade/listar_cadastro/1');
			}else{
				   redirect('propriedade/listar_cadastro/2');
			}
		
	}
	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa(),"none");
		$this->db->where('idpropriedade',$id);
		if($this->db->delete('propriedade')){
			redirect('propriedade/listar_cadastro/3');
	}else{
		   redirect('propriedade/listar_cadastro/4');
	}
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$chave=$this->buscar_chave_empresa();
		$this->db->like("chave_auth_cadastro",$chave);
		$data['cadastro'] = $this->db->get('cadastro')->result();

		$this->db->where('idpropriedade',$id);
		$this->db->like("chave_auth_propriedade",$chave);
		$data['propriedade'] = $this->db->get('propriedade')->result();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_propriedade',$data);
		$this->load->view('includes/html_footer');

	}

	public function update_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');		
		$data['idproprietario'] = $this->input->post('idproprietario');
		$data['nomepropriedade'] = $this->input->post('nomepropriedade');
		$data['inscestadual'] = $this->input->post('inscestadual');
		$data['enderecopropriedade'] = $this->input->post('enderecopropriedade');
		$data['municipiopropriedade'] = $this->input->post('municipiopropriedade');
		$data['ufpropriedade'] = $this->input->post('ufpropriedade');
		$data['iduser'] = $this->input->post('id');
		$this->db->where('idpropriedade',$id);
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		if($this->db->update('propriedade',$data)){
				redirect('propriedade/listar_cadastro/5');
		}else{
			   redirect('propriedade/listar_cadastro/6');
		}	
	}


}
