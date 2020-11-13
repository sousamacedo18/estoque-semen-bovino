<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
	public function buscar_chave_empresa(){
		$iduser=$this->session->userdata('id');
		$this->db->where("idusuario",$iduser);
		$dados=$this->db->get('usuario')->result();
		return $dados[0]->chave_auth_usuario;
	}
	public function index(){
		
		$this->load->view('login');

	}
	public function ver_acesso($modulo){

			$id=$this->session->usedata('id');
			$this->db->like('chave_auth_acesso',$this->buscar_chave_empresa());
			$this->db->where('idacessousu',$id);
			$dados=$this->db->get('acesso')->result();
		
			if(count($dados>0)){
				if($dados[0]->$modulo=="S"){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}

	}
	public function cadastrar_usuario()
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastrar_usuario');
		$this->load->view('includes/html_footer');
	}
	public function listar_acesso($indice=null,$id=null)
	{
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
                if($id!==null){
                if($this->criar_acesso($id)){
 		$data['msg']="Para que o usuário possa acessar os modulos é necessário definir quais ele poderá ter acesso.";
			$this->load->view('includes/msg_warning',$data);                   
                }
                }
 		if($indice==1){
			$data['msg']="Dados Alterados com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==2){
			$data['msg']="Erro ao Alterar o Cadastrar!!!!";
			$this->load->view('includes/msg_erro',$data);
		
		}else if($indice===null || $id===null){
			$data['msg']="Tentativa de Burlar o Sistema!!!!";
			$this->load->view('includes/msg_erro',$data);
		}                
              if($indice!==null && $id!==null){
				$this->verificar_sessao();
				$this->db->select("*");
                $this->db->join('usuario','idacessousu=idusuario','inner');
				$this->db->where('idacessousu',$id);
				
		$dados['acesso'] = $this->db->get('acesso')->result();                  
		$this->load->view('acesso',$dados);
              }
		$this->load->view('includes/html_footer');
	}
	
        public function criar_acesso($id){
                $this->db->select("*");
                $this->db->where('idusuario',$id);
                $dt['usuario']= $this->db->get('usuario')->result();
                $chave=$dt['usuario'][0]->chave_auth_usuario;
                
                $data["chave_auth_acesso"]=$chave;
                $data["idacessousu"]=$id; 
                $data["visualizar"]='N';
                $data["cadastrar"]='N';
                $data["alterar"]='N';
                $data["excluir"]='N';
                
                
                $this->db->select("*");
                $this->db->where('idacessousu',$id);
		$dados = $this->db->get('acesso');
                $qtd=$dados->num_rows();
                if($qtd==0){
                   for($i=1;$i<=8;$i++){
                       $data["modulo"]=$i;
                       echo$i;
                      if($this->db->insert('acesso',$data)){
                          echo "cadastro acesso o modulo: ".$i." para o funcionário ".$id." da empresa: ".$this->session->userdata('chave_auth_usuario');
                      } 
                   }
                }
		}
	public function update_acesso(){
		$this->verificar_sessao();
		$id = $this->input->post('idusuario');
        $modulo[1]="PRODUTO";
        $modulo[2]="ANIMAL";
        $modulo[3]="CLIENTE/FORNECEDOR";
        $modulo[4]="BOTIJAO";
        $modulo[5]="USUARIO";
        $modulo[6]="ACESSO";
        $modulo[7]="PROPRIEDADE";
        $modulo[8]="RELATORIO";

		for($i=1; $i<=8; $i++){

			echo$i;

			if($this->input->post("visualizar$i")){
				$dados['visualizar']="S";
			}else{
				$dados['visualizar']="N";
			}

			if($this->input->post("cadastrar$i")){
				$dados['cadastrar']="S";
			}else{
				$dados['cadastrar']="N";
			}
		
			if($this->input->post("alterar$i")){
				$dados['alterar' ]="S";
			}else{
				$dados['alterar' ]="N";
			}

			if($this->input->post("excluir$i")){
				$dados['excluir'] ="S";
			}else{
				$dados['excluir'] ="N";
			}
		
			
				$this->db->where('idacessousu',$id);
				$this->db->where('modulo',$modulo[$i]);
				if(!$this->db->update('acesso',$dados)){
				 redirect('usuario/listar_acesso/2/'.$id);
					
		}
		
			        
		}
		 redirect('usuario/listar_acesso/1/'.$id);
	}
	public function listar_usuario($indice=null)
	{
		$this->verificar_sessao();

		$this->db->select("*");
		$this->db->like("chave_auth_usuario",$this->buscar_chave_empresa());
		$dados['usuario'] = $this->db->get('usuario')->result();
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
		$this->load->view('listar_usuario',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_usuario()
	{
		    $this->verificar_sessao();
			$data['nomeusuario'] = $this->input->post('nome');
			$data['emailusuario'] = $this->input->post('email');
			$data['iduser'] = $this->session->userdata('id');
			$data['chave_auth_usuario'] = $this->buscar_chave_empresa();
			$data['senhausuario'] = md5($this->input->post('senha'));

			if($this->db->insert('usuario',$data)){
					redirect('usuario/listar_usuario/1');
			}else{
				   redirect('usuario/listar_usuario/2');
			}
		
	}
	public function excluir_usuario($id=null){
		$this->verificar_sessao();
		$this->db->where('idusuario',$id);
		if($this->db->delete('usuario')){
			redirect('usuario/listar_usuario/3');
	}else{
		   redirect('usuario/listar_usuario/4');
	}
	}
	public function atualizar_usuario($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->where('idusuario',$id);
		$data['usuario'] = $this->db->get('usuario')->result();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		if($indice==1){
			$data['msg']="Senha Alterada com Sucesso!!!!";
			$this->load->view('includes/msg_sucesso',$data);
		}else if($indice==2){
			$data['msg']="Houve um Erro ao Alterar Senha!!!!";
			$this->load->view('includes/msg_erro',$data);
		}		
		$this->load->view('editar_usuario',$data);
		$this->load->view('includes/html_footer');

	}

	public function update_usuario(){
		$this->verificar_sessao();
		$id = $this->input->post('idusuario');		
		$data['nomeusuario'] = $this->input->post('nome');
		$data['emailusuario'] = $this->input->post('email');

		$this->db->where('idusuario',$id);

		if($this->db->update('usuario',$data)){
				redirect('usuario/listar_usuario/5');
		}else{
			   redirect('usuario/listar_usuario/6');
		}	
	}
   public function salvar_senha(){
	$this->verificar_sessao();
	$id = $this->input->post('idusuario');

	$senhaantiga= md5($this->input->post('senhaantiga'));
	$senhanova= md5($this->input->post('novasenha'));

	$this->db->select('senhausuario');
	$this->db->where('idusuario',$id);
	$data['senha']=$this->db->get('usuario')->result();
	$dados['senhausuario']=$senhanova;

	if($data['senha'][0]->senhausuario==$senhaantiga){
		$this->db->where('idusuario',$id);
		$this->db->update('usuario',$dados);
		redirect('usuario/atualizar_usuario/'.$id.'/1');
	}
	else{
		redirect('usuario/atualizar_usuario/'.$id.'/2');
	}
	}


   

}
