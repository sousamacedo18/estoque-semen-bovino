<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emprestimo extends CI_Controller {

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

	
	public function listar_emprestimo()
	{
		$this->verificar_sessao();
		$this->db->select("*");
		//$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		// $this->db->join('cadastro','idestcliente=idcadastro','inner');
		// $this->db->join('animal','idestcliente=idcadastro','inner');
		//$this->db->join('estoque','id=idbotijao','inner');
		$dados['movimentacao'] = $this->db->get('movimentacao')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('movimentacao',$dados);
		$this->load->view('includes/html_footer');
	}
	  function retornar_cliente($id){
		
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->where("idestoque",$id);
		$dados = $this->db->get('estoque')->result();
		$idcliente=$dados[0]->idestcliente;	

		$this->db->select("*");
		$this->db->where("idcadastro",$idcliente);
		$dados = $this->db->get('cadastro')->result();
		return $dados[0]->nome;


	}
	public function listar_emprestimo_html()
	{
		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->where("tipo",3);
		$dados = $this->db->get('movimentacao')->result();
		
		function InvertData($campo){
		  if(substr($campo,2,1)=='/'){
			  $campo=substr($campo,6,4).'-'.substr($campo,3,2).'-'.substr($campo,0,2);//2012-10-10
		  } else {
			  $campo=substr($campo,8,2).'/'.substr($campo,5,2).'/'.substr($campo,0,4); //10/10/2012
		  }
		  return($campo);
	  }
		foreach($dados as $row){
		  $new_date=InvertData($row->datadevolucao);

		  $datamovimentacao=date("d/m/Y", strtotime($row->datamovimentacao));
		  $origem=$this->retornar_cliente($row->idorigem);
		  $destino=$this->retornar_cliente($row->iddestino);

		echo"
			<tr >
			<td class='text-center'>$row->idorigem</td>
			<td class='text-center'>$origem</td>
			<td class='text-center'>$row->iddestino </td>
			<td class='text-center'>$destino </td>
			<td class='text-center'>$row->qtdtransferida </td>
			<td class='text-center'>$datamovimentacao </td>

			<td class=''>$row->observacao </td>
			<td>
			<img src='"?>
			<?= base_url();?>
			<?php echo"assets/bootstrap-icons/card-text.svg' alt='' 
			width='20' height='20' title='Bootstrap' >		
			
			</td>
			</tr>  ";                           
;
		}
	
	
	}
	public function listar_emprestimo_pagos()
	{
		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->where("iddevolucao >",0);
        $this->db->where("tipo",3);
		$dados = $this->db->get('movimentacao')->result();
		
		function InvertData1($campo){
		  if(substr($campo,2,1)=='/'){
			  $campo=substr($campo,6,4).'-'.substr($campo,3,2).'-'.substr($campo,0,2);//2012-10-10
		  } else {
			  $campo=substr($campo,8,2).'/'.substr($campo,5,2).'/'.substr($campo,0,4); //10/10/2012
		  }
		  return($campo);
	  }
		foreach($dados as $row){
		  $new_date=InvertData1($row->datadevolucao);

		  $datamovimentacao=date("d/m/Y", strtotime($row->datamovimentacao));
		  $origem=$this->retornar_cliente($row->idorigem);
		  $destino=$this->retornar_cliente($row->iddestino);

		echo"
			<tr >
			<td class='text-center'>$row->idorigem</td>
			<td class='text-center'>$origem</td>
			<td class='text-center'>$row->iddestino </td>
			<td class='text-center'> $destino </td>
			<td class='text-center'>$row->qtdtransferida </td>
			<td class='text-center'>$datamovimentacao </td>
			<td class='text-center'>$row->iddevolucao </td>
			<td class='text-center'>$new_date</td>
			<td class=''>$row->observacao </td>
			<td>
			<img src='"?>
			<?= base_url();?>
			<?php echo"assets/bootstrap-icons/card-text.svg' alt='' 
			width='20' height='20' title='Bootstrap' >		
			
			</td>
			</tr>  ";                           
;
		}
	
	
	}
	public function listar_emprestimo_apagar()
	{
		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->where("iddevolucao",0);
        $this->db->where("tipo",3);
		$dados = $this->db->get('movimentacao')->result();
		
		function InvertData2($campo){
		  if(substr($campo,2,1)=='/'){
			  $campo=substr($campo,6,4).'-'.substr($campo,3,2).'-'.substr($campo,0,2);//2012-10-10
		  } else {
			  $campo=substr($campo,8,2).'/'.substr($campo,5,2).'/'.substr($campo,0,4); //10/10/2012
		  }
		  return($campo);
	  }
		foreach($dados as $row){
		  $new_date=InvertData2($row->datadevolucao);

		  $datamovimentacao=date("d/m/Y", strtotime($row->datamovimentacao));
		  $origem=$this->retornar_cliente($row->idorigem);
		  $destino=$this->retornar_cliente($row->iddestino);

		echo"
			<tr >
			<td class='text-center'>$row->idorigem</td>
			<td class='text-center'>$origem</td>
			<td class='text-center'>$row->iddestino </td>
			<td class='text-center'> $destino </td>
			<td class='text-center'>$row->qtdtransferida </td>
			<td class='text-center'>$datamovimentacao </td>
			<td class=''>$row->observacao </td>
			<td>
				<input type='radio' name='slc_emprestimo' id='slc_emprestimo' value=$row->idmovimentacao>
			
			</td>
			</tr>  ";                           
;
		}
	
	
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['idproprietario'] = $this->input->post('idproprietario');
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


