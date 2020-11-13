<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';
class Imprimirbotijao extends CI_Controller {
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
        public function buscar_chave_empresa(){
            $iduser=$this->session->userdata('id');
            $this->db->where("idusuario",$iduser);
            $dados=$this->db->get('usuario')->result();
            return $dados[0]->chave_auth_usuario;
        }
        public function buscar_id_user(){
            return $this->session->userdata('id');
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
        public function listar_canecas($id=null)
        {
    
            $this->verificar_sessao();
            $this->db->select("*");
            $this->db->like("chave_auth_estoque",$this->buscar_chave_empresa(),"none");
            $this->db->where("idestbotijao",$id);
            $this->db->where("qtde >",0);
            $this->db->order_by('estcaneca', 'ASC');
            $this->db->join('cadastro','idestcliente=idcadastro','inner');
            $this->db->join('animal','idestanimal=idanimal','inner');
            $this->db->join('botijao','idestbotijao=idbotijao','inner');
            $dados= $this->db->get('estoque')->result();

            $this->db->select("*");
            $this->db->where("idbotijao",$id);
            $this->db->join('cadastro','idproprietario=idcadastro','inner');
            $this->db->join('propriedade','idbotpropriedade=idpropriedade','inner');
            $d= $this->db->get('botijao')->result();
            foreach($d as $rw){
                $nomebotijao=$rw->nomebotijao;
                $nomeproprietario=$rw->nome;
                $nomepropriedade=$rw->nomepropriedade;  
            }
    
            $i=0;
            
            $pdf = new PDF();
            $pdf->AddPage('P','A4',0);
            $pdf->setTitle("Lista de Canecas");
            $pdf->SetFont('Arial','B',18);
            $pdf->Cell(200,5,utf8_decode("Botijão: $nomebotijao") ,0,1,"C");
            $pdf->SetFont('Arial','',10);
            $pdf->Ln(5);
            $pdf->Cell(100,5,utf8_decode("Proprietário: $nomeproprietario") ,0,0,"C");
            $pdf->Cell(70,5,utf8_decode("Propriedade: $nomepropriedade") ,0,0,"C");
            $pdf->Ln(10);	
            $pdf->SetFont('Arial','B',10);
            $pdf->Cell(15,5,"Caneca" ,1,0);	
            $pdf->Cell(30,5,"Touro" ,1,0);
            $pdf->Cell(15,5,utf8_decode("Raça") ,1,0);
            $pdf->Cell(10,5,"Qtde" ,1,0);
            $pdf->Cell(20,5,utf8_decode("Código") ,1,0);
            $pdf->Cell(10,5,"Tipo" ,1,0);
            $pdf->Cell(80,5,utf8_decode("Proprietário") ,1,1);
            $pdf->SetFont('Arial','',10);

            $doses=0;
            foreach($dados as $row){http://localhost/siscontrole/botijao/estoque/0/1
                $doses=$doses+$row->qtde;
                $pdf->Cell(15,5,utf8_decode($row->estcaneca) ,1,0,"C");	
                $pdf->Cell(30,5,utf8_decode($row->nomeanimal) ,1,0);	
                $pdf->Cell(15,5,utf8_decode($row->raca),1,0,"C");
                $pdf->Cell(10,5,utf8_decode($row->qtde),1,0,"C");
                $pdf->Cell(20,5,utf8_decode($row->estcodigo),1,0);
                $pdf->Cell(10,5,utf8_decode($row->esttipo),1,0,"C");
                $pdf->Cell(80,5,utf8_decode($row->nome),1,1);
                $i++;	
            }
            $pdf->Cell(180,5,"Total de doses: ".$doses,1,1);
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