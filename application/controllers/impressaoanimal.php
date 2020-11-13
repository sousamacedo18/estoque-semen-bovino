<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';
class impressaoanimal extends CI_Controller {
   

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
        $this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
      
		$this->db->order_by('nomeanimal', 'ASC');
		$dados= $this->db->get('animal')->result();

		$i=0;
        
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle("Lista de Animais");
        $pdf->SetLeftMargin(20);
        $pdf->SetFont('Arial','B',18);
        $pdf->Ln(10);
		$pdf->Cell(170,5,"Lista de Animais" ,0,0,"C");
        $pdf->Ln(10);
        $pdf->SetLeftMargin(70);	
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(60,5,"NOME" ,0,0);
		$pdf->Cell(10,5,utf8_decode("RAÇA") ,0,1);
		
		$pdf->SetFont('Arial','',10);
		foreach($dados as $row){
			$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(60,5,utf8_decode($row->nomeanimal) ,1,0);	
			$pdf->Cell(10,5,utf8_decode($row->raca) ,1,1);	
			
			$i++;	
		}
		$pdf->Cell(80,5,"Total de animais: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('lista_animais.pdf' , 'I' );
    }          
    public function imprimir_quantidade_por_animal()
    {
       

        $this->verificar_sessao();
        
        //$this->db->select("animal.nomeanimal, animal.idanimal,sum(estoque.qtde) as totalsemem,estoque.idestanimal where estoque.idestanimal=animal.idanimal,estoque.idestanimal");
        //$this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
        $query=$this->db->query("Select a.nomeanimal, sum(e.qtde) as totalsemem
        From animal as a, estoque as e
        Where a.idanimal=e.idestanimal
        Group By a.nomeanimal");
       $dados=$query->result_array();
        //$this->db->join('cadastro','idprop=idcadastro','inner');   
       // $this->db->where("animal.idanimal");
       // $this->db->where('a.idproprietario',"c.idcadastro");
        //$this->db->where('a.idproprietario',"c.idcadastro");
        //$this->db->order_by("animal.nomeanimal");
        //$this->db->join('cadastro','idprop=idcadastro','inner');
	
		//$dados= $this->db->get()->result();

		$i=0;
//print_r($dados);
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle(utf8_decode("ESTOQUE DE SÊMEM ANIMAL"));
        $pdf->SetLeftMargin(60);
        $pdf->SetFont('Arial','B',12);
        $pdf->Ln(10);
		$pdf->Cell(80,5,utf8_decode("ESTOQUE DE SÊMEM ANIMAL") ,0,0,"C");
		$pdf->Ln(10);	
		$pdf->SetFont('Arial','B',10);
		//$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(60,5,"Nome animal" ,0,0);
		$pdf->Cell(20,5,utf8_decode("Estoque") ,0,1);
		$pdf->SetFont('Arial','',10);
		foreach($dados as $row){
            $nome=$row['nomeanimal'];
            $total=$row['totalsemem'];
			//$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(60,5,utf8_decode($nome) ,1,0);	
			$pdf->Cell(20,5,utf8_decode($total) ,1,1);
			$i++;	
		}
		$pdf->Cell(80,5,"Total de animais: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('lista_animais.pdf' , 'I' );
    }          
    public function imprimir_quantidade_detalhada()
    {

        $this->verificar_sessao();

        $this->db->where('qtde>',0);
        $this->db->join('cadastro','idestcliente=idcadastro','inner');
        $this->db->join('animal','idestanimal=idanimal','inner');
        $this->db->join('botijao','idestbotijao=idbotijao','inner');
        
        $this->db->order_by("nomeanimal");
        $this->db->order_by("nomebotijao");
        $this->db->order_by("estcaneca");
        
       
        $dados = $this->db->get('estoque')->result();


		$i=0;
       
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle(utf8_decode("ESTOQUE DE SÊMEM ANIMAL - DETALHADO"));
        $pdf->SetLeftMargin(10);
        $pdf->Ln(10);	
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode("ESTOQUE DE SÊMEM ANIMAL - DETALHADO") ,0,0,"C");
        $pdf->Ln(30);
       
		$pdf->SetFont('Arial','B',10);
		//$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(40,5,"Nome animal" ,0,0);
		$pdf->Cell(20,5,utf8_decode("Tipo") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Botijão") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Caneca") ,0,0,"C");
		$pdf->Cell(10,5,utf8_decode("Qtde") ,0,0,"C");
		$pdf->Cell(80,5,utf8_decode("Proprietário") ,0,1);
        $pdf->SetFont('Arial','',10);
        $qt=0;
		foreach($dados as $row){
            $nome=$row->nomeanimal;
            $botijao=$row->nomebotijao;
            $caneca=$row->estcaneca;
            $tipo=$row->esttipo;
            $proprietario=$row->nome;
            $qtde=$row->qtde;
            $i=$i+$qtde;
			//$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(40,5,utf8_decode($nome) ,1,0);	
			$pdf->Cell(20,5,utf8_decode($tipo) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($botijao) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($caneca) ,1,0,"C");
			$pdf->Cell(10,5,utf8_decode($qtde) ,1,0,"C");
			$pdf->Cell(80,5,utf8_decode($proprietario) ,1,1);
            	
         
		}
		$pdf->Cell(190,5,"Total geral de doses: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('lista_animais.pdf' , 'I' );
    }          
    public function imprimir_quantidade_proprietario($id)
    {

        $this->verificar_sessao();

        $this->db->where('qtde>',0);
        $this->db->where('idestcliente',$id);
        $this->db->join('cadastro','idestcliente=idcadastro','inner');
        $this->db->join('animal','idestanimal=idanimal','inner');
        $this->db->join('botijao','idestbotijao=idbotijao','inner');    
        $this->db->order_by("nomeanimal");
        $this->db->order_by("nomebotijao");
        $this->db->order_by("estcaneca");
        $dados = $this->db->get('estoque')->result();


		$i=0;
       
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle(utf8_decode("ESTOQUE DE SÊMEM ANIMAL - POR PROPRIETÁRIO"));
        $pdf->SetLeftMargin(10);
        $pdf->Ln(10);	
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode("ESTOQUE DE SÊMEM ANIMAL - POR PROPRIETÁRIO") ,0,0,"C");
        $pdf->Ln(30);
       
		$pdf->SetFont('Arial','B',10);
		//$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(40,5,"Nome animal" ,0,0);
		$pdf->Cell(12,5,utf8_decode("Raça") ,0,0);
		$pdf->Cell(12,5,utf8_decode("Tipo") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Botijão") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Caneca") ,0,0,"C");
		$pdf->Cell(10,5,utf8_decode("Qtde") ,0,0,"C");
		$pdf->Cell(77,5,utf8_decode("Proprietário") ,0,1);
        $pdf->SetFont('Arial','',10);
        $qt=0;
		foreach($dados as $row){
            $nome=$row->nomeanimal;
            $botijao=$row->nomebotijao;
            $raca=$row->raca;
            $caneca=$row->estcaneca;
            $tipo=$row->esttipo;
            $proprietario=$row->nome;
            $qtde=$row->qtde;
            $i=$i+$qtde;
			//$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(40,5,utf8_decode($nome) ,1,0);	
			$pdf->Cell(12,5,utf8_decode($raca) ,1,0);	
			$pdf->Cell(12,5,utf8_decode($tipo) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($botijao) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($caneca) ,1,0,"C");
			$pdf->Cell(10,5,utf8_decode($qtde) ,1,0,"C");
			$pdf->Cell(77,5,utf8_decode($proprietario) ,1,1);
            	
         
		}
		$pdf->Cell(191,5,"Total geral de doses: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('estoque_por_proprietario.pdf' , 'I' );
    }          
          
   
    public function imprimir_quantidade_animal($id)
    {

        $this->verificar_sessao();

        $this->db->where('qtde>',0);
        $this->db->where('idestanimal',$id);
        $this->db->join('cadastro','idestcliente=idcadastro','inner');
        $this->db->join('animal','idestanimal=idanimal','inner');
        $this->db->join('botijao','idestbotijao=idbotijao','inner');
        
        $this->db->order_by("nomeanimal");
        $this->db->order_by("nomebotijao");
        $this->db->order_by("estcaneca");
        
       
        $dados = $this->db->get('estoque')->result();


		$i=0;
       
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle(utf8_decode("ESTOQUE DE SÊMEM ANIMAL - POR PROPRIETÁRIO"));
        $pdf->SetLeftMargin(10);
        $pdf->Ln(10);	
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,5,utf8_decode("ESTOQUE DE SÊMEM ANIMAL - POR PROPRIETÁRIO") ,0,0,"C");
        $pdf->Ln(30);
       
