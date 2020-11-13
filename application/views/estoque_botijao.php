<?php
$cor[1]="#CDC8B1";
$cor[2]="#D3D3D3";
$cor[3]="#CDC8B1";
$cor[4]="#D3D3D3";
$cor[5]="#CDC8B1";
$cor[6]="#D3D3D3";
$cor[7]="#CDC8B1";
$cor[8]="#D3D3D3";
$cor[9]="#CDC8B1";
$cor[10]="#D3D3D3";


$corfonte[1]="#000000";
$corfonte[2]="black";
$corfonte[3]="#000000";
$corfonte[4]="#000000";
$corfonte[5]="#000000";
$corfonte[6]="#1C1C1C";
$corfonte[7]="#000000";
$corfonte[8]="#000000";
$corfonte[9]="#363636";
$corfonte[10]="#000000";


?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
              </div>
              <div class="btn-group mr-2">
                  
                  <a href="<?=base_url();?>botijao/esc_botijao_transf/0">
                  <button class="btn btn-sm btn-outline-secondary">Transferência</button>
                  </a>
                </div>
                <div class="btn-group mr-2">
                                <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                <button class="btn btn-sm btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="repeat"></span>
                Lançamentos
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item"  href="<?=base_url();?>entrada/listar_cadastro">
                                  Entrada</a>
                                  <a class="dropdown-item"  href="<?=base_url();?>saida/listar_cadastro">
                                  
                                  Saída</a>

                                </div>
            </div>
              <div class="btn-group mr-2">
                <a target="_blank" href="<?=base_url();?>imprimirbotijao/listar_canecas/<?=$botijao[0]->idbotijao;?>">
              
                <button class="btn btn-sm btn-outline-secondary">Imprimir PDF</button>
                </a>
              </div>
    
   
            </div>
          </div>
          <div>
          <h3 class="h4 text-danger">Estoque de Sêmem Bovino</h3>
            <table class="table border" >
              <tr >
              <td class="">Proprietário:<p class="font-weight-bold"> <?=$botijao[0]->nome;?></p></td>
              <td class="" >Botijão: <h1 class="font-weight-bold"><?=$botijao[0]->nomebotijao;?></h1></td>
              <td></td>
              <td></td>
              </tr>
              <tr >
              <td class="">propriedade: <?=$botijao[0]->nomepropriedade;?></td>
              <td class="">Municipio: <?=$botijao[0]->municipiopropriedade;?> - <?=$botijao[0]->ufpropriedade;?></td>
              <td></td>
              <td></td>
             <!-- <td colspan="2">Capacidade Nitrogenio: <?=$botijao[0]->capacidade;?> </td>-->
             
            
              </tr>
            <!--  <tr style="background: #E0FFFF">
              <td>Cap. Paletas Finas: <?=$botijao[0]->cappaletafina;?></td>
              <td>Cap. Paleta Média: <?=$botijao[0]->cappaletamedia;?> </td>
              <td> Qtde Canecas: <?= $qtd_canecas=$botijao[0]->qtdecanecas;?>   </td>
              <td> Capacidade das Canecas: <?=$botijao[0]->capcanecas;?>   </td>
              </tr>-->
            </table>
          </div>
          <div>
<!-- Button trigger modal -->
<?php

?>
<div style="padding:10px;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Nova Armazenagem
</button>
</div> 

