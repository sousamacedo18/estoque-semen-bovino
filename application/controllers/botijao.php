<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Botijao extends CI_Controller {

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
	public function buscar_id_user(){
		return $this->session->userdata('id');
	}
	public function index(){
		
	}
	public function formatardata($data){
		return date("d/m/Y", strtotime($data));
		}
	public function cadastrar()
	{
		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa());
		$this->db->order_by("nome");
		
		$dados['cadastro'] = $this->db->get('cadastro')->result();
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('botijao',$dados);
		$this->load->view('includes/html_footer');
	}
	public function visualizarcaneca(){
		$this->verificar_sessao();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('caneca');
		$this->load->view('includes/html_footer');
	}
    public function movimentacao(){
		$total=0;
		$arraytipoentrada[1]="Aplicado pela empresa";
		$arraytipoentrada[2]="Retirado pelo cliente";
		$arraytipoentrada[3]="Cancelado";


		$id=$this->input->post('id');
		$this->db->select("*");
		$this->db->like("chave_auth_entrada",$this->buscar_chave_empresa());
		$this->db->where("identestoque",$id);
		$this->db->join('cadastro','identcliente=idcadastro','inner');
		$dados= $this->db->get('entrada_semem')->result();
		if(count($dados)>0){
		echo"<tbody>";
		echo"<tr><th>Qtde</th><th>Data</th>
		<th>Observação</th></tr>";
		foreach($dados as $row){
			$tipo=$arraytipoentrada[$row->tipoentrada];
			$total=$total+$row->qtde;

		$dataformatada=$this->formatardata($row->dataentrada);
		
		echo "<tr>";
		
		echo "<td >$row->qtde</td>";
		echo "<td >$dataformatada</td>";
		echo "<td >$row->obsentrada</td>";
		echo "</tr>";
		}
		echo"</tbody>";
		echo"<tfoot>";
		echo"<tr><td>Total de Entrada(s): $total</td><td id='qtdetotal'></td><td></td><td></td></tr>";

		echo"</tfoot>";
	}else{
		echo"<tbody>";
		echo "<tr><td>Sem dados!</td></tr>";
		echo"</tbody>";
	}

	}
    public function movimentacaosaida(){
	    $total=0;
		$arraytipoentrada[1]="Aplicado pela empresa";
		$arraytipoentrada[2]="Retirado pelo cliente";
		$arraytipoentrada[3]="Cancelado";

		$id=$this->input->post('id');
		$this->db->select("*");
		$sql="chave_auth_saida like '".$this->buscar_chave_empresa()."'";
		$this->db->where($sql,null,false);
		$this->db->where("idsaidaestoque",$id);
		$this->db->join('cadastro','idsaidacliente=idcadastro','inner');
		$dados= $this->db->get('saida_semem')->result();
		if(count($dados)>0){
		echo"<tbody>";

		echo"<tr><th>Tipo</th><th>Qtde</th><th>Estoque Anterior</th><th>Data</th><th>Observação</th><th></th></tr>";
		foreach($dados as $row){
			$total=$total+$row->qtde;
		$dataformatada=$this->formatardata($row->datasaida);
		$tipo=$arraytipoentrada[$row->tiposaida];
		echo "<tr >";
		echo "<td >$tipo</td>";
		echo "<td >$row->qtde</td>";
		echo "<td >$row->estoqueanterior</td>";
		echo "<td >$dataformatada</td>";
		echo "<td >$row->obssaida</td>";
		echo "<td ></td>";
		echo "</tr >";
		}
		echo"</tbody>";
		echo"<tfoot>";
		echo"<tr><td>Total de Saída(s): $total</td><td id='qtdetotalsaida' colspan='5'></td></tr>";
		echo"</foot>";
	}else{

	}
	}
    public function visualizarmovimentacao($indice=null,$id=null){
		
		$this->db->select("*");
		$this->db->join('animal','idestanimal=idanimal','inner');
		$sql="chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->where($sql,null,false);
		$this->db->where("idestbotijao",$id);

		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados['estoque'] = $this->db->get('estoque')->result();

		$sql="chave_auth_botijao like '".$this->buscar_chave_empresa()."'";
		$this->db->where($sql,null,false);	
		$this->db->where("idbotijao",$id);
		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->join('propriedade','idpropriedade=idbotpropriedade','inner');
		$dados['botijao'] = $this->db->get('botijao')->result();

		$sql="chave_auth_cadastro like '".$this->buscar_chave_empresa()."'";
		$this->db->select("*");
		$this->db->where($sql,null,false);	
		$this->db->order_by("nome");
		$dados['cadastro'] = $this->db->get('cadastro')->result();

		$sql="chave_auth_animal like '".$this->buscar_chave_empresa()."'";		
		$this->db->select("*");
		$this->db->where($sql,null,false);	
		$this->db->order_by("nomeanimal");
		$dados['animal'] = $this->db->get('animal')->result();

		$this->db->select("*");
		$sql="chave_auth_movimentacao like '".$this->buscar_chave_empresa()."'";
		$this->db->where("idestmovimentacao",$id);
		$this->db->where($sql,null,false);
		$dados= $this->db->get('movimentacao')->result();
		foreach($dados as $row){
			if($row->tipomovimentacao=="S"){
					$bgcolor="'text-danger font-weight-bold'";
			}else{
				$bgcolor="";
			}
			$dataformatada=$this->formatardata($row->datamovimentacao);
		$dados["rederizar_dados"]=+"<table >";
		$dados["rederizar_dados"]=+"<tr ><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";	
	    $dados["rederizar_dados"]=+"<tr >";
		$dados["rederizar_dados"]=+"<td class=$bgcolor>$row->tipomovimentacao</td>";
		$dados["rederizar_dados"]=+"<td class=$bgcolor>$row->qtdmovimentacao</td>";
		$dados["rederizar_dados"]=+"<td class=$bgcolor>$row->estoqueanterior</td>";
		$dados["rederizar_dados"]=+"<td class=$bgcolor>$dataformatada</td>";
		$dados["rederizar_dados"]=+ "<td class=$bgcolor>$row->nome</td>";
		$dados["rederizar_dados"]=+" $this->buscarnome($row->iddestino)";
		$dados["rederizar_dados"]=+"<td class=$bgcolor>$row->obsmovimentacao</td>";
		$dados["rederizar_dados"]=+ "</tr ></font>";
		$dados["rederizar_dados"]=+"</table >";
		}
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
		$this->load->view('ver_movimentacao',$dados);
		$this->load->view('includes/html_footer');
		
	}
	public function retornar_quantidade_estoque(){
		$id=$this->input->post('id');
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestoque",$id);
		$dados= $this->db->get('estoque')->result();
		$json=json_encode($dados);
		echo $json;
	}
    public function estoquecabecalho(){
		$id=$this->input->post('id');
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestoque",$id);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->join('botijao','idestbotijao=idbotijao','inner');
		$dados= $this->db->get('estoque')->result();
		echo"<div class='container border border-danger text-green' style=padding:10px;>";
		echo"<div class='row'>";
		foreach($dados as $row){
			echo "<div class='col-sm'><b>Botijão: </b>". $row->nomebotijao." </div>";
			echo "<div class='col-sm'><b>Caneca: </b>". $row->estcaneca." </div>";
			echo "<div class='col-sm'><b>Touro:</b> ". $row->nomeanimal." </div>";
			echo "<div class='col-sm'><b>Raça:</b> ". $row->raca." </div>";
			echo "<div class='col-sm'><b>Qtde:</b> ". $row->qtde." </div>";
			echo "<div class='col-sm'><b>Código:</b> ". $row->estcodigo." </div>";
			echo "<div class='col-sm'><b>Tipo:</b> ". $row->esttipo." </div>";
			echo"</div>";
			echo"<div class='row'>";
			echo "<div class='col-sm'><b>Proprietário:</b> ". $row->nome." </div>";
			
	  }
	  echo"</div>";
	  echo"</div>";
	
	}
    public function estoquecabecalhoJson(){
	
		$id=$this->input->post('id');
		$this->db->select("*");
		$sql="chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->where("idestoque",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$dados= $this->db->get('estoque')->result();
		$json=json_encode($dados);
		echo $json;
	
	}
    public function montarcanecas(){
		$id=$this->input->post('id');
		$idanimal=$this->input->post('idanimal');
		$this->db->select("*");
		$sql="qtde>0 and eststatus like 'ABERTO' and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->where("idestbotijao",$id);
		$this->db->where($sql,null,false);
		$this->db->where("idestanimal",$idanimal);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
			echo"<tr>";
			echo "<td class='text-center'>". $row->estcaneca." </td>";
			echo "<td>". $row->nomeanimal." </td>";
			echo "<td class='text-center'>". $row->qtde." </td>";
			echo "<td>". $row->esttipo." </td>";
			echo "<td>". $row->nome." </td>";
			echo "<td><input type='radio' id='optestoque' name='optestoque' value='$row->idestoque' required></td>";
			echo"</tr>";
	  }
	}
	public function atualizar_origem(){
		$id=$this->input->post('id');
		$this->db->select("*");
		//$sql="qtde>=0 and eststatus like 'ABERTO'  and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$sql="qtde>0 and eststatus like 'ABERTO'";
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
            echo"<tr >
            <td>$row->estcaneca</td>
            <td>$row->nomeanimal</td>
            <td>$row->raca</td>
            <td>$row->qtde</td>
            <td>$row->estcodigo</td>
            <td>$row->esttipo</td>
            <td>$row->nome</td>
            <td><input type='radio' name='opt_origem' value='$row->idestoque' /></td>
            </tr>";
		}	
	}
	public function filtrar_origem(){
		$id=$this->input->post('id');
		$this->db->select("*");
		//$sql="qtde>=0 and eststatus like 'ABERTO'  and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$sql="qtde>0 and eststatus like 'ABERTO'";
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestoque",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
            echo"<tr >
            <td>$row->estcaneca</td>
            <td>$row->nomeanimal<input type='hidden' id='id_animal_origem' value='$row->idestanimal'></td>
            <td>$row->raca</td>
            <td >$row->qtde<input type='hidden' id='qtd_origem' value='$row->qtde'></td>
            <td>$row->estcodigo</td>
            <td>$row->esttipo</td>
            <td>$row->nome</td>
			<td><input type='hidden' name='input_origem' id='input_origem' value='$row->idestoque' />
			<img src='"?>
			<?= base_url();?>
			<?php echo"assets/bootstrap-icons/check2.svg' alt='' 
			width='20' height='20' title='Bootstrap' >		
			
			</td>
            </tr>";
		}	
	}
	public function atualizar_destino(){
		$id=$this->input->post('id');
	
		$this->db->select("*");
		//$sql="qtde>=0 and eststatus like 'ABERTO'  and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$sql="qtde>=0 and eststatus like 'ABERTO'";
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
            echo"<tr >
            <td>$row->estcaneca</td>
            <td>$row->nomeanimal</td>
            <td>$row->raca</td>
            <td>$row->qtde</td>
            <td>$row->estcodigo</td>
            <td>$row->esttipo</td>
            <td>$row->nome</td>
            <td><input type='radio' name='opt_destino' value='$row->idestoque' /></td>
            </tr>";
		}	
	}

	public function filtrar_destino(){
		$id=$this->input->post('id');
		$this->db->select("*");
		//$sql="qtde>=0 and eststatus like 'ABERTO'  and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$sql="qtde>=0 and eststatus like 'ABERTO'";
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestoque",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
            echo"<tr >
            <td>$row->estcaneca</td>
            <td>$row->nomeanimal<input type='hidden' id='id_animal_destino' value='$row->idestanimal'></td>
            <td>$row->raca</td>
            <td >$row->qtde<input type='hidden' id='qtd_destino' value='$row->qtde'></td>
            <td>$row->estcodigo</td>
            <td>$row->esttipo</td>
            <td>$row->nome</td>
			<td><input type='hidden' name='input_destino' id='input_destino' value='$row->idestoque' />
			<img src='"?>
			<?= base_url();?>
			<?php echo"assets/bootstrap-icons/check2.svg' alt='' 
			width='20' height='20' title='Bootstrap' >		
			
			</td>
            </tr>";
		}	
	}

	public function salvar_espaco()
	{
		date_default_timezone_set('America/Sao_Paulo');
		$this->verificar_sessao();
		$proprietario       =$this->input->post("proprietario");
		$animal             =$this->input->post("animal");
		$tiposemem          =$this->input->post("tiposemem");
        $qtde               =$this->input->post("qtde");
		$caneca             =$this->input->post("caneca");	
		$codigo             =$this->input->post("codigo");
		$botijao            =$this->input->post("botijao");
		
		$data["idestcliente"]      =$proprietario;
		$data["idestanimal"]       =$animal;
		$data["esttipo"]           =$tiposemem;
		$data["qtde"]              =$qtde;
		$data["estcodigo"]         =$codigo;
		$data["estcaneca"]         =$caneca;
		$data["idestbotijao"]      =$botijao;
		$data["eststatus"]         ="ABERTO";
		$data["chave_auth_estoque"]=$this->buscar_chave_empresa();

		$tipotransf         =$this->input->post("tipotransf");
		$qtd_origem         =$this->input->post("qtdorigem");
		$observacao_novo    =$this->input->post("observacao_novo");
		$idorigem           =$this->input->post("idorigem");

		if($this->db->insert('estoque',$data)){
			$insert_id = $this->db->insert_id();
			 

			$origem=$qtd_origem-$qtde;
			 $dados["qtde"]=$origem;
			 if($origem==0){
		 	$dados['eststatus'] = "FECHADO";
				
		   
				}else{
			 					$dados['eststatus'] = "ABERTO";
			 		}
			 $this->db->where("idestoque",$idorigem);
		    $this->db->update("estoque",$dados);
		}
		$movimentacao['iduser'] = 1; 
		$movimentacao['tipo'] = $tipotransf;
	    $movimentacao['idorigem'] =$idorigem;
	   $movimentacao['iddestino'] = $insert_id;
		$movimentacao['qtdtransferida'] = $qtde;
		$movimentacao['qtdorigem'] = $qtd_origem;
	   $movimentacao['qtddestino'] = $qtde;
		$movimentacao['datamovimentacao'] = date('y-m-d');
		//$movimentacao['observacao'] = $observacao_novo;
		if($this->db->insert('movimentacao',$movimentacao)){
			echo"Salvo com Sucesso";
		}

	}
	public function salvar_transferencia(){
		    date_default_timezone_set('America/Sao_Paulo');
			$this->verificar_sessao();
			$idorigem  =$this->input->post("idorigem");
			$iddestino =$this->input->post("iddestino");
			$qtdorigem =$this->input->post("qtdorigem");
			$qtddestino=$this->input->post("qtddestino");
			$mov=$this->input->post("movimentacao");
			

			$qtd=$this->input->post("qtd");


			$origem=$qtdorigem-$qtd;
			$destino=$qtddestino+$qtd;
			$dados["qtde"]=$origem;
			$dado["qtde"]=$destino;

		
			$tipo      =$this->input->post("tipo");
			$observacao=$this->input->post("observacao");

			if($origem==0){
		             $dados['eststatus'] = "FECHADO";
				
			}else{
				     $dados['eststatus'] = "ABERTO";
			}

			$movimentacao['iduser'] = $this->buscar_id_user();
			$movimentacao['tipo'] = $tipo;
			$movimentacao['idorigem'] = $idorigem;
			$movimentacao['iddestino'] = $iddestino;
			$movimentacao['qtdtransferida'] = $qtd;
			$movimentacao['qtdorigem'] = $qtdorigem;
			$movimentacao['qtddestino'] = $qtddestino;
			$movimentacao['datamovimentacao'] = date('y-m-d');
			$movimentacao['observacao'] = $observacao;
			$movimentacao['chave_auth_movimentacao'] = $this->buscar_chave_empresa();

			// $data['dataconclusaosaida'] = date('y-m-d');
			//$data['chave_auth_conclusao']=$this->buscar_chave_empresa();

			//$dados["saidastatus"]="FINALIZADO";
		

			$this->db->where("idestoque",$idorigem);
		    $this->db->update("estoque",$dados);

		    $this->db->where("idestoque",$iddestino);
			$this->db->update("estoque",$dado);

			
			

			if($this->db->insert('movimentacao',$movimentacao)){
				$insert_id = $this->db->insert_id();
				
			}
			$movi["iddevolucao"]=$insert_id;
			$movi['datadevolucao'] = date('y-m-d');
			if($mov>0){
				$this->db->where("idmovimentacao",$mov);
				$this->db->update("movimentacao",$movi);
			}
			
			//$data['eststatus'] = "ABERTO";
			//$data['chave_auth_estoque']=$this->buscar_chave_empresa();

			

			
		
	}
    public function montarcanecassaida(){
		$id=$this->input->post('id');
		$idanimal=$this->input->post('idanimal');
		$this->db->select("*");
		$sql="qtde>=0 and eststatus like 'ABERTO'  and chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->where("idestbotijao",$id);
		$this->db->where($sql,null,false);
		$this->db->where("idestanimal",$idanimal);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
			echo"<tr>";
			echo "<td class='text-center'>". $row->estcaneca." </td>";
			echo "<td>". $row->nomeanimal." </td>";
			echo "<td class='text-center'>". $row->qtde." </td>";
			echo "<td>". $row->esttipo." </td>";
			echo "<td>". $row->nome." </td>";
			echo "<td><input type='radio' name='optsestoque' value='$row->idestoque' required></td>";
			echo"</tr>";
	  }
	}
    public function montarbotijoesFornecedor(){
		$id=$this->input->post('id');
		$this->db->select("*");
		$sql="chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->where("idcadastro",$id);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
			echo"<tr>";
			echo "<td>". $row->estcaneca." </td>";
			echo "<td>". $row->nomeanimal." </td>";
			echo "<td>". $row->raca." </td>";
			echo "<td>". $row->qtde." </td>";
			echo "<td>". $row->estcodigo." </td>";
			echo "<td>". $row->esttipo." </td>";
			echo "<td>". $row->nome." </td>";
			echo "<td><input type='radio' name='optestoque' value='$row->idestoque'></td>";
			echo"</tr>";
	  }
	}

	public function espaco_caneca(){
		$max=0;
		$total=0;
		$espaco=0;
		$idestbotijao=$this->input->post('idestbotijao');
		$num_caneca=$this->input->post('num_caneca');
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$idestbotijao);
		$this->db->where("estcaneca",$num_caneca);
		$dados= $this->db->get('estoque')->result();
		foreach($dados as $row){
				$total=$total+$row->qtde;
				$max=$row->capmaxcaneca;
		}
		$espaco=$max-$total;
		echo "[{espaco:$espaco}]";
	}
    public function verificar_espaco_caneca(){
		header('Content-Type: application/json');
		$idestbotijao=$this->input->post('idestbotijao');
		$num_caneca=$this->input->post('num_caneca');

		$sql="chave_auth_estoque like '".$this->buscar_chave_empresa()."'";
		$this->db->select("*");
		$this->db->where("idestbotijao",$idestbotijao);
		$this->db->where("estcaneca",$num_caneca);
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$total = 0;
		$dados= $this->db->get('estoque')->result();
		$cont=sizeof($dados);
		if($cont>0){
					echo json_encode( $dados );
	  			
				}
					else{
						echo"[{}]";
					}
	}
	
    public function montarbotijoes(){
	
		$this->db->select("*");
		$sql="chave_auth_botijao like '".$this->buscar_chave_empresa()."'";
		$this->db->where($sql,null,false);
		$dados= $this->db->get('botijao')->result();
		echo"<option ";
		echo"</option>";	
		foreach($dados as $row){
			echo"<option value=$row->idbotijao>";
			echo$row->nomebotijao;
			echo"</option>";
	  }

	
	}

    public function verificarEspacoCaneca($idbotijao,$idcaneca){
		$espaco=0;
		$cpmx=0;
		$qtdcaneca=0;
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$idbotijao);
		$this->db->where("estcaneca",$idcaneca);
	
		$this->db->where("eststatus","ABERTO");
		$caneca = $this->db->get('estoque')->result();
		foreach($caneca as $can){
	    $cpmx=$can->capmaxcaneca;
		$qtdcaneca=	$qtdcaneca+$can->qtde;
		}
		$espaco=$cpmx-$qtdcaneca;
		return $espaco;
	}
	public function buscarnome($id=null){
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->where("idcadastro",$id);
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa(),'none');
		$dados= $this->db->get('cadastro')->result();
		foreach($dados as $row){
              echo "<td>". $row->nome." </td>";
		}
	}
	public function estoquecliente()
	{
		$id=$this->input->post('id');
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->like("eststatus","ABERTO");
		$this->db->where("idestcliente",$id);

		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->join('botijao','idestbotijao=idbotijao','inner');
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados = $this->db->get('estoque')->result();
		if(count($dados)>0){
		echo"
		<thead>
		<tr>
		<th>Botijão</th>
		<th>Caneca</th>
		<th>Animal</th>
		<th>Qtde</th>
		<th>Tipo</th>
		<th></th>
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
				."<td>
				<a href=''>
				<img src='"?>
				<?= base_url();?>
				<?php echo"assets/bootstrap-icons/chevron-compact-right.svg' alt='' 
				width='20' height='20' title='Ir para botijão' >
				</a>	
				</td>
			
			</tr>
			";

		}
	}
	}
	public function estoque($indice=null,$id=null){
		$this->verificar_sessao();
		$chave=$this->buscar_chave_empresa();
		$this->db->select("*");
		$this->db->join('animal','idestanimal=idanimal','inner');
		$sql="eststatus like 'ABERTO'";
		$this->db->where("idestbotijao",$id);
		$this->db->where($sql,null,false);
		$this->db->like("chave_auth_estoque",$chave);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados['estoque'] = $this->db->get('estoque')->result();

		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->join('propriedade','idpropriedade=idbotpropriedade','inner');
		$this->db->where("idbotijao",$id);
		$this->db->like("chave_auth_botijao",$chave);
		$dados['botijao'] = $this->db->get('botijao')->result();

		$this->db->select("*");
		$this->db->where("chave_auth_cadastro",$chave);
		$this->db->order_by("nome");
		$dados['cadastro'] = $this->db->get('cadastro')->result();
		$this->db->select("*");
		$this->db->like("chave_auth_animal",$chave);
		
		$this->db->order_by("nomeanimal");
		$dados['animal'] = $this->db->get('animal')->result();

		$this->db->like("datadevolucao",'0000-00-00');
		$this->db->where("chave_auth_movimentacao",$chave);
		
		$dados['movimentacao'] = $this->db->get('movimentacao')->result();

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
		$this->load->view('estoque_botijao',$dados);
		$this->load->view('includes/html_footer');
	}
	public function paletas_botijao($indice=null,$id=null){
		$this->verificar_sessao();

		$this->db->select("*");
		$this->db->join('animal','idestanimal=idanimal','inner');
		$this->db->where("idestbotijao",$id);
		$this->db->where("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->order_by('estcaneca','ASC');
		$dados['estoque'] = $this->db->get('estoque')->result();

		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->join('propriedade','idpropriedade=idbotpropriedade','inner');
		$this->db->where("idbotijao",$id);
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$dados['botijao'] = $this->db->get('botijao')->result();

		$this->db->select("*");
		$this->db->where("chave_auth_cadastro",$this->buscar_chave_empresa());
		$this->db->order_by("nome");
		$dados['cadastro'] = $this->db->get('cadastro')->result();
		$this->db->select("*");
		$this->db->like("chave_auth_animal",$this->buscar_chave_empresa());
		$this->db->order_by("nomeanimal");
		$dados['animal'] = $this->db->get('animal')->result();

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
		$this->load->view('paletas_botijao',$dados);
		$this->load->view('includes/html_footer');
	}
	public function carregarpaletas(){
		$idbot=$this->input->post('idbotijao');
		$idCaneca=$this->input->post('idcaneca');
		$qtdCaneca=$this->input->post('qtdcaneca');
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$idbot);
		$this->db->where("estcaneca",$idCaneca);

		$dados= $this->db->get('estoque')->result();
		$qtd=0;
		foreach($dados as $row){
			$nometouro=$row->idestanimal;
			$qtd=$qtd+$row->qtde;
			$idbotijao=$row->idestbotijao;

		}

	
		for($i=1;$qtdCaneca>=$i;$i++){
	
	
	echo"	<tr>
		  <th scope='row'><?=$i;?></th>
		  <td>$nometouro</td>
		  <td>$qtd</td>
		  <td>
		  <button type='button' class='btn btn-success btn-sm' onclick='abrirCaneca(<?=$idbotijao?>,<?=$i;?>)'>
			  Entrar
		  </button>
		  </td>
		</tr>";

	
	
	}
}
	

	public function listar_cadastro($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->join('propriedade','idbotpropriedade=idpropriedade','inner');
		$dados['botijao'] = $this->db->get('botijao')->result();
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
		$this->load->view('listar_botijao',$dados);
		$this->load->view('includes/html_footer');
	}
	public function esc_botijao_transf($id=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$sql="qtde>=0 and eststatus like 'ABERTO'";
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		
		$dados['botijao'] = $this->db->get('botijao')->result();
		$this->db->where("idestbotijao",1);
		//$this->db->like("eststatus","ABERTO");
		$this->db->where($sql,null,false);
		$this->db->join('cadastro','idestcliente=idcadastro','inner');
		$this->db->join('animal','idestanimal=idanimal','inner');
		$dados['estoque'] = $this->db->get('estoque')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');

		$this->load->view('esc_botijoes_transf',$dados);
		$this->load->view('includes/html_footer');
	}
	public function mostrarlista($indice=null)
	{
		$this->verificar_sessao();
		$this->db->select("*");
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$this->db->join('cadastro','idproprietario=idcadastro','inner');
		$this->db->join('propriedade','idbotpropriedade=idpropriedade','inner');
		$dados['botijao'] = $this->db->get('botijao')->result();
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
		$this->load->view('mostrarlista',$dados);
		$this->load->view('includes/html_footer');
	}

	public function salvar_cadastro()
	{
		
		    $this->verificar_sessao();
			$data['nomebotijao'] = $this->input->post('nomebotijao');
			$data['idproprietario'] = $this->input->post('idcliente');
			$data['iduser'] = $this->session->userdata('id');

			$data['idbotpropriedade'] = $this->input->post('idpropriedade');
			$data['statusbotijao'] = "Ativo";
			$data['obsbotijao'] = $this->input->post('obsbotijao');
			$data['chave_auth_botijao']=$this->buscar_chave_empresa();

			if($this->db->insert('botijao',$data)){
					redirect('botijao/listar_cadastro/1');
			}else{
				   redirect('botijao/listar_cadastro/2');
			}
		
	}

	public function salvar_conclusao()
	{
		
			$this->verificar_sessao();
			$idsaida=$this->input->post("idauxsaida");
			$data['idestconclusao'] = $this->input->post('idauxestoque');
			$data['idsaidaconclusao'] = $this->input->post('idauxsaida');
			$data['dataconclusaosaida'] = date('y-m-d');
			$data['idconclusaocliente'] = $this->input->post('idauxcliente');
			$data['idconclusaopropriedade'] = $this->input->post('propriedade');
			$data['idconclusaoaplicador'] = $this->input->post('inseminador');
			$data['conclusaodescarte'] = $this->input->post('descarte');
			$data['conclusaokm'] = $this->input->post('km');
			$data['iduser'] = $this->session->userdata('id');
			$data['chave_auth_conclusao']=$this->buscar_chave_empresa();


			$dados["saidastatus"]="FINALIZADO";

			if($this->db->insert('conclusao',$data)){
				$this->db->where("idsaida",$idsaida);
				$this->db->update("saida_semem",$dados);
					redirect('botijao/inseminacao/1');
			}else{
				   redirect('botijao/inseminacao/2');
			}
		
	}
	public function conclusao(){
		$id=$this->input->post("id"); 
		$this->db->where('idsaidaconclusao',$id);
		$this->db->join('cadastro','idconclusaocliente=idcadastro','inner');
		$this->db->join('usuario','idconclusaoaplicador=idusuario','inner');
		$this->db->join('propriedade','	idconclusaopropriedade=idpropriedade','inner');
		$this->db->join('saida_semem','idsaidaconclusao=idsaida','inner');
		$dados=$this->db->get("conclusao")->result();
		$nome=$dados[0]->nome;
		$usuario=$dados[0]->nomeusuario;
		$qtde=$dados[0]->qtde;
		$descarte=$dados[0]->conclusaodescarte;
		$propriedade=$dados[0]->nomepropriedade;
		$km=$dados[0]->conclusaokm;
		$data=$this->formatardata($dados[0]->dataconclusaosaida);

		
echo'<table class="table">
		<thead>
		  <tr>
			<th scope="col">#</th>
			<th scope="col">Cliente</th>
			<th scope="col">Data</th>
			<th scope="col">Propriedade</th>
		  </tr>
		  </thead>';
echo"
		  <tr>
		  <th scope='row'>2</th>
		  <td>$nome</td>
		  <td>$data</td>
		  <td>$propriedade</td>
		</tr>
		<tr>
		";
		echo'<table class="table">
		<thead>
		  <tr>
			<th scope="col">Inseminador</th>
			<th scope="col">Dose(s)</th>
			<th scope="col">Descarte</th>
			<th scope="col">KM</th>
		  </tr>
		  </thead>';
		  echo"
		  <tr>
		  <td>$usuario</td>
		  <td>$qtde</td>
		  <td class='text-danger'><b>$descarte</b></td>
		  <td>$km KM</td>
		</tr>
		<tr>
		";		  		
echo"  </tbody>
</table>";
		
	}
	public function cadastrar_movimentacao($id){
		$this->verificar_sessao();
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$this->db->where("idestbotijao",$id);
		
		$dados['botijao'] = $this->db->get('botijao')->result();
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('movimentacao',$dados);
		$this->load->view('includes/html_footer');
	}
	public function inseminacao($indice=null){
			$this->verificar_sessao();
			$this->db->like("chave_auth_saida",$this->buscar_chave_empresa());
			//$this->db->where('inseminacao',1);
			$this->db->like("saidastatus","AGUARDANDO");
			$this->db->or_like("saidastatus","FINALIZADO");
			$this->db->order_by('saidastatus',"asc");
			$this->db->join('cadastro','idsaidacliente=idcadastro','inner');
			
			$dados['saida'] = $this->db->get('saida_semem')->result();
			$this->db->like("chave_auth_usuario",$this->buscar_chave_empresa());
			$this->db->order_by('nomeusuario',"asc");
			$dados['usuario'] = $this->db->get('usuario')->result();
	

			$this->load->view('includes/html_header');
			$this->load->view('includes/menu');
			if($indice==1){
				$data['msg']="Cadastro concluído com Sucesso!!!!";
				$this->load->view('includes/msg_sucesso',$data);
			}else if($indice==2){
				$data['msg']="Houve um Erro ao Cadastrar!!!!";
				$this->load->view('includes/msg_erro',$data);
			}else
			if($indice==3){
				$data['msg']="Cadastro Excluído com Sucesso!!!!";
				$this->load->view('includes/msg_sucesso',$data);
			}else if($indice==4){
				$data['msg']="Houve um Erro ao Excluír!!!!";
				$this->load->view('includes/msg_erro',$data);
			}
			$this->load->view('inseminacao',$dados);
			$this->load->view('includes/html_footer');
	
		
	}	
	public function salvarEntrada($idestoque=null)
	{
		
		    $this->verificar_sessao();

			$data['identcliente'] = $this->input->post('idcliente');
			$data['identanimal'] = $this->input->post('animal');
			$data['identbotijao'] = $this->input->post('idbotijao');
			$data['canecaentrada'] = $this->input->post('caneca');
			$data['identestoque'] = $idestoque;
			$data['qtde'] = $this->input->post('qtd_entrada');
			$data['iduser'] = $this->buscar_id_user();
			$data['chave_auth_entrada'] = $this->buscar_chave_empresa();
			$data['dataentrada'] = date('Y-m-d');

			if($this->db->insert('entrada_semem',$data)){
			}
		}
	public function salvar_estoque()
	{
			$this->verificar_sessao();
			$id= $this->input->post('idbotijao');
			$data['idestbotijao'] = $this->input->post('idbotijao');
			$data['estcaneca'] = $this->input->post('caneca');
			$data['idestcliente'] = $this->input->post('idcliente');
			
			$data['qtde'] = $this->input->post('qtd_entrada');
			$data['idestanimal'] = $this->input->post('animal');
			$data['estcodigo'] = $this->input->post('codigo');
			$data['estobservacao'] = $this->input->post('observacao');
			$data['esttipo'] = $this->input->post('tipo');
			$data['iduser']=$this->buscar_id_user();
			$data['eststatus'] = "ABERTO";
			$data['chave_auth_estoque']=$this->buscar_chave_empresa();

			if($this->db->insert('estoque',$data)){
				$insert_id = $this->db->insert_id();
				$this->salvarEntrada($insert_id );
			
					redirect("botijao/estoque/1/$id");
			}else{
				   redirect("botijao/estoque/2/$id");
			}
		
	}
	         public function qualtipobotijao($id){
			$this->db->select("*");
			$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
			$this->db->where("idbotijao",$id);
			$dados=$this->db->get('botijao')->result();
			return $dados[0]->tipobotijao;
	}

		private function update_estoque($idestoque,$qtd,$acao){
			$qtdestoque=0;
			$qtde=0;
			$this->db->where("idestoque",$idestoque);
			$dados = $this->db->get("estoque")->result();
			foreach($dados as $row){
				$qtdestoque=$row->qtde;
			}
					
			
			if($acao==0){
				$qtde=$qtdestoque-$qtd;
			}else{
				$qtde=$qtdestoque+$qtd;
			}
			if($qtde==0){
				$data["eststatus"]="FECHADO";
			}
			$data["qtde"]=$qtde;
			$this->db->where("idestoque",$idestoque);
			$this->db->update("estoque",$data);
		}
		private function salvar_entrada($idestoque,$idreferencia,$qtd_digitada,$chave,$iduser){
			$espaco=0;
			$cpmx=0;
			$qtdreferencia=0;
			
			$this->db->like("chave_auth_estoque",$chave);
			$this->db->where("idestoque",$idestoque);
			$resultado = $this->db->get('estoque')->result();
			$this->db->like("chave_auth_estoque",$chave);
			$this->db->where("idestoque",$idreferencia);
			$referencia = $this->db->get('estoque')->result();
			$qtdreferencia=$referencia[0]->qtde;
			foreach($resultado as $row){
					//$qtddestino=$rd->qtde;
					$entrada["iduser"]=$iduser;
					$entrada["identbotijao"]=$row->idestbotijao;
					$entrada["canecaentrada"]=$row->estcaneca;
					$entrada["identanimal"]=$row->idestanimal;
					$entrada["identcliente"]=$row->idestcliente;
					$entrada["identestoque"]=$idestoque;
					$entrada["idestfornecedor"]=$idreferencia;
					$idbotijao=$row->idestbotijao;
					$idcaneca=$row->estcaneca;
					$cpmx=$row->capmaxcaneca;
			}
		
         if ($this->input->post("tipoentrada")){
					$entrada["tipoentrada"]=$this->input->post("tipoentrada");
					$entrada["dataentrada"]=$this->input->post('dataentrada');
		 }
         if ($this->input->post("tipo_saida")){
					$entrada["tipoentrada"]=$this->input->post("tipo_saida");
					$entrada["dataentrada"]=$this->input->post('datasaida');
		 }

		if($this->input->post("obsentrada")){
			$entrada["obsentrada"]=$this->input->post('obsentrada');
		}
		if($this->input->post("obssai")){
			$entrada["obsentrada"]=$this->input->post('obssai');
		}
			
			
			$espaco=$this->verificarEspacoCaneca($idbotijao,$idcaneca);
			if($qtd_digitada>$cpmx){
				$qtd_digitada=$cpmx;
			}
			if($qtd_digitada>$espaco){
				$qtd_digitada=$espaco;
			}

			$entrada["qtde"]=$qtd_digitada;
			$entrada["chave_auth_entrada"]=$chave;
			if($qtd_digitada>0){
			if($this->db->insert('entrada_semem',$entrada)){
				$this->update_estoque($idestoque,$qtd_digitada,1);
				return true;
			}else{
				return false;
			}
		}

		}
		

	public function salvar_estoque_saida(){
		$total=0;
		$chave=$this->buscar_chave_empresa();
		$iduser=$this->session->userdata('id');
		$idestoque=$this->input->post('idauxsai');
		$qtde=$this->input->post('qtd_sai');
		$botijao= $this->input->post('idauxsaibotijao');
		$data["tiposaida"]=$this->input->post('tipo_saida');
		$tiposaida=$this->input->post('tipo_saida');

		
		$data["datasaida"]=$this->input->post('datasaida');
		$data["obssaida"]=$this->input->post('obssai');
		$data["idsaidaestoque"]=$this->input->post('idauxsai');
		$data["iduser"]=$iduser;
		$data["idsaidabotijao"]=$botijao;
		$data["chave_auth_saida"]=$chave;

		$this->db->where('idestoque',$idestoque);
		$this->db->like("chave_auth_estoque",$chave);
		$dados = $this->db->get('estoque')->result();
		foreach($dados as $row){
			$estoqueanterior=$row->qtde;
			$idanimal=$row->idestanimal;
			$idcliente=$row->idestcliente;
		}
		if($tiposaida==2){
		    $total=$estoqueanterior-$qtde;
			$data["qtde"]=$this->input->post('qtd_sai');
			$data["idsaidaaplicador"]=$iduser;
			$data["dataconclusao"]=date('y-m-d');
			$est["qtde"]=$total;
			$this->db->where('idestoque',$idestoque);
			$this->db->like("chave_auth_estoque",$chave);
			$this->db->update('estoque',$est);
		}else{
			$data["qtde"]=$this->input->post('qtd_sai');
		}
		$data["estoqueanterior"]=$estoqueanterior;
		$data["idsaidacliente"]=$idcliente;
		$data["idsaidaanimal"]=$idanimal;
		if($this->db->insert('saida_semem',$data)){
                  redirect("botijao/estoque/1/$botijao");
		}else{
			redirect("botijao/estoque/2/$botijao");
		}
					

		 }

	public function excluir_cadastro($id=null){
		$this->verificar_sessao();
		$this->db->where('idbotijao',$id);
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		if($this->db->delete('botijao')){
			redirect('botijao/listar_cadastro/3');
	}else{
		   redirect('botijao/listar_cadastro/4');
	}
	}
	public function excluir_conclusao($id=null,$sts=null){
		$this->verificar_sessao();

		if($sts==2){
			$dados["saidastatus"]="MOVIMENTANDO";
		}else if($sts==1){
			$dados["saidastatus"]="AGUARDANDO";
		}

		if($sts==2){
			$this->db->like("chave_auth_saida",$this->buscar_chave_empresa());
			$this->db->where('idsaida',$id);
			$this->db->update("saida_semem",$dados);
			$this->db->like("chave_auth_conclusao",$this->buscar_chave_empresa());
			$this->db->where('idsaidaconclusao',$id);
			$this->db->delete('conclusao');
			redirect('botijao/inseminacao/3');
		}else if($sts==1){
			$this->db->like("chave_auth_saida",$this->buscar_chave_empresa());
			$this->db->where('idsaida',$id);			
			$this->db->delete("saida_semem");
			$this->db->like("chave_auth_conclusao",$this->buscar_chave_empresa());
			$this->db->where('idsaidaconclusao',$id);
			$this->db->delete('conclusao');
			redirect('botijao/inseminacao/3');	
		}
		  redirect('botijao/inseminacao/4');
	}
	public function atualizar_cadastro($id=null,$indice=null){
		$this->verificar_sessao();
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$this->db->where('idbotijao',$id);
		$data['botijao'] = $this->db->get('botijao')->result();

		$this->db->where('idbotijao',$id);
		$res=$this->db->get('botijao')->row();
		$idlcli=$res->idproprietario;

		$this->db->select("*");
		$this->db->like("chave_auth_cadastro",$this->buscar_chave_empresa());
		$this->db->order_by("nome");
		$data['cadastro'] = $this->db->get('cadastro')->result();

		$this->db->select("*");
		$this->db->like("chave_auth_propriedade",$this->buscar_chave_empresa());
		$this->db->where('idproprietario',$idlcli);
		$this->db->order_by("nomepropriedade");
		$data['propriedade'] = $this->db->get('propriedade')->result();


		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_botijao',$data);
		$this->load->view('includes/html_footer');

	}

	public function update_cadastro(){
		
		$this->verificar_sessao();
		$id = $this->input->post('id');		
			$data['idproprietario'] = $this->input->post('idcliente');
			$data['idbotpropriedade'] = $this->input->post('idpropriedade');
			$data['statusbotijao'] = $this->input->post('statusbotijao');
			$data['obsbotijao'] = $this->input->post('obsbotijao');

		
		$this->db->like("chave_auth_botijao",$this->buscar_chave_empresa());
		$this->db->where('idbotijao',$id);

		if($this->db->update('botijao',$data)){
				redirect('botijao/listar_cadastro/5');
		}else{
			   redirect('botijao/listar_cadastro/6');
		}	
	}
	public function montarcaneca(){
		$this->verificar_sessao();
		$id=$this->input->post("id");
		$this->db->select("*");
		$this->db->like("chave_auth_estoque",$this->buscar_chave_empresa());
		$this->db->where("idestoque",$id);
		$data = $this->db->get('estoque')->result();
			$json=json_encode($data);
			echo$json;

	}

}
