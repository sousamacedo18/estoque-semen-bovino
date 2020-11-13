<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saida extends CI_Controller {

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
	public function listar_afinalizar(){
		$tipoarray[1]="Aplicado pela empresa";
		$tipoarray[2]="Retirado pelo cliente";
		$this->verificar_sessao();
		//$this->db->select("*");
		$i=0;
		$this->db->select("cadastro.nome,animal.nomeanimal,
		 botijao.nomebotijao,estoque.estcodigo,saida_semem.idsaida,
		 saida_semem.qtde,saida_semem.datasaida,saida_semem.estoqueanterior,
		 saida_semem.tiposaida,saida_semem.idsaidaaplicador, saida_semem.idsaidaestoque");

        $this->db->join('cadastro','idsaidacliente=idcadastro','inner');
        $this->db->join('animal','idsaidaanimal=idanimal','inner');
        $this->db->join('botijao','idsaidabotijao=idbotijao','inner');
		$this->db->join('estoque','idsaidaestoque=idestoque','inner');
		$this->db->where('saida_semem.idsaidaaplicador =','0');
		$saida= $this->db->get('saida_semem')->result();
		$icon= base_url();
		function formatardata($data){
		  return date("d/m/Y", strtotime($data));
	  }
		if(sizeof($saida)>0){
		foreach($saida as $cad) {
		  $tipo=$cad->tiposaida;
		  $d=$cad->datasaida;
		  $data=formatardata($d);
	
	
		
	  echo"
		  <tr>
			<th scope='row'>$cad->idsaida</th>
			<td>$cad->nome</td>
			<td>$cad->nomebotijao</td>
			<td>$cad->nomeanimal</td>
			<td>$cad->estcodigo</td>
			<td>$cad->qtde</td>
			<td>$cad->estoqueanterior</td>
			<td>$tipoarray[$tipo]</td>
			<td>$data</td>
			<td>
			<button class='btn btn-small btn-primary' onClick='finalizar($cad->idsaida,$cad->qtde,$cad->idsaidaestoque);'>
			<img src='$icon\assets\icons\icons\check.svg' alt='' width='24' 
			height='24' title='Bootstrap'>
			</button>
			
			</td>
		  </tr>";
		 
		}
	  }
		
	}
	public function listar_finalizados(){
		$tipoarray[1]="Aplicado pela empresa";
		$tipoarray[2]="Retirado pelo cliente";
		function formatardata1($data){
			return date("d/m/Y", strtotime($data));
		}
		$this->verificar_sessao();
		$this->db->select("cadastro.nome,animal.nomeanimal,
		botijao.nomebotijao,estoque.estcodigo,saida_semem.idsaida,
		saida_semem.qtde,saida_semem.datasaida,saida_semem.estoqueanterior,
		saida_semem.tiposaida,saida_semem.idsaidaaplicador");
		$this->db->where('idsaidaaplicador >',0);
	   $this->db->join('cadastro','idsaidacliente=idcadastro','inner');
	   $this->db->join('animal','idsaidaanimal=idanimal','inner');
	   $this->db->join('botijao','idsaidabotijao=idbotijao','inner');
	   $this->db->join('estoque','idsaidaestoque=idestoque','inner');
	   $saida = $this->db->get('saida_semem')->result();

	   if(sizeof($saida)>0){
	   foreach($saida as $cad) {
		 $tipo=$cad->tiposaida;
		
		 $aplicador=$cad->idsaidaaplicador;
		 $d=$cad->datasaida;
		 $data=formatardata1($d);
	   
		 echo"	 
		 <tr>
		   <th scope=\"row\">$cad->idsaida</th>
		   <td>$cad->nome</td>
		   <td>$cad->nomebotijao</td>
		   <td>$cad->nomeanimal</td>
		   <td>$cad->estcodigo</td>
		   <td>$cad->qtde</td>
		   <td>$cad->estoqueanterior</td>
		   <td>$tipoarray[$tipo]</td>
		   <td>$data</td>
	 
	 
		 </tr>";
		 
	   }
	 }
		
	 
	}
	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->order_by("nomeusuario");
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
		$this->load->view('listar_saida',$dados);
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
		$idestoque = $this->input->post('idestoque');
		$qtde_for= $this->input->post('quantidade');
		
		$id = $this->input->post('id');		
			
		$data['dataconclusao'] = $this->input->post('data');
		$data['obssaidadev'] = $this->input->post('observacao');
		$data['idsaidaaplicador'] = $this->input->post('aplicador');
		$data['qtde'] = $this->input->post('quantidade');
		$data['qtdedev'] = $this->input->post('descarte');

		$this->db->select("*");
		$this->db->where("idestoque",$idestoque);
		$result_estoque = $this->db->get('estoque')->result();

		foreach($result_estoque as $row){
			$qtde_estoque=$row->qtde;
		}
		
		$qtde_atualizada=$qtde_estoque-$qtde_for;
		$estoque['qtde']=$qtde_atualizada;
		$data['estoqueanterior'] = $qtde_estoque;


		$this->db->where('idestoque',$idestoque);
		$this->db->update('estoque',$estoque);
		$this->db->where('idsaida',$id);
		$this->db->update('saida_semem',$data);
	
}
	


}
