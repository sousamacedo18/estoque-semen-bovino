<?php
 function formatardata($data){
		return date("d/m/Y", strtotime($data));
		}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h4 text-danger">IATFs - Aguardando Conclusão</h3>
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <!-- <a  href="<?=base_url();?>animal/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Cadastro
                </button>
                </a> -->
     
                <a  href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" >
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
   
            </div>
          </div>
<div>
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Botijão</th>
      <th scope="col">Caneca</th>
      <th scope="col">Cliente</th>
      <th scope="col">Qtde</th>
      <th scope="col">Data</th>
      <th scope="col">Status</th>
      <th scope="col" >Ação</th>

    </tr>
  </thead>
  <tbody>
  <?php
  if (sizeof($saida)>0){
    foreach($saida as $cad) {
      
      ?>
    <tr>
      <th scope="row"><?=$cad->idsaida;?></th>
      <td class="text-center"><?=$cad->idsaidabotijao;?></td>
      <td class="text-center"><?=$cad->canecasaida;?></td>
      <td><?=$cad->nome;?></td>
      <td><?=$cad->qtde;?></td>
      <td><?=formatardata($cad->datasaida);?></td>
      <td><?=$cad->saidastatus;?></td>
      <td>
      <?php $status=$cad->saidastatus;?>
      <?php if ($status=="AGUARDANDO"){ $sts=2;?>
      <a href="#"
       onclick="concluir(<?=$cad->idsaidaestoque;?>,<?=$cad->idsaida;?>);">
      <span data-feather="thumbs-up" class="text-success"></span>
      </a>
    <?PHP }else{ $sts=1?>
      <a href="#"
      onclick="visualizarConclusao(<?=$cad->idsaida;?>);">
      
      <span data-feather="list" class="text-danger"></span>
      

      </a>
    <?php }?>    
 

      <a href="<?=base_url('botijao/atualizar_conclusao/'.$cad->idsaida)?>" >
        <span data-feather="edit" class="text-primary btn_acao "></span>
      </a>
   
      <a href="<?=base_url('botijao/excluir_conclusao/'.$cad->idsaida.'/'.$sts)?>"   onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger btn_acao"></span>
      </a>
      </td>
    </tr>

  <?php 
  }
  }else{
    echo"<td colspan='5'>Total</td>";
  }

?>
  </tbody>

</table>
<div class="h6">Total de cadastro: <?php echo sizeof($saida)?></div>

</div>
<!-- JANELA PARA INSERIR DENTRO DA CANECA-->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  ><span class="text-success">Conclusão<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?=base_url()?>botijao/salvar_conclusao">
      
      <input type="hidden" name="idauxestoque" id="idauxestoque" value="0">
      <input type="hidden" name="idauxsaida" id="idauxsaida" value="0">
      <input type="hidden" name="idauxbotijao" id="idauxbotijao" value="0">
      <input type="hidden" name="idauxcliente" id="idauxcliente" value="0">
      <div class="modal-body">
        <input type="hidden" name="cliente" id="cliente" value="0">

        <div class="form-row">
        <div class="form-row border border-secondary rounded p-1 mb-2 text-black" >
          <div class="col-md-12 h6 text-center font-weight-bold text-success  ">DADOS DA CANECA</div>
            <div class="col-md-6">Botijão:
              <label id='botijaoestoque' class="font-weight-bold"><b>1</b></label>
            </div>
            <div class="col-md-6">Caneca:
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
    </div>

            <div class="col-md-12">
              <label>Propriedade</label>
              <select onclick="montar_propriedade();" class="form-control" id="propriedade" name="propriedade" required>
              


              </select>
            </div>
            <div class="col-md-12">
              <label>Inseminador</label>
              <select class="form-control" id="inseminador" name="inseminador" required>
                <option value=""></option>
                <?php
                foreach($usuario as $row){
                ?>
                <option value=<?=$row->idusuario;?>><?=$row->nomeusuario?></option>
                <?php
                }
                ?>

              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="input">Descarte</label>
              <input type="number" class="form-control" id="descarte" name="descarte" value="0" max=200 required>
            </div>
            <div class="form-group col-md-6">
              <label for="input">KM</label>
              <input type="number" class="form-control" id="km" name="km" value="0" required>
            </div>

             <div class="form-group col-md-6">
              <label for="input">Data da Conclusão</label>
              <?php $data=date("Y-m-d");?>
              <input type="date" class="form-control" id="data" value="<?php echo$data;?>" name="data" required>
            </div>
            
             <div class="form-group col-md-12">
              <label for="input">Observações</label>
              <input type="text" class="form-control" id="obs" name="obs">
            </div>
            </div>
       
      </div>
      <div class="modal-footer">
      <button type="submit" id="btn_salvar_conclusao" class="btn btn-primary" >Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
      </form>
    </div>
  </div>
</div>
<!-- fim do modal -->
<!--janela conclusao-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  ><span class="text-success">Conclusão<span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="div_conclusao"></div>
      </div>
      <div class="modal-footer">
      <!-- <button type="submit" id="btn_salvar_conclusao" class="btn btn-primary" >Salvar</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
       
      </div>
      </div>
    </div>
  </div>
<style>
  .btn_acao{
  margin-left: 15px;
  }
</style>
<script>
$(document).ready( function () {

  montar_propriedade=function(){

    var html=$('#propriedade option:selected').text() 
    var idcliente=$("#cliente").val();
    if(html==""){
    $.ajax({
                          url:'<?= base_url();?>propriedade/montar_propriedade',
                          type:'POST',
                          data: {id:idcliente},
                          dataType:'html',
                          success: function(data){
                              $("#propriedade").html(data);
                          }
                        });
  }
  }
  concluir=function(id,idsaida){
    
    $.ajax({
                          url:'<?= base_url();?>botijao/estoquecabecalhoJson',
                          type:'POST',
                          data: {id:id},
                          dataType:'json',
                          success: function(data){
                            
                            $("#botijaoestoque").html(data[0].idestbotijao);
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
                            $("#cliente").val(data[0].idestcliente);
                            $("#idauxcliente").val(data[0].idestcliente);
                            $("#idauxsaida").val(idsaida);
                            
                          
                          },error:function(data){
                              alert(data);
                          },
                        });

  $("#exampleModal1").modal("show");
  }
  visualizarConclusao=function(idsaida){
    
    $.ajax({
                          url:'<?= base_url();?>botijao/conclusao',
                          type:'POST',
                          data: {id:idsaida},
                          dataType:'html',
                          success: function(data){
                            $("#div_conclusao").html(data);
                          
                          },error:function(data){
                              alert(data);
                          },
                        });

  $("#exampleModal2").modal("show");
  }

$('#myTable').DataTable( {

      "pageLength": 25,
      rowReorder: true,
        "language": {
            "lengthMenu": "Mostrar _MENU_ cadastro por página",
            "zeroRecords": "Nenhum Resultado- Desculpe!",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(filtrado de _MAX_ total dados)",
            "search":"Pesquisar",
            "paginate": {
                          "previous": "Anterior",
                          "next": "Próxima"
                        }
                        
        }
        
    } );
});
</script>