		$pdf->SetFont('Arial','B',10);
		//$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(40,5,"Nome animal" ,0,0);
		$pdf->Cell(20,5,utf8_decode("Tipo") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Botijão") ,0,0,"C");
		$pdf->Cell(20,5,utf8_decode("Caneca") ,0,0,"C");
		$pdf->Cell(10,5,utf8_decode("Qtde") ,0,0,"C");
		$pdf->Cell(80,5,utf8_decode("Proprietário") ,0,1);
        $pdf->SetFont('Arial','',10);
        $qt=0;
		foreach($dados as $row){
            $nome=$row->nomeanimal;
            $botijao=$row->nomebotijao;
            $caneca=$row->estcaneca;
            $tipo=$row->esttipo;
            $proprietario=$row->nome;
            $qtde=$row->qtde;
            $i=$i+$qtde;
			//$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(40,5,utf8_decode($nome) ,1,0);	
			$pdf->Cell(20,5,utf8_decode($tipo) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($botijao) ,1,0,"C");
			$pdf->Cell(20,5,utf8_decode($caneca) ,1,0,"C");
			$pdf->Cell(10,5,utf8_decode($qtde) ,1,0,"C");
			$pdf->Cell(80,5,utf8_decode($proprietario) ,1,1);
            	
         
		}
		$pdf->Cell(190,5,"Total geral de doses: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('lista_animais.pdf' , 'I' );
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
        date_default_timezone_set('America/Sao_Paulo');
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
           $hoje=date("d/m/Y");
           $this->SetFont('Arial','',7);
           $this->Cell(0,10,"impresso: $hoje",0,0,"R");
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