<input type="hidden" name="idaux" id="idaux" value="0">
<!-- Modal -->
<!-- JANELA PARA INSERIR DO ZERO NA CANECA-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Armazenagem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?=base_url()?>botijao/salvar_estoque">
        <div class="form-row">
          <input type="hidden" name="idbotijao" id="idbotijao" value="<?=$botijao[0]->idbotijao;?>">
         
            <div class="form-group col-md-2">
              <label for="input">Caneca</label>
              <select class="form-control" id="caneca" name="caneca" required>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              </select>
            </div>

            <div class="form-group col-md-10">
              <label for="input">Cliente </label>
              <select id="idcliente" name="idcliente" class="form-control"   required>
                    <option value=""></option>
                    <?php
                    if (sizeof($cadastro)>0){
                    foreach($cadastro as $cad) {
                    ?>
                    <option value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
                    <?php
                    }
                  }
                    ?>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="input">Touro</label>
              <select id="animal" name="animal" class="form-control"   required>
                    <option value=""></option>
                    <?php
                    if (sizeof($animal)>0){
                    foreach($animal as $cad) {
                    ?>
                    <option value="<?=$cad->idanimal;?>"><?=$cad->nomeanimal;?></option>
                    <?php
                    }
                  }
                    ?>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="input">Código</label>
              <input type="number" class="form-control" id="codigo" name="codigo" required>
            </div>
            <!-- <div class="form-group col-md-6">
              <label for="input">Tipo de Paleta</label>
              <select class="form-control" name="tipopaleta" id="tipopaleta" required>
                    <option value="F">Fina</option>
                    <option value="M">Média</option>
              </select>
           
            </div> -->
            <div class="form-group col-md-6">
              <label for="input">Tipo</label>
              <select class="form-control" id="tipo" name="tipo" required>
                <option value="CV">CV</option>
                <option value="SXF">SXF</option>
                <option value="SXM">SXM</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="input">Quantidade</label>
                  <input class="form-control" type="number" name="qtd_entrada" id="qtd_entrada" required>
            </div>
            <div class="form-group col-md-12">
              <label for="input">Observações</label>
              <input type="text" class="form-control" id="observacao" name="observacao">
            </div>
            </div>
       
      </div>
      <div class="modal-footer">
      <button  type="submit" class="btn btn-primary" >Salvar</button>
        <button  type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- JANELA PARA INSERIR DENTRO DA CANECA-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  ><span class="text-success">Adicionar na Caneca<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>botijao/salvar_estoque_entrada">
      <div class="modal-body">
        
        <input type="hidden" id="idauxestoque" name="idauxestoque" value="0">
        <input type="hidden" id="idauxbotijao" name="idauxbotijao" value="0">
        <input type="hidden" id="idauxcaneca" name="idauxcaneca" value="0">
        <input type="hidden" id="idauxanimal" name="idauxanimal" value="0">
        <input type="hidden" id="estanterior" name="estanterior" value="0">
        <div class="form-row">
        <div class="form-row border border-secondary rounded p-1 mb-2 text-black" >
          <div class="h6 text-center font-weight-bold text-success  ">DADOS DA CANECA</div>
            <div class="col-md-12">Caneca:
              <label id='canecaestoque' class="font-weight-bold"><b>1</b></label>
            </div>
            <div class="col-md-12">Cliente:
              <label id="nome" class="font-weight-bold">#</label>
   
            </div>
            <div class="col-md-5">Touro:
                    <label id="animalestoque" class="font-weight-bold">#</label>
            </div>
            <div class="col-md-5">Código:
                    <label id="codigoestoque" class="font-weight-bold">#</label>
            </div>
            <div class="form-group col-md-2">Tipo
              <label id="tipoestoque" class="font-weight-bold">#</label>
            </div>
            <div class="form-group col-md-6">Qtde Armazenada
              <label id="qtdearmazenada" class="font-weight-bold">#</label>
            </div>
            <div class="form-group col-md-6">Espaço
              <label id="espaco" class="font-weight-bold">#</label>
            </div>
    </div>
            <!-- <div class="col-md-12">
              <label for="input">Fornecedor </label>
              <select id="idforadd" name="idforadd" class="form-control"   required>
                    <option value=""></option>
                    <?php
                    if (sizeof($cadastro)>0){
                    foreach($cadastro as $cad) {
                    ?>
                    <option value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
                    <?php
                    }
                  }
                    ?>
              </select>
            </div> -->
            <div class="col-md-12">
              <label>Tipo de Movimentação</label>
              <select class="form-control" id="tipoentrada" name="tipoentrada" required>
                <option value="">Escolha o Tipo</option>
                <option value=1>Compra</option>
                <option value=2>Doação</option>
                <option value=3>Empréstimo</option>
                <option value=4>Estoque Inicial</option>
                <option value=5>Transferência</option>
                <!-- <option style="background-color:#FFA500;color:white;" disabled value=6>Venda</option>
                <option style="background-color:#FFA500;color:white;" disabled value=7>Descarte</option> -->
                
                
              </select>
            </div>
            <div class="col-md-12" id="div_entrada" style="display:none">
              <h6 class="text-center text-danger">Botijões Para Fornecimento</h6>
              <select id="montarbotijoes" class="form-control" >

              </select>              
            </div>

            <div class="col-md-12" id="div_caneca">
            <h6 class="text-center text-danger">Canecas</h6>
              <table id="montarcanecas" class="table table-striped ">
              <thead>
                        <tr>
                          <th scope="col">Caneca</th>
                          <th scope="col">Touro</th>
                          <th scope="col">Qtde</th>
                          <th scope="col">Tipo</th>
                          <th scope="col">Nome</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
              </table>

                          
            </div>

            <div class="form-group col-md-6">
              <label for="input">Qtde</label>
              <input type="number" class="form-control" id="qtdadd" name="qtdadd" max=200 required>
            </div>


             <div class="form-group col-md-12">
              <label for="input">Data da Entrada</label>
              <?php $data=date("Y-m-d");?>
              <input type="date" class="form-control" id="dataentrada" name="dataentrada" value="<?=$data?>" required>
            </div>
            
             <div class="form-group col-md-12">
              <label for="input">Observações</label>
              <input type="text" class="form-control" id="obsadd" name="obsadd">
            </div>
            </div>
       
      </div>
      <div class="modal-footer">
      <button type="submit" id="btn_salvar_entrada" class="btn btn-primary" disabled >Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!-- fim do modal -->


