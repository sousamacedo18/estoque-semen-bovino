<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {


	public function verificar_sessao(){
		if ($this->session->userdata('logado')==false){
				redirect('dashboard/login');
		}
	}
	public function index(){
		$this->load->view('welcome_message');
	}
	public function historico(){
		$id=$this->input->post('id');
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->join('botijao','idestbotijao=idbotijao','inner');
		$this->db->where("idestbotijao",$id);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados = $this->db->get('estoque')->result();
		echo"
		<thead>
		<tr>
		<th>Botijão</th>
		<th>Caneca</th>
		<th>Animal</th>
		<th>Qtde</th>
		<th>Tipo</th>
		<th>Status</th>
		</tr>
		</thead>
		";
		foreach($dados as $row){
			echo"
			<tr>
				<td>".$row->nomebotijao."</td>"
				."<td>".$row->estcaneca."</td>"
				."<td>".$row->nomeanimal."</td>"
				."<td>".$row->qtde."</td>"
				."<td>".$row->esttipo."</td>"
				."<td>".$row->eststatus."</td>
			</tr>
			";

		}
	}
	public function relatoriobotijoes($indice=null){
		$this->verificar_sessao();
		$this->db->select("*");
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
		$this->load->view('relatorios',$dados);
		$this->load->view('includes/html_footer');
	}	


	function pdf(){


			$this->load->library('Fpdf_gen');

			function Header(){
				
			}
			function Footer(){

			}
			$pdf = new FPDF("L","mm","A4");
			
			$this->fpdf->setAuthor("Carlos Henrique Sousa de Macedo");
			$this->fpdf->setTitle(utf8_decode("Relatório "));
			$this->fpdf->AliasNbPages("(nb)");
			$this->fpdf->SetAutoPageBreak(false);
			$this->fpdf->setMargins(8,8,8,8);
			$this->fpdf->setFont("Arial","",10);
			
			$this->fpdf->Ln(4);
			$this->fpdf->Cell(95,10,"",1,0,"L");
			$this->fpdf->SetTextColor(0,0,255);
			$this->fpdf->Cell(2,-6,"Teste 1",0,0,"C");

			$this->fpdf->Ln(5);
			$this->fpdf->setFont("Arial","",10);
			$this->fpdf->Cell(65,10,"",1,0,"L", false);
			$this->fpdf->SetTextColor(65,65,255);
			$this->fpdf->Cell(2,-6,"Teste 2",0,0,"C",0);	
			
			$this->db->select('*');
			$dados['cadastro'] = $this->db->get('cadastro')->result();

			foreach($dados as $row){
				$this->fpdf->Cell(100,5,$row[0]->nome,1,0,"C");	
			}
		
			
			$this->fpdf->Output(utf8_decode("relatorio_pdf"),"I");

}
}
