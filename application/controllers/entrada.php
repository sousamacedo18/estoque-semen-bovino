<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

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
		$this->db->select("*");
		$data['cadastro'] = $this->db->get('cadastro')->result();
		$this->db->select("*");
		$data['produto'] = $this->db->get('produto')->result();
		$this->db->select("*");
		$data['botijao'] = $this->db->get('botijao')->result();
		$this->db->select("*");
		$data['animal'] = $this->db->get('animal')->result();
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('entrada',$data);
		$this->load->view('includes/html_footer');
	}
	
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->join('cadastro','identcliente=idcadastro','inner');
        $this->db->join('animal','identanimal=idanimal','inner');
        $this->db->join('botijao','identbotijao=idbotijao','inner');
        $this->db->join('estoque','identestoque=idestoque','inner');
      
  

		$dados['entrada_semem'] = $this->db->get('entrada_semem')->result();
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
		$this->load->view('listar_entrada',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
		
			$data['identproduto'] = $this->input->post('identproduto');
			$data['idfornecedor'] = $this->input->post('idfornecedor');
			$data['idcliente'] = $this->input->post('idcliente');
			$data['identanimal'] = $this->input->post('identanimal');
			$data['identbotijao'] = $this->input->post('identbotijao');
			$data['qtde'] = $this->input->post('qtde');
			$data['valor_unitario'] = $this->input->post('valor_unitario');
			$data['iduser'] = $this->input->post('id');
			$data['dataentrada'] = date('Y-m-d');

			if($this->db->insert('entrada_produto',$data)){

							$dados['idestproduto'] = $this->input->post('identproduto');
							$dados['idestcliente'] = $this->input->post('idcliente');
							$dados['idestanimal'] = $this->input->post('identanimal');
							$dados['idestbotijao'] = $this->input->post('identbotijao');
							$dados['qtde'] = $this->input->post('qtde');
							$dados['valorunitario'] = $this->input->post('valor_unitario');
							$this->db->insert('estoque',$dados);
					redirect('entrada/listar_cadastro/1');
			}else{
				   redirect('entrada/listar_cadastro/2');
			}
		
	}
	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->where('identrada',$id);
		if($this->db->delete('entrada_produto')){
			redirect('entrada/listar_cadastro/3');
	}else{
		   redirect('entrada/listar_cadastro/4');
	}
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->where('identrada',$id);

		$data['entrada_produto'] = $this->db->get('entrada_produto')->result();
		$this->db->select("*");
		$data['produto'] = $this->db->get('produto')->result();
		$data['animal'] = $this->db->get('animal')->result();
		$data['botijao'] = $this->db->get('botijao')->result();
		$data['cadastro'] = $this->db->get('cadastro')->result();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_entrada',$data);
		$this->load->view('includes/html_footer');

	}

	public function update_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');		
		$data['identproduto'] = $this->input->post('identproduto');
		$data['qtde'] = $this->input->post('qtde');
		$data['valor_unitario'] = $this->input->post('valor_unitario');

		$this->db->where('identrada',$id);

		if($this->db->update('entrada_produto',$data)){
				redirect('entrada/listar_cadastro/5');
		}else{
			   redirect('entrada/listar_cadastro/6');
		}	
	}


}
