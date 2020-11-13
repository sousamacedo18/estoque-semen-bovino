<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';
class impressaopropriedade extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

	public function verificar_sessao(){
		if ($this->session->userdata('logado')==false){
				redirect('dashboard/login');
		}
    }
    public function formatardata($data){
		return date("d/m/Y", strtotime($data));
		}
	public function index()
    {
        $datos['titulo'] = 'Generar PDF con librería FPDF desde Codeigniter';
        $this->load->view('headfoot/header', $datos);
        $this->load->view('body/principal');
        $this->load->view('headfoot/footer');
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

    public function imprimir_lista_cadastro()
    {

		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa(),"none");
        $this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->order_by('nomepropriedade', 'ASC');
		$dados= $this->db->get('propriedade')->result();

		$i=0;
        
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle("LISTA DE PROPRIEDADES");
        $pdf->SetLeftMargin(20);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(170,5,"LISTA DE PROPRIEDADES" ,0,0,"C");
		$pdf->Ln(10);	
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(60,5,"NOME" ,0,0);
		$pdf->Cell(100,5,utf8_decode("PROPRIETÁRIO") ,0,1);
		$pdf->SetFont('Arial','',10);
		foreach($dados as $row){
			$pdf->Cell(10,5,utf8_decode($row->idpropriedade) ,1,0);	
			$pdf->Cell(60,5,utf8_decode($row->nomepropriedade) ,1,0);	
			$pdf->Cell(100,5,utf8_decode($row->nome) ,1,1);
			$i++;	
		}
		$pdf->Cell(170,5,"Total de propriedades: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('paginaEnBlanco.pdf' , 'I' );
    }          
          
    public function imprimir_cadastro($id=null)
    {
        
		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
        $this->db->where('idcadastro',$id);
		$this->db->order_by('nome', 'ASC');
		$dados= $this->db->get('cadastro')->result();

		$i=0;
        
        $pdf = new PDF();

        $pdf->AddPage('P','A4',0);
        $pdf->setTitle("CADASTRO DE CLIENTE");
        $pdf->SetXY(10,30); // SetXY - DEFINE O X E O Y NA PAGINA
        $pdf->Rect(9,36,190,80);
        $pdf->Ln(10);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(180,5,"CADASTRO" ,0,0,"C");
        $pdf->Ln(10);
	
		foreach($dados as $row){

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(7,5,"ID" ,0,0);	
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(10,5,utf8_decode($row->idcadastro) ,0,0);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,5,"Dt. CADASTRO" ,0,0);	
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode($this->formatardata($row->datacadastro)) ,0,0);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(16,5,"TIPO" ,0,0);	
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode($row->tipo) ,0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(13,5,"NOME:" ,0,0);
            $pdf->SetFont('Arial','',10);	
            $pdf->Cell(80,5,utf8_decode($row->nome) ,0,1);

            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,5,"CONTATO:" ,0,0);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(60,5,utf8_decode($row->celular." / ".$row->fixo) ,0,0);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,"CPF:" ,0,0);
            $pdf->SetFont('Arial','',10);
            $pdf->Cell(30,5,utf8_decode($row->cpf) ,0,0);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,"CNPJ:" ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(30,5,utf8_decode($row->cnpj) ,0,1);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(14,5,"EMAIL:" ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(30,5,utf8_decode($row->email) ,0,1);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(30,5,utf8_decode("ENDEREÇO:") ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(30,5,utf8_decode($row->endereco) ,0,1);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,5,utf8_decode("SETOR:") ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(60,5,utf8_decode($row->bairro) ,0,0);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(22,5,utf8_decode("MUNICIPIO:") ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(60,5,utf8_decode($row->municipio) ,0,0);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(10,5,utf8_decode("UF:") ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(8,5,utf8_decode($row->uf) ,0,1);
            
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(20,5,utf8_decode("OBSERVAÇÃO:") ,0,0);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(10,5,utf8_decode($row->observacao) ,0,1);
			$i++;	
		}

		
        $pdf->Output('paginaEnBlanco.pdf' , 'I' );
    }          
}

/*
* Con este código se crea el HEADER y FOOTER 
*/
class PDF extends FPDF
{
    function Header()
    {
		$image1 = "assets/img/bos.png";

		   // Logo
		   $this->Image($image1,10,6,40);
		   // Arial bold 15
		   $this->SetFont('Arial','B',15);
		   // Move to the right
		   $this->Cell(80);
		   // Title
		   //$this->Cell(30,10,'Title',1,0,'C');
		   // Line break
		   $this->Ln(20);
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Endereço: R. Mal. Castelo Branco - St. Rodoviario, Araguaína - TO, 65907-230'),0,0,'C');
      
		$this->Cell(-15,10,utf8_decode('Página ') . $this->PageNo(),0,0,'C');
		//$this->Cell(-15,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
    }
}