<!-- JANELA PARA SAIDAS-->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  ><span class="text-danger">Saída<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>botijao/salvar_estoque_saida">
      <div class="modal-body">
        
        <input type="hidden" id="idauxsai" name="idauxsai" value="0">
        <input type="hidden" id="idauxsaibotijao" name="idauxsaibotijao" value="0">
        <input type="hidden" id="estanteriorsai" name="estanteriorsai" value="0">
        <div class="form-row">
        <div class=" form-row border border-danger rounded text-dark" style="padding:5px;">
        <div class="col-md-12">
          <div class="h6 text-center font-weight-bold">DADOS DA CANECA</div>
        </div>
            <div class="col-md-6">Botijão:
              <label id='botijaoestoquesai' class="font-weight-bold"><b>1</b></label>
            </div>
            <div class="col-md-6">Caneca:
              <label id='canecaestoquesai' class="font-weight-bold"><b>1</b></label>
            </div>
            <div class="col-md-12">Cliente:
              <label id="nomesai" class="font-weight-bold">#</label>
   
            </div>
            <div class="col-md-4">Touro:
                    <label id="animalestoquesai" class="font-weight-bold">#</label>
            </div>
            <div class="col-md-4">Código:
                    <label id="codigoestoquesai" class="font-weight-bold">#</label>
            </div>
            <div class="col-md-4">Tipo
              <label id="tipoestoquesai" class="font-weight-bold">#</label>
            </div>
            <div class="col-md-12">Qtd
              <label id="qtdsai" class="font-weight-bold">#</label>
            </div>
        </div>
        <div class="form-group col-md-12">
        <label for="input">Tipo de Saída </label>
        <select name="tipo_saida" id="tipo_saida" class="form-control" required>
              <option value="">Escolha o Tipo</option>
                <option value="1">Aplicado pela empresa</option>
                <option value="2">Retirado pelo cliente</option>
        </select>
        </div>
            <div class="form-group col-md-4">
              <label for="input">Qtde</label>
              <input type="number" class="form-control" id="qtd_sai" name="qtd_sai" required>
            </div>
            <div class="form-group col-md-6">
              <label for="input">Data da Saída</label>
              <?php $data=date("Y-m-d");?>
              <input type="date" class="form-control" id="datasaida" name="datasaida" value="<?=$data?>" required>
            </div>

            <div class="form-group col-md-12">
              <label for="input">Observações</label>
              <input type="text" class="form-control" id="obssai" name="obssai">
            </div>
            </div>
       
      </div>
      <div class="modal-footer">
      <button type="submit" id="btn-salvar_saida" class="btn btn-primary" >Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!-- fim do modal -->


