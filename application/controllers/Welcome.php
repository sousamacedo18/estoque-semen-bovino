<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';
class Welcome extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

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

    public function paginaHeaderFooter()
    {

		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),"none");
		$this->db->order_by('nome', 'ASC');
		$dados= $this->db->get('cadastro')->result();

		$i=0;
        
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(200,5,"LISTA DE CADASTROS" ,0,0,"C");
		$pdf->Ln(10);	
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(80,5,"NOME" ,0,0);
		$pdf->Cell(55,5,"CONTATO" ,0,1);
		$pdf->SetFont('Arial','',10);
		foreach($dados as $row){
			$pdf->Cell(10,5,utf8_decode($row->idcadastro) ,1,0);	
			$pdf->Cell(80,5,utf8_decode($row->nome) ,1,0);	
			$pdf->Cell(55,5,utf8_decode($row->celular." / ".$row->fixo) ,1,1);
			$i++;	
		}
		$pdf->Cell(145,5,"Total de cadastros: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
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
        // $this->SetFont('Arial','B',15);
        // $this->Cell(0,10,utf8_decode('BOS - Assessoria e Pecuária'),1,0,'C');
		// $this->Ln(20);
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
		
    }
}

