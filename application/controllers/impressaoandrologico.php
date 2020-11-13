<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/fpdf/fpdf.php';
class Impressaoandrologico extends CI_Controller {

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

    public function imprimir_lista_cadastro()
    {

		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
        $this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->order_by('nomeanimal', 'ASC');
		$dados= $this->db->get('animal')->result();

		$i=0;
        
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
        $pdf->setTitle("LISTA DE ANIMAIS");
        $pdf->SetLeftMargin(20);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(170,5,"LISTA DE ANIMAIS" ,0,0,"C");
		$pdf->Ln(10);	
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(10,5,"ID" ,0,0);	
		$pdf->Cell(60,5,"NOME" ,0,0);
		$pdf->Cell(100,5,utf8_decode("PROPRIETÁRIO") ,0,1);
		$pdf->SetFont('Arial','',10);
		foreach($dados as $row){
			$pdf->Cell(10,5,utf8_decode($row->idanimal) ,1,0);	
			$pdf->Cell(60,5,utf8_decode($row->nomeanimal) ,1,0);	
			$pdf->Cell(100,5,utf8_decode($row->nome) ,1,1);
			$i++;	
		}
		$pdf->Cell(170,5,"Total de animais: ".$i,1,1);
        // Se crean números para generar algunas páginas en el documento
        // for ($i=0; $i < 200; $i++) { 
        //     $pdf->Cell(0,10,utf8_decode('Repitiendo un número para ver header y footer ') . $i ,0,1,'C');
        //     $pdf->Ln();
		// }
		
        $pdf->Output('paginaEnBlanco.pdf' , 'I' );
    }   
    public function imprimir_exame()
    {

		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
        $this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->order_by('nomeanimal', 'ASC');
        $dados= $this->db->get('animal')->result();
        
        $proprietario="Wanderlei Monteiro de Araujo Filho";
        $propriedade="Santo Expedito";
        $contato="63992440988";
        $municipio = "Araguanã";
        $uf="TO";
        $dataexame="05/10/2020";
        $coletor="André Luiz Mancine Carreira";
        $animal="Curió";
        $raca = "Nelore";
        $filiacao="Mãe";
        $avo="avo";
        $peso="120";
        $idade="24 meses";
        $historico_anamnese="9999";
        $condicao_corporal="Normal";
        $regime_alimentar="Normal";
        $comportamento_sexual="";
        $especie="";
        $aprumos="";
        $prepurcio="";
        $test_te="";
        $td="";
        $ce="";
        $penis="";
        $epidimo="";
        $cord_espermatico="";
        $grand_vesiculares="";
        $escroto="";
        $coleta="";
        $data_coleta="";
        $obs="";
        $volume="";
        $turbilh="";
        $motilidade="";
        $vigor="";
        $concentracao="";
        $defeitos_maiores="30";
        $defeitos_menores="70";
        $defeitos_totais="100";
        $conclusao="";
        $extenso="";
        $assinatura="";
        $crmv="";
		$i=0;
        $pdf = new PDF();
        $pdf->AddPage('L','A4',0);
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial','B',12);
		$title = iconv('utf-8','iso-8859-1','Bos - Certificado Andrológico');
		$pdf->SetTitle($title);
		$pdf->SetAuthor("Bos");
                $pdf->SetMargins(10,'');
		//$pdf->Write(20,str_repeat('teste',1000));
                              $pdf->SetXY(30,100);
                              $pdf->Rect(30,100,530,46);
                              $pdf->SetFillColor(232,232,232);
                              $pdf->SetTextColor(0,0,0);
	                     $pdf->SetFont('Times','B',10);
				$pdf->Cell(62, 15,iconv('utf-8','iso-8859-1', "Proprietário:"),0,0,'L');
                             $pdf->SetFont('Times','',10);
                                $pdf->Cell(200, 15, $proprietario,0,0,'L');
                            $pdf->SetFont('Times','B',10);
                                $pdf->Cell(60, 15, "Propriedade:", 0, 0, 'L');
                            $pdf->SetFont('Times','',10);
                                $pdf->Cell(200, 15,iconv('utf-8','iso-8859-1',$propriedade),0,1,'L');
			     $pdf->SetFont('Times','B',10);	
                                $pdf->Cell(30, 15, "Fone:", 0, 0, 'L');
                             $pdf->SetFont('Times','',10);
                                $pdf->Cell(100, 15, $contato, 0, 0, 'L');
                            $pdf->SetFont('Times','B',10);
				$pdf->Cell(80, 15,iconv('utf-8','iso-8859-1', "Município:"), 0, 0, 'R');
                            $pdf->SetFont('Times','',10);
                                $pdf->Cell(90, 15,iconv('utf-8','iso-8859-1',$municipio), 0, 0, 'L');
                            $pdf->SetFont('Times','B',10);
				$pdf->Cell(60, 15, "Estado:", 0, 0, 'R');
                            $pdf->SetFont('Times','',10);
                                $pdf->Cell(60, 15, $uf, 0, 1, 'L');
                            $pdf->SetFont('Times','B',10);
				$pdf->Cell(60, 15, "Data Exame:", 0, 0, 'C');
                            $pdf->SetFont('Times','',10);
                                $pdf->Cell(50, 15, $dataexame, 0, 0, 'C');
                             $pdf->SetFont('Times','B',10);
				$pdf->Cell(150, 15, iconv('utf-8','iso-8859-1',"M. Veterinário-Coletador:"), 0, 0, 'C');
                            $pdf->SetFont('Times','',10);
                                $pdf->Cell(50, 15, $coletor, 0, 1, 'L');
                                $pdf->ln(20);
                               
                              $pdf->SetXY(30,160);
                              $pdf->Rect(30,160,530,53);
			      $pdf->SetFont('Times','',14);
                              $pdf->Cell(50, 15,iconv('utf-8','iso-8859-1', "A - IDENTIFICAÇÃO DO REPRODUTOR"), 0, 1, 'L');
                 	      //$pdf->SetDrawColor(255,255,255);
			      //$pdf->SetFillColor(230,230,0);
                              $pdf->SetFont('Times','B',10);
                                $pdf->Cell(32, 15, "Nome:", 0, 0, 'L');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(148, 15, $animal,0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                                 $pdf->Cell(26, 15, "Raca:", 0, 0, 'C');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(144, 15, $raca, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                                $pdf->Cell(24, 15, "RG:", 0, 0, 'C');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(149, 15, "VBA-8654",0, 1, 'L');
                 	      $pdf->SetFont('Times','B',10);
                                $pdf->Cell(40, 15, "Filiacao:",0, 0, 'L');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(140, 15, $filiacao,0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                                $pdf->Cell(70, 15,iconv('utf-8','iso-8859-1', "Avô materno:"), 0, 0, 'L');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(100, 15, $avo, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                                $pdf->Cell(25, 15, "Peso:", 0, 0, 'C');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(55, 15, $peso, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                                $pdf->Cell(30, 15, "Idade:", 0, 0, 'C');
                              $pdf->SetFont('Times','',10);
                                $pdf->Cell(63, 15, $idade, 0, 1, 'L');
			      $pdf->ln(20);
			     
                              $pdf->SetXY(30,220);
                              $pdf->Rect(30,220,530,80);
                              $pdf->SetFont('Times','B',10);                   
			      $pdf->SetFont('Times','',14);
                              $pdf->Cell(50, 15, iconv('utf-8','iso-8859-1',"B - EXAME CLÍNICO GERAL"), 0, 1, 'L');
                       	      $pdf->SetFont('Times','B',10);
                              $pdf->Cell(140, 15,iconv('utf-8','iso-8859-1', "HISTÓRICO E ANAMNESE:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(380, 15,$historico_anamnese, 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(43, 15, "GERAL: ", 0, 0, 'L');
                              $pdf->Cell(140, 15,iconv('utf-8','iso-8859-1', "Condição Corporal(1-5)=$condicao_corporal"), 0, 0, 'L');
                              $pdf->Cell(140, 15, "Regime Alimentar:$regime_alimentar", 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(146, 15, "COMPORTAMENTO SEXUAL:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(370, 15,iconv('utf-8','iso-8859-1', $comportamento_sexual), 0, 1, 'L');
			      $pdf->SetFont('Times','B',10);
                              $pdf->Cell(55, 15, iconv('utf-8','iso-8859-1',"ESPÉCIE: "), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(140, 15,iconv('utf-8','iso-8859-1', $especie), 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(80, 15, "APRUMOS: ", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(240, 15, $aprumos, 0, 0, 'L');
                              $pdf->ln(20);
                              
                              
                              $pdf->SetXY(30,310);
                              $pdf->Rect(30,310,530,80);
                              $pdf->SetFont('Times','B',10);                   
			      $pdf->SetFont('Times','',14);
                              $pdf->Cell(50, 15, iconv('utf-8','iso-8859-1',"B - EXAME CLÍNICO ESPECÍFICO"), 0, 1, 'L');
                       	      $pdf->SetFont('Times','B',10);
                              $pdf->Cell(60, 15,iconv('utf-8','iso-8859-1', "PREPÚCIO:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(80, 15, $prepurcio, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(60, 15, "TEST.TE=", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(100, 15,$test_te, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(30, 15, "TD=", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(70, 15,$td, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(30, 15,"CE:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(50, 15,"$ce cm", 0, 1, 'L');
                       	      $pdf->SetFont('Times','B',10);
                              
                              $pdf->Cell(60, 15,iconv('utf-8','iso-8859-1', "PÉNIS:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(80, 15, "$penis", 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(60, 15,iconv('utf-8','iso-8859-1', "EPIDÍMO"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(100, 15,$epidimo, 0, 1, 'L');
                              
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(120, 15,iconv('utf-8','iso-8859-1', "CORD. ESPERMÁTICO:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(80, 15, $cord_espermatico, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(120, 15,iconv('utf-8','iso-8859-1', "GRAND. VESICULARES: "), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(100, 15,$grand_vesiculares, 0, 1, 'L');
                              
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(60, 15,iconv('utf-8','iso-8859-1', "ESCROTO:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(80, 15, $escroto, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(280, 15,"*****",0, 1, 'L');
                              $pdf->ln(20);
                              
                              
                              
                              $pdf->SetXY(30,400);
                              $pdf->Rect(30,400,530,150);
                              $pdf->SetFont('Times','B',10);                   
			      $pdf->SetFont('Times','',14);
                              $pdf->Cell(50, 15, iconv('utf-8','iso-8859-1',"B - ESPERMEOGRAMA"), 0, 1, 'L');
                       	      $pdf->SetFont('Times','B',10);
                              $pdf->Cell(80, 15,iconv('utf-8','iso-8859-1', "Método de coleta:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(80, 15, "Eletroejaculador.", 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(90, 15,iconv('utf-8','iso-8859-1', "Número de coleta:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(70, 15,"$coleta", 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(80, 15, "Data da coleta", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(70, 15,$data_coleta, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(30, 15,"OBS:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(140, 15,$obs, 0, 1, 'L');
                       	      $pdf->SetFont('Times','B',10);
                              $pdf->Cell(200, 15,iconv('utf-8','iso-8859-1', "D.1-Característica Física"), 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(48, 15, "Volume:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(50, 15,iconv('utf-8','iso-8859-1', $volume), 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(48, 15,"Turbilh.:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(50, 15,$turbilh, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(55, 15,"Motilidade:", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(50, 15,$motilidade, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(53, 15,"Vigor(0-5):", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(30, 15,$vigor, 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(80, 15,iconv('utf-8','iso-8859-1',"Concentração:"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(60, 15,iconv('utf-8','iso-8859-1',$concentracao), 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(180, 15,iconv('utf-8','iso-8859-1', "D.2 - Características morfológicas:"), 0, 1, 'L');
                              $pdf->Cell(80, 15,iconv('utf-8','iso-8859-1',".Defeitos Maiores"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(400, 15,iconv('utf-8','iso-8859-1',"(Acrossoma,gota proximal e distal, piriforme, pouch, formation, peça "), 0, 1, 'L');
                              $pdf->Cell(465, 15,iconv('utf-8','iso-8859-1',"(intermediária(fratura),cauda dobrada, estreito base, etc.)="), 0, 0, 'L');                            
                              $pdf->Cell(30, 15,"$defeitos_maiores%", 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(80, 15,iconv('utf-8','iso-8859-1',".Defeitos Menores"), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(385, 15,iconv('utf-8','iso-8859-1',"(defeitos de cabeça, gigante,curto,cauda enrolada,decaptação, etc.)="), 0, 0, 'L');                             
                              $pdf->Cell(30, 15,"$defeitos_menores%", 0, 1, 'L');
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(465, 15,"Defeitos Totais", 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);        
                              $pdf->Cell(30, 15,"$defeitos_totais%", 0, 1, 'L');  
                              $pdf->ln(20);
                              
                              $pdf->SetXY(30,555);
                              $pdf->Rect(30,555,530,50);
                              $pdf->SetFont('Times','B',10);                   
			      $pdf->SetFont('Times','',14);
                              $pdf->Cell(400, 15, iconv('utf-8','iso-8859-1',"E - CONCLUSÃO"), 0, 1, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(149, 15, iconv('utf-8','iso-8859-1',"No momento, o animal encontra-se "), 0, 0, 'L');
                              $pdf->SetFont('Times','B',10);
                              
                              $pdf->Cell(33, 15, iconv('utf-8','iso-8859-1',"$conclusao "), 0, 0, 'L');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(340, 15, iconv('utf-8','iso-8859-1'," à reproduçao, quanto ao exame clínico andrológico e espermiogênese.  "), 0, 1, 'L');
                              $pdf->Ln(30);
                              $pdf->Cell(340, 15, iconv('utf-8','iso-8859-1',"Araguaína-TO, $extenso"), 0, 1, 'L');
                               $pdf->Ln(50);
                               $pdf->SetFont('Times','I',9);
                             $pdf->Cell(406, 15, iconv('utf-8','iso-8859-1'," $ce cm"), 0, 1, 'R');
                              $pdf->Ln(10);
                              $pdf->SetFont('Times','B',10);
                              $pdf->Cell(400, 15, iconv('utf-8','iso-8859-1',"Idade: "), 0, 0, 'R');
                              $pdf->SetFont('Times','I',10);
                              $pdf->Cell(55, 15, iconv('utf-8','iso-8859-1',$idade), 0, 1, 'C');
                              $pdf->Ln(2);
                              $pdf->Cell(465, 15, iconv('utf-8','iso-8859-1',$assinatura), 0, 1, 'C');
                              $pdf->Cell(465, 15, iconv('utf-8','iso-8859-1',$crmv), 0, 1, 'C');
                             $pdf->Cell(465, 15, iconv('utf-8','iso-8859-1',"A produção de um programa de melhoramento genético é seu teste de progênie. Avalie seus touros"), 0, 1, 'C');
                            //   $pdf->Image("imagens/30.png", 380, 620,'PNG');
                            //   $pdf->Image("imagens/bos.png",50, 633,105,60,'PNG');
                              $pdf->Image(base_url()."assets/img/30.png", 380, 620,'PNG');
                              $pdf->Image(base_url()."assets/img/bos.png",50, 633,105,60,'PNG');
                            
				//RODAP� DA TABELA QUE APRESENTA A QUANTIDADE DE REGISTROS
				$pdf->SetDrawColor(0,80,180);
				$pdf->SetFillColor(230,230,0);
				$pdf->SetTextColor(220,50,50);
				//$pdf->Cell(786, 15, "Total de clientes: " , 1, 0, 'L');
		
        $pdf->Output('paginaEnBlanco.pdf' , 'I' );
    }       
    public function imprimir_exame_andrologico()
    {

		$this->verificar_sessao();
		$this->db->select("*");
        $this->db->like("chave_auth_animal",$this->buscar_chave_empresa(),"none");
        $this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->order_by('nomeanimal', 'ASC');
        $dados= $this->db->get('animal')->result();
        
        $proprietario="Wanderlei Monteiro de Araujo Filho";
        $propriedade="Santo Expedito";
        $contato="63992440988";
        $municipio = "Araguanã";
        $uf="TO";
        $dataexame="05/10/2020";
        $coletor="André Luiz Mancine Carreira";
        $animal="Curió";
        $raca = "Nelore";
        $filiacao="Mãe";
        $avo="avo";
        $peso="120";
        $idade="24 meses";
        $historico_anamnese="9999";
        $condicao_corporal="Normal";
        $regime_alimentar="Normal";
        $comportamento_sexual="";
        $especie="";
        $aprumos="";
        $prepurcio="";
        $test_te="";
        $td="";
        $ce="";
        $penis="";
        $epidimo="";
        $cord_espermatico="";
        $grand_vesiculares="";
        $escroto="";
        $coleta="";
        $data_coleta="";
        $obs="";
        $volume="";
        $turbilh="";
        $motilidade="";
        $vigor="";
        $concentracao="";
        $defeitos_maiores="30";
        $defeitos_menores="70";
        $defeitos_totais="100";
        $conclusao="";
        $extenso="";
        $assinatura="";
        $crmv="";
		$i=0;
        $pdf = new PDF();
        $pdf->AddPage('P','A4',0);
		$pdf->AliasNbPages();
		$pdf->SetFont('Arial','B',12);
		$title = iconv('utf-8','iso-8859-1','Bos - Certificado Andrológico');
		$pdf->SetTitle($title);
		$pdf->SetAuthor("Bos");
                $pdf->SetMargins(10,'');
		//$pdf->Write(20,str_repeat('teste',1000));
                                //$pdf->SetXY(20,50);
                                $pdf->Rect(10,50,180,26);
                                $pdf->SetFillColor(232,232,232);
                                $pdf->SetTextColor(0,0,0);
	                            $pdf->SetFont('Times','B',10);
	                            $pdf->ln(15);
				                $pdf->Cell(20, 7,iconv('utf-8','iso-8859-1', "Proprietário:"),0,0,'L');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(60, 7, $proprietario,0,0,'L');
                                $pdf->SetFont('Times','B',10);
                                $pdf->Cell(22, 7, "Propriedade:", 0, 0, 'L');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7,iconv('utf-8','iso-8859-1',$propriedade),0,1,'L');
			                    $pdf->SetFont('Times','B',10);	
                                $pdf->Cell(10, 7, "Fone:", 0, 0, '');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7, $contato, 0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
				                $pdf->Cell(20, 7,iconv('utf-8','iso-8859-1', "Município:"), 0, 0, 'R');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7,iconv('utf-8','iso-8859-1',$municipio), 0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
				                $pdf->Cell(20, 7, "Estado:", 0, 0, 'R');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7, $uf, 0, 1, '');
                                $pdf->SetFont('Times','B',10);
				                $pdf->Cell(20, 7, "Data Exame:", 0, 0, '');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(30, 7, $dataexame, 0, 0, '');
                                $pdf->SetFont('Times','B',10);
				                $pdf->Cell(40, 7, iconv('utf-8','iso-8859-1',"M. Veterinário-Coletador:"), 0, 0, 'C');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7, iconv('utf-8','iso-8859-1',$coletor), 0, 1, 'L');
                                $pdf->ln(9);
                                
                                $pdf->Rect(10,80,180,30);
                                $pdf->SetFont('Times','',14);
                                $pdf->Cell(50, 7,iconv('utf-8','iso-8859-1', "A - IDENTIFICAÇÃO DO REPRODUTOR"), 0, 1, 'L');
        
                                $pdf->SetFont('Times','B',10);
                                $pdf->Cell(12, 7, "Nome:", 0, 0, 'L');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(30, 7,iconv('utf-8','iso-8859-1', $animal),0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
                                $pdf->Cell(10, 7,iconv('utf-8','iso-8859-1', "Raça:"), 0, 0, 'C');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7, $raca, 0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
                                $pdf->Cell(10, 7, "RG:", 0, 0, 'C');
                                $pdf->SetFont('Times','',10);
                                $pdf->Cell(20, 7, "VBA-8654",0, 1, 'L');
                                $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(15, 7,iconv('utf-8','iso-8859-1', "Filiação:"),0, 0, 'L');
                                $pdf->SetFont('Times','',10);
                                  $pdf->Cell(30, 7,iconv('utf-8','iso-8859-1', $filiacao),0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(25, 7,iconv('utf-8','iso-8859-1', "Avô materno:"), 0, 0, 'L');
                                $pdf->SetFont('Times','',10);
                                  $pdf->Cell(20, 7, $avo, 0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(10, 7, "Peso:", 0, 0, 'C');
                                $pdf->SetFont('Times','',10);
                                  $pdf->Cell(20, 7, $peso, 0, 0, 'L');
                                $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(10, 7, "Idade:", 0, 0, 'C');
                                $pdf->SetFont('Times','',10);
                                  $pdf->Cell(20, 7, $idade, 0, 1, 'L');
                                  
                                  $pdf->ln(20);
                                  $pdf->Rect(10,120,180,40);
                                  $pdf->SetFont('Times','B',10);                   
                                  $pdf->SetFont('Times','',14);
                                  $pdf->Cell(50, 7, iconv('utf-8','iso-8859-1',"B - EXAME CLÍNICO GERAL"), 0, 1, 'L');
                                  $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(50, 7,iconv('utf-8','iso-8859-1', "HISTÓRICO E ANAMNESE:"), 0, 0, 'L');
                                  $pdf->SetFont('Times','I',10);
                                  $pdf->Cell(50, 7,$historico_anamnese, 0, 1, 'L');
                                  $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(15, 7, "GERAL: ", 0, 0, 'L');
                                  $pdf->Cell(70, 7,iconv('utf-8','iso-8859-1', "Condição Corporal(1-5)=$condicao_corporal"), 0, 0, 'L');
                                  $pdf->Cell(70, 7, "Regime Alimentar:$regime_alimentar", 0, 1, 'L');
                                  $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(70, 7, "COMPORTAMENTO SEXUAL:", 0, 0, 'L');
                                  $pdf->SetFont('Times','I',10);
                                  $pdf->Cell(50, 7,iconv('utf-8','iso-8859-1', $comportamento_sexual), 0, 1, 'L');
                                  $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(20, 7, iconv('utf-8','iso-8859-1',"ESPÉCIE: "), 0, 0, 'L');
                                  $pdf->SetFont('Times','I',10);
                                  $pdf->Cell(50, 7,iconv('utf-8','iso-8859-1', $especie), 0, 0, 'L');
                                  $pdf->SetFont('Times','B',10);
                                  $pdf->Cell(30, 7, "APRUMOS: ", 0, 0, 'L');
                                  $pdf->SetFont('Times','I',10);
                                  $pdf->Cell(70, 7, $aprumos, 0, 0, 'L');
                                  $pdf->ln(20);
                               
   
                            
				//RODAP� DA TABELA QUE APRESENTA A QUANTIDADE DE REGISTROS
				$pdf->SetDrawColor(0,80,180);
				$pdf->SetFillColor(230,230,0);
				$pdf->SetTextColor(220,50,50);
				//$pdf->Cell(786, 15, "Total de clientes: " , 1, 0, 'L');
		
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
			//$this->image('imagens/logovet.jpg',5,10);
			$this->Ln(10);
			$this->SetFont('Arial','B',16);
			//titulo cabe�alho 
                        
                        $this->Cell(180, 5,iconv('utf-8','iso-8859-1', "L.A.D.A -Laboratório de Apoio ao Diagnóstico Animal"),0,1,'C');

                              $this->SetFont('Arial','',8);
                        $this->Cell(180, 10, "Rua 7 de Setembro,350/Centro /Araguaina - TO/CEP.: 77804-040 / Tel.:(63)3421-3063 / 9981-2690",0,1,'C');
                       
                              $this->SetFont('Arial','',18);
                        $this->Cell(180, 10,iconv('utf-8','iso-8859-1', "CERTIFICADO ANDROLÓGICO"),0,0,'C');
                      
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        // $this->Cell(0,10,utf8_decode('Endereço: R. Mal. Castelo Branco - St. Rodoviario, Araguaína - TO, 65907-230'),0,0,'C');
      
		// $this->Cell(-15,10,utf8_decode('Página ') . $this->PageNo(),0,0,'C');
		//$this->Cell(-15,10,utf8_decode('Página ').$this->PageNo().' de {nb}',0,0,'C');
    }
}

