

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
	function formatCnpjCpf($value)
	{
	$cnpj_cpf = preg_replace("/\D/", '', $value);
	
	if (strlen($cnpj_cpf) === 11) {
		return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
	}
} 
	public function index()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard');
		$this->load->view('includes/html_footer');
	}

	public function login($indice=null){
		if($indice==1){
			$data['msg']="E-mail ou senha estão incorretos!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
			$this->load->view('login');
		
	}
	public function empresa($indice=null){
		if($indice==1){
			$data['msg']="Cadastro concluído com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==2){
			$data['msg']="Houve um Erro ao Cadastrar!!!!";
			$this->load->view('includes/msg_erro',$data);
		}
		$this->load->view('cadastroempresa');
	}
	public function salvar_cadastro()
	{
			$data['nome'] = $this->input->post('nome');
			$data['endereco'] = $this->input->post('endereco');
			$data['setor'] = $this->input->post('setor');
			$data['municipio'] = $this->input->post('municipio');
			$data['uf'] = $this->input->post('uf');
			$data['fonefixo'] = $this->input->post('fixo');
			$data['celular'] = $this->input->post('celular');
			$data['email'] = $this->input->post('email');
			$data['cnpj_cpf'] =$this->formatCnpjCpf( $this->input->post('cnpj_cpf'));
			$data['datacadastro'] = date('Y-m-d');
			$data['chave_auth'] = md5(uniqid(rand(), true));
			$data['observacao'] = $this->input->post('observacao');
			$data['responsavel'] = $this->input->post('responsavel');

			if($this->db->insert('empresa',$data)){
					redirect('dashboard/empresa/1');
			}else{
				   redirect('cadastro/empresa/2');
			}
		
	}

	public function logar($indice=null){
	
		$email=$this->input->post('email');
		$senha=md5($this->input->post('senha'));

		$this->db->where('senhausuario',$senha);
		$this->db->where('emailusuario',$email);
		$data['usuario']=$this->db->get('usuario')->result();

		if(count($data['usuario'])==1){
			$dados['nome']=$data['usuario'][0]->nomeusuario;
			$dados['id']=$data['usuario'][0]->idusuario;
			$dados['chave']=$data['usuario'][0]->chave_auth_usuario;
			$dados['logado']=true;
			$this->session->set_userdata($dados);
			redirect('dashboard');
		}else{
			redirect('dashboard/login/1');
		}

	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('dashboard');
	} 

}