<!-- JANELA PARA MOSTRAR AS MOVIMENTAÇÕES -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  ><span class="text-danger">MOVIMENTAÇÕES<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="cabecalho" >

        </div>
                  <br>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Entradas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Saídas</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Fazendas</a>
            </li> -->
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="container">
        <table class="table table-default" id="tabmov">
                        <thead>
                          <tr>
                            <th>Qtde</th>
                            <th>Data</th>
                            <th>Fonte</th>
                            <th>Observações</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
 
                        </tfoot>
                      </table>
        </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="container">
        <table class="table" id="tabmovsaida">
                        <thead>
                          <tr>
                            <th>Tipo</th>
                            <th>Qtde</th>
                            <th>Data</th>
                            <th>Estoque Recebedor</th>
                            <th>Observações</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
 
                        </tfoot>
                      </table>
        </div>

        </div>
        <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="container">
          <div id="div_fazenda" class="row">

          </div>
        </div>
        
        </div> -->
      </div>
          <div>
            <!-- <div class="h5">Finalizar</div>
            <table class="table" id="tabconclusao">
                        <thead class="thead-dark">
                          <tr>
                            <th>Tipo</th>
                            <th>Qtde</th>
                            <th>Saída</th>
                            <th>Retorno</th>
                            <th>Estoque</th>
                            <th>Cliente</th>
                            <th>Propriedade</th>
                            <th>Aplicador</th>
                            <th>Observações</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
 
                        </tfoot>
                      </table> -->
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div >
<table class="table table-striped">
  <thead>
    <tr>
    
      <th scope="col" class="text-center">CANECA</th>
      <th scope="col">TOURO</th>
      <th scope="col" class="text-center">RAÇA</th>
      <th scope="col" class="text-center">Qtde</th>
      <th scope="col" class="text-center">CÓDIGO</th>
      <th scope="col" class="text-center">TIPO</th>
      <th scope="col" class="text-center">PROPRIETÁRIO</th>
      <!--<th scope="col" class="text-center">STATUS</th>-->
      <th scope="col" class="text-center">AÇÕES</th>

    </tr>
  </thead>
  <tbody>
  
  <?php  
  $total_estoque=0;
  $idestoqueaux=0;
  $idestbotijaoaux=0;
 
  if(sizeof($estoque)>0){
 
  foreach($estoque as $cad) {

  
    ?>

    <tr style="color:<?=$corfonte[$cad->estcaneca]?>;background:<?=$cor[$cad->estcaneca];?>">
    
     
      <td class="text-center"><?=$cad->estcaneca;?></td>
      <td><?=$cad->nomeanimal;?></td>
      <td class="text-center"><?=$cad->raca;?></td>
      <td class="text-center"><?=$cad->qtde;?></td>
      <td class="text-center"><?=$cad->estcodigo;?></td>
      <td class="text-center"><?=$cad->esttipo;?></td>
      <td><?=$cad->nome;?>
      <?php foreach($movimentacao as $mov){
        if($mov->idorigem==$cad->idestoque and $mov->tipo==3 and $mov->datadevolucao=='0000-00-00'){
          echo "<a href='#'>
          <span class='badge badge-danger'>$mov->qtdtransferida</span>
          </a>";
        }
         if($mov->iddestino==$cad->idestoque and $mov->tipo==3 ){
          echo "<a href='#'>
          <span class='badge badge-primary'>$mov->qtdtransferida</span>
          </a>";
        }
      }?>

    </td>
      <!--<td><?=$cad->eststatus;?></td>-->
 
      <td>
      <button type="button" class="btn btn-default btn-sm" onclick="movimentacao(<?=$cad->idestoque;?>,<?=$cad->qtde;?>)">
      <a href="#"  data-toggle="modal" data-target="#exampleModal2">
      <span data-feather="list" class="text-danger "></span>
      <!--<img src="<?=base_url()?>/assets/icons/icons/List-ol.svg" alt="" width="24" height="24" title="Bootstrap">-->
      </a>
      </button>
      <!--<button type="button" class="btn btn-default btn-sm" onclick="addestoque(<?=$cad->idestoque;?>,<?=$cad->estcaneca;?>)">
      <span data-feather="plus" class="text-danger "></span>
      <a href="#" ><ion-icon name="add-circle-outline" size="small"></ion-icon></a>
      </button>-->
      <button type="button" class="btn btn-default btn-sm" onclick="sairestoque(<?=$cad->idestoque;?>)">
      <span data-feather="minus" class="text-danger "></span>
      <!--<a href="#" ><ion-icon name="remove-circle-outline"size="small"></ion-icon></a>-->
      </button>
      <!-- <button type="button" class="btn btn-info btn-sm" onclick="transferencia(<?=$cad->idestoque;?>)">
      <a href="" data-toggle="modal" data-target="#exampleModal4"><ion-icon name="swap-horizontal-outline" size="small"></ion-icon></a>
      </button> -->
      <!-- <button type="button" class="btn btn-warning btn-sm">
      <a href="<?=base_url('botijao/emprestar_estoque/'.$cad->idestoque)?>"><ion-icon name="cash-outline" size="small"></ion-icon></a>
      </button>   -->
    </td>
    </tr>
    </tbody>
  <?php
$nomebotijao=$botijao[0]->nomebotijao;
    }

}else{
  echo"<tr> <td class=''>Sem dados!</td> </tr>";

}



