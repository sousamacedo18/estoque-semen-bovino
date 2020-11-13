<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {

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
	public function ver_acesso(){

		
		$this->db->like('chave_auth_acesso',$this->buscar_chave_empresa());
		$this->db->like("visualizar","S");
		$this->db->where('idacessousu',2);
		$this->db->where('modulo',3);
		$dados=$this->db->get('acesso')->result();
		if(count($dados>0)){
			return true;
		}else{
			return false;
		}

}
	public function buscar_chave_empresa(){
		$iduser=$this->session->userdata('id');
		$this->db->where("idusuario",$iduser);
		$dados=$this->db->get('usuario')->result();
		return $dados[0]->chave_auth_usuario;
	}
	public function buscar_id_user(){
		return $this->session->userdata('id');
	}
	public function index(){
		
	}
	function formatCnpjCpf($value)
		{
		$cnpj_cpf = preg_replace("/\D/", '', $value);
		
		if (strlen($cnpj_cpf) === 11) {
			return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
		} 
		
		return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
		}
		
	public function cadastrar()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastrar');
		$this->load->view('includes/html_footer');
	}
	
	public function relatorioporcliente($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->order_by('nome', 'ASC');
		$dados['cadastro'] = $this->db->get('cadastro')->result();
		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('relatorioporcliente',$dados);
		$this->load->view('includes/html_footer');

	}
	public function relatorioporanimal($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
		$this->db->order_by('nomeanimal', 'ASC');
		$dados['animal'] = $this->db->get('animal')->result();
		
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('relatorioporanimal',$dados);
		$this->load->view('includes/html_footer');

	}
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->order_by('nome', 'ASC');
		$dados['cadastro'] = $this->db->get('cadastro')->result();
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
		
		}else if($indice==7){
			$data['msg']="Desculpe, seu perfil de acesso não permite acessar este modulo, procure o administrador do sistema!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
	
		$this->load->view('listar_cadastro',$dados);
		$this->load->view('includes/html_footer');

	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['nome'] = $this->input->post('nome');
			$data['endereco'] = $this->input->post('endereco');
			$data['bairro'] = $this->input->post('bairro');
			$data['municipio'] = $this->input->post('municipio');
			$data['uf'] = $this->input->post('uf');
			$data['fixo'] = $this->input->post('fixo');
			$data['celular'] = $this->input->post('celular');
			$data['email'] = $this->input->post('email');
			$data['cpf'] = $this->input->post('cpf');
			$data['cep'] = $this->input->post('cep');
			$data['cnpj'] = $this->input->post('cnpj');
			$data['datacadastro'] = date('Y-m-d');
			$data['tipo'] = $this->input->post('tipo');
			$data['observacao'] = $this->input->post('observacao');
			$data['chave_auth_cadastro'] = $this->buscar_chave_empresa();
			$data['iduser'] = $this->buscar_id_user();

			if($this->db->insert('cadastro',$data)){
					redirect('cadastro/listar_cadastro/1');
			}else{
				   redirect('cadastro/listar_cadastro/2');
			}
		
	}
	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->where('idcadastro',$id);
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		if($this->db->delete('cadastro')){
			redirect('cadastro/listar_cadastro/3');
	}else{
		   redirect('cadastro/listar_cadastro/4');
	}
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->where('idcadastro',$id);
		
		$data['cadastro'] = $this->db->get('cadastro')->result();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_cadastro',$data);
		$this->load->view('includes/html_footer');

	}
	public function retornar_nome(){
		$this->verificar_sessao();
		$id = $this->input->post('id');	
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->where('idcadastro',$id);

		$dados= $this->db->get('cadastro')->result();
		foreach($dados as $row){
			echo$row->nome;
		}
	}
	public function montar_select_cliente(){
		$this->verificar_sessao();	
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->order_by("nome");
		$dados= $this->db->get('cadastro')->result();
		foreach($dados as $row){

			echo"<option value =$row->idcadastro>".$row->nome."</option>";
		}
	}
	public function montar_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');	
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->where('idcadastro',$id);

		$dados= $this->db->get('cadastro')->result();
		foreach($dados as $row){
              echo "<div class='col-md-12'> <b>NOME:</b> ". $row->nome." </div>";
              echo "<div class='col-md-12'> <b>ENDEREÇO:</b>". $row->endereco." </div>";
              echo "<div class='col-md-6'> <b>SETOR:</b> ". $row->bairro." </div>";
              echo "<div class='col-md-6'><b>CIDADE:</b> ". $row->municipio." </div>";
              echo "<div class='col-md-7'><b>UF:</b> ". $row->uf." </div>";
              echo "<div class='col-md-6'><b>Fone Fixo:</b> ". $row->fixo." </div>";
              echo "<div class='col-md-6'><b>Celular:</b> ". $row->celular." </div>";
              echo "<div class='col-md-6'><b>CPF:</b> ". $row->cpf." </div>";
              echo "<div class='col-md-6'><b>CNPJ:</b> ". $row->cnpj." </div>";
              echo "<div class='col-md-6'><b>DATA CADASTRO:</b> ". $row->datacadastro." </div>";
              echo "<div class='col-md-6'><b>TIPO:</b> ". $row->tipo." </div>";
              echo "<div class='col-md-12'><b>Observação:</b> ". $row->observacao." </div>";
			  echo "<div class='col-md-12'>
			  
			  
			  <a  href='#'  target='_blank'
			  style='text-decoration: none;'>
			 <span data-feather='printer' class='text-primary'></span>
			</a>
		   <a href='#'  style='text-decoration: none;' >
				 <span data-feather='edit' class='text-primary'></span>
				 
			   </a> 
			  </div>";

		}
	}

	public function update_cadastro(){
		$this->verificar_sessao();
		$id = $this->input->post('id');		
		$data['nome'] = $this->input->post('nome');
		$data['endereco'] = $this->input->post('endereco');
		$data['bairro'] = $this->input->post('bairro');
		$data['municipio'] = $this->input->post('municipio');
		$data['uf'] = $this->input->post('uf');
		$data['fixo'] = $this->input->post('fixo');
		$data['celular'] = $this->input->post('celular');
		$data['email'] = $this->input->post('email');
		$data['cpf'] = $this->input->post('cpf');
		$data['cep'] = $this->input->post('cep');
		$data['cnpj'] = $this->input->post('cnpj');
		//$data['datacadastro'] = date('Y-m-d');
		$data['tipo'] = $this->input->post('tipo');
		$data['observacao'] = $this->input->post('observacao');
		$data['iduser'] = $this->input->post('id');
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->where('idcadastro',$id);
		

		if($this->db->update('cadastro',$data)){
				redirect('cadastro/listar_cadastro/5');
		}else{
			   redirect('cadastro/listar_cadastro/6');
		}	
	}


}