?>

</table>
<input type="hidden" id="idestbotijaoaux" name="idestbotijaoaux" value="<?=$idestbotijaoaux;?>">
<input type="hidden" id="idanimalaux" name="idanimalaux" value="">

<input type="hidden" id="totaldosescaneca" name="totaldosescaneca" value="">
</div>

</main>
<script type="text/javascript">

$(document).ready(function(){
  $("#div_caneca").css("display","none");
  $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        dataType:'HTML',
        success: function(data){

          $("#montarbotijoes").html(data);
         
        },error:function(data){
            alert(data);
        },
      });
      
  $("#div_canecaSaida").css("display","none");
  $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        dataType:'HTML',
        success: function(data){

          $("#montarbotijoesSaida").html(data);
         
        },error:function(data){
            alert(data);
        },
      });

      $("#montarbotijoes").change(function(){
        $("#div_caneca").css("display","none");
    var valor, idanimal;
    valor = $("#montarbotijoes option:selected").val();
    idanimal = $("#idauxanimal").val();
     
      $.ajax({
        url:'<?= base_url();?>botijao/montarcanecas',
        type:'POST',
        data: {id:valor,idanimal:idanimal},
        success: function(data){
        if(data!=""){
          $("#div_caneca").css("display","block");
        
           $("#montarcanecas tbody").html(data);
           $("#botao-reiniciar").attr("disabled", false);
           habilitarBtnSalvar();
        }else{
          alert("Canecas vazias, ou não foi encontada caneca correspondente!");
          $("#btn_salvar_entrada").attr("disabled", true);
          
        }
        
        },error:function(data){
            alert(data);
        },
      });
  });     

      $("#montarbotijoesSaida").change(function(){
        $("#div_canecaSaida").css("display","none");
    var valor, idanimal;
    valor = $("#montarbotijoesSaida option:selected").val();
    idanimal = $("#idanimalaux").val();

      $.ajax({
        url:'<?= base_url();?>botijao/montarcanecassaida',
        type:'POST',
        data: {id:valor,idanimal:idanimal},
        success: function(data){
        if(data!=""){
          $("#div_canecaSaida").css("display","block");
        
           $("#montarcanecasSaida tbody").html(data);
           habilitarBtnSalvarSaida();          
          
        }else{
          alert("Canecas vazias, ou não foi encontrada caneca correspondente!");
          $("#btn_salvar_saida").attr("disabled", true);
        }
        },error:function(data){
            alert(data);
        },
      });
  });     
  addestoque=function(valor,caneca){
    $('#div_caneca').css('display','none');
    $('#div_caneca tbody').html('');
    $('#div_entrada').css('display','none');
    $("#montarbotijoes").val($("#montarbotijoes option:first").val());
    $("#tipoentrada").val($("#tipoentrada option:first").val());
    
  qt=0;
  idestbotijao = $("#idestbotijaoaux").val();
  var cpxmaxcaneca =0;
  var num_caneca=caneca;
  var totaldosescaneca=0;
  var calc_caneca=0;
  if(num_caneca>0){
      $.ajax({
        url:'<?= base_url();?>botijao/verificar_espaco_caneca',
        type:'POST',
        datatype: 'JSON',
        data: {idestbotijao:idestbotijao,num_caneca:num_caneca},
        success: function(data){
          
          var dados=data;
     
          var linha=dados.length;
       
          if(linha>0){
         
           for (var i = 0;linha>i ; i++) {
           
                  qt=qt+parseInt(dados[i].qtde);
                  idanimal=dados[i].idestanimal;
                  $("#idauxanimal").val(dados[i].idestanimal);
                  cpxmaxcaneca=dados[i].capmaxcaneca;
               
                   }
                   calc_caneca=cpxmaxcaneca-qt;
                   
                  if(cpxmaxcaneca>qt){
                    alert("A caneca: "+num_caneca+" tem capacidade máxima de "+cpxmaxcaneca +" dose(s), no momento tem espaço para  "+calc_caneca +" dose(s)");
                       
                        $("#exampleModal1").modal("show");
                        $("#btn_salvar_entrada").attr("disabled", true);
                        $("#qtdadd").val(calc_caneca);
                        $("#espaco").html(calc_caneca);
                
                   $.ajax({
                          url:'<?= base_url();?>botijao/estoquecabecalhoJson',
                          type:'POST',
                          data: {id:valor},
                          dataType:'json',
                          success: function(data){
                            
                            $("#canecaestoque").html(data[0].estcaneca);
                            $("#nome").html(data[0].nome);
                            $("#animalestoque").html(data[0].nomeanimal);
                            $("#codigoestoque").html(data[0].estcodigo);
                            $("#tipoestoque").html(data[0].esttipo);
                            $("#estanterior").val(data[0].qtde);
                            $("#idauxestoque").val(data[0].idestoque);
                            $("#idauxbotijao").val(data[0].idestbotijao);
                            $("#idauxanimal").val(data[0].idestanimal);
                            $("#idauxcaneca").val(data[0].estcaneca);
                            $("#qtdearmazenada").html(data[0].qtde);
                            
                          
                          },error:function(data){
                              alert(data);
                          },
                        });
                  }else{
                    alert("A caneca: "+num_caneca+" tem capacidade máxima de "+cpxmaxcaneca +" dose(s), no momento tem espaço para  "+calc_caneca +" dose(s)");
                  }
                
                  
         }
         
        },error:function(data){
            alert("erro: "+data);
        },
      });
 
    
  }
  }
  $( "#qtdadd" ).keyup(function() {
 // valor = $("#slc_botijao option:selected").val();
 var tipoentrada = $("#tipoentrada option:selected").val();
 var input_qtdadd=$("#qtdadd").val();
 var quatidade=0;
 var espaco=$("#espaco").html();
 
 
 var qtde=0; 
 if ( $( "#optestoque" ).length ) { 
    /* elemento existe */ 
    var id = $('input[name="optestoque"]').val();
    

 $.ajax({
                          url:'<?= base_url();?>botijao/retornar_quantidade_estoque',
                          type:'POST',
                          data: {id:id},
                          dataType:'json',
                          success: function(data){
                            quatidade=parseInt(data[0].qtde);
                           input_qtdadd=parseInt(input_qtdadd);     
                                  if(quatidade<input_qtdadd){
                                  alert("O valor fornecido: "+input_qtdadd+" dose(s) está acima da quantidade do estoque de origem. Substituiremos pelo máximo aceitável "+espaco+" dose(s), quantidade disponível para armazenagem, nesta caneca ");
                                 $( "#dataentrada" ).focus();
                                 $("#qtdadd").val(espaco);
                                }
                               
                          
                          },error:function(data){
                              alert(data[0].qtde);
                          },
                        });
 
 };
 
  });
 



  function habilitarSelectTipoSaida(){
    $("#tipo_saida").prop('disabled', false);
  }

  function desabilitarSelectTipoSaida(){
    $("#tipo_saida").prop('disabled', 'disabled');
    $("#tipo_saida option[value=0]").prop('selected', true);
  }
  sairestoque=function(valor){
    habilitarSelectTipoSaida();
    $("#qtd_sai").prop('disabled',false);
    
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalhoJson',
        type:'POST',
        data: {id:valor},
        dataType:'json',
        success: function(data){
        
          $("#botijaoestoquesai").html(data[0].idestbotijao);
          $("#canecaestoquesai").html(data[0].estcaneca);
          $("#nomesai").html(data[0].nome);
          $("#animalestoquesai").html(data[0].nomeanimal);
          $("#codigoestoquesai").html(data[0].estcodigo);
          $("#tipoestoquesai").html(data[0].esttipo);
          $("#estanteriorsai").val(data[0].qtde);
          $("#idanimalaux").val(data[0].idestanimal);
          $("#idauxsai").val(data[0].idestoque);
          $("#idauxsaibotijao").val(data[0].idestbotijao);
          $("#qtdsai").html(data[0].qtde);
          var qtd=data[0].qtde;
 
            $("#qtd_sai").val(qtd);
            $("#exampleModal3").modal("show");
            


        },error:function(data){
            alert(data);
        },
      });
  }
  transferencia=function(valor){
    
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalhoJson',
        type:'POST',
        data: {id:valor},
        dataType:'json',
        success: function(data){
          
          $("#canecaestoquetra").html(data[0].estcaneca);
          $("#nometra").html(data[0].nome);
          $("#animalestoquetra").html(data[0].nomeanimal);
          $("#codigoestoquetra").html(data[0].estcodigo);
          $("#tipoestoquetra").html(data[0].esttipo);
          $("#estanteriortra").val(data[0].qtde);
          $("#idauxtra").val(data[0].idestoque);
         
        },error:function(data){
            alert(data);
        },
      });
      $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        success: function(data){
        
           $("#slc_botijao").html(data);
        },error:function(data){
            alert(data);
        },
      });
  }
  movimentacao=function(valor,qtde){
    //montar o cabeçalho com as informações da caneca
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalho',
        type:'POST',
        data: {id:valor},
        dataType: 'html',
        success: function(data){
          
           $("#cabecalho").html(data);
        },error:function(data){
            alert(data);
        },
      });
    

    // vai montar a visualização das entradas 
    $("#tabmov tbody").html("");
      $.ajax({
        url:'<?= base_url();?>botijao/movimentacao',
        type:'POST',
        data: {id:valor},
        success: function(data){
          if(data==""){
            $("#tabmov tbody").html("<tr><td colspan=5>Sem dados!</td></tr>");
          }else{
           $("#tabmov").html(data);
          }
          $("#qtdetotal").html("Total no Estoque: "+qtde);
          //  $("#tabmov tfoot").html("<tr class=text-success><td colspan=7><b>Estoque Atual:<span class=text-danger>"+qtde+"</span></b></td></tr>");
        },error:function(data){
            alert(data);
        },
      });

    // vai montar a visualização das saídas 
    $("#tabmovsaida tbody").html("");
      $.ajax({
        url:'<?= base_url();?>botijao/movimentacaosaida',
        type:'POST',
        data: {id:valor},
        success: function(data){
          if(data==""){
            $("#tabmovsaida ").html("<tr><td colspan=5>Sem dados!</td></tr>");
          }else{
           $("#tabmovsaida").html(data);
          }
          $("#qtdetotalsaida").html("Total no Estoque: "+qtde);
          // $("#tabmovsaida tfoot").html("<tr class=text-success><td colspan=7><b>Estoque Atual:<span class=text-danger>"+qtde+"</span></b></td></tr>");
        },error:function(data){
            alert(data);
        },
      
      });
  }




    
  $("#slc_botijao").change(function(){
    var valor;
    valor = $("#slc_botijao option:selected").val();
     
      $.ajax({
        url:'<?= base_url();?>botijao/montarcanecas',
        type:'POST',
        data: {id:valor},
        success: function(data){

           $("#tbl_canecas").html(data);
        },error:function(data){
            alert(data);
        },
      });
  });

function verificar_espaco_caneca(caneca){
  qt=0;
  
  idestbotijao = $("#idestbotijaoaux").val();
  var cpxmaxcaneca =0;
  var num_caneca=caneca;
  if(num_caneca>0){
      $.ajax({
        url:'<?= base_url();?>botijao/verificar_espaco_caneca',
        type:'POST',
        datatype: 'JSON',
        data: {idestbotijao:idestbotijao,num_caneca:num_caneca},
        success: function(data){
          
          var dados=data;
     
          var linha=dados.length;
       
          if(linha>0){
         
           for (var i = 0;linha>i ; i++) {
           
                  qt=qt+parseInt(dados[i].qtde);
                  idanimal=dados[i].idestanimal;
                  cpxmaxcaneca=dados[i].capmaxcaneca;
               
                   }
                 
                 //  alert("quantidade: "+qt+" capacide maxima: "+cpxmaxcaneca);
               
                   if(cpxmaxcaneca==qt){
                    $("#totaldosescaneca").val(qt);
                  }else
                  if(cpxmaxcaneca>qt){
                    calc_caneca=cpxmaxcaneca-qt;
                    $("#totaldosescaneca").val(qt);
                     
                  } 
          }
         
        },error:function(data){
            alert("erro: "+data);
        },
      });
     }
}


  $("#idforadd").change(function(){
    var valor;
    valor = $("#idforadd option:selected").val();
    
      $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoesFornecedor',
        type:'POST',
        data: {id:valor},
        datatype:"HTML",
        success: function(data){
           $("#tbl_botijoes").html(data);
     
        },error:function(data){
            alert(data);
        },
      });


  });
  function habilitarBtnSalvar(){
    $('#btn_salvar_entrada').attr("disabled", false);
  }
  function habilitarBtnSalvarSaida(){
    $('#btn-salvar_saida').attr("disabled", false);
  }

  function desabilitarBtnSalvar(){
    $('#btn_salvar_entrada').attr("disabled", true);
  }
  function desabilitarBtnSalvarSaida(){
    $('#btn-salvar_saida').attr("disabled", true);
  }
 $("#tipoentrada").change(function(){
  $('#div_entrada').css('display', 'none');
  $('#div_caneca tbody').html('');
  $('#div_caneca').css('display','none');

   var tipo=$("#tipoentrada option:selected").val();
   if(tipo==4){
     habilitarBtnSalvar();
   
    $('#div_entrada').css('display', 'none');
   }else{
    desabilitarBtnSalvar();
    $('#div_entrada').css('display','block');
   }
 });
  montarbotijao=function(){
    $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        data: {id:valor},
        success: function(data){
          alert(data);
           $("#slc_botijao").html(data);
        },error:function(data){
            alert(data);
        },
      });
  }

  });
      





</script>