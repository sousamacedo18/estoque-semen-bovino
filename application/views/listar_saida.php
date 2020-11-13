
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
          
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
              </div>
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/esc_botijao_transf/0">
                <button class="btn btn-sm btn-outline-secondary">Transferências
                </button>
                </a>
              </div>
              <div class="btn-group mr-2">
                <a  href="<?=base_url();?>entrada/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Entradas</button>
                </a>
              </div>
                
            <div class="btn-group">
                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="printer"></span>
                Relatórios
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item"  href="<?=base_url();?>entrada/listar_cadastro">
                                  Entrada</a>
                                  <a class="dropdown-item"  href="<?=base_url();?>impressaosaida/imprimir_saida_afinalizar" target="_blank">
                                  Saída - A finalizar</a>
                                  <a class="dropdown-item"  href="<?=base_url();?>impressaosaida/imprimir_saida_finalizadas" target="_blank">
                                  Saída - Finalizadas</a>
                                </div>
            </div>
    
   
            </div>
          </div>
<div>
<h3 class="h4 text-danger">Lista de Saídas</h3>
<ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Para Finalizar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Finalizadas</a>
            </li>

      </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
    <div class="text-right">

<table class="table table-striped" id="afinalizar">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>     
      <th scope="col">Botijão</th>
      <th scope="col">Animal</th>
      <th scope="col">Código</th>
      <th scope="col">Qtde</th>
      <th scope="col">Estoque Anterior</th>
      <th scope="col">Tipo</th>
      <th scope="col">DT Saída</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>
  <tbody>
  


  </tbody>
</table>
</div>
  </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div id="div_estoque" class="row">
  <table class="table table-striped" id="finalizados">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>     
      <th scope="col">Botijão</th>
      <th scope="col">Animal</th>
      <th scope="col">Código</th>
      <th scope="col">Qtde</th>
      <th scope="col">Estoque Anterior</th>
      <th scope="col">Tipo</th>
      <th scope="col">DT Saída</th>
 

    </tr>
  </thead>
  <tbody>
  

  </tbody>
</table>

</div>

</div>
</div>
<div class="modal" tabindex="-1" id="modal_finalizar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Finalizar Saída de Estoque</h5>
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="idestoque" id="idestoque">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-row">
        <div class=" form-row text-dark" style="padding:5px;">

        <div class="col-md-3">
        <label for="input">Quantidade</label>
              <input type="number" class="form-control" id="quantidade" name="quantidade" required>
            </div>
            <div class="col-md-3">
            <label for="input">Descarte</label>
              <input type="number" class="form-control" id="descarte" name="descarte" required>
   
            </div>
            <div class="col-md-6">
            <label for="input">Data</label>
              <input type="date" class="form-control" id="data" name="data" 
              value="<?php echo date("Y-m-d");?>"
              required>
   
            </div>
            <div class="col-md-12">
            <label for="input">Aplicação</label>
        <select name="aplicador" id="aplicador" class="form-control" required>
              <option value="">Escolha o Aplicador</option>
              <?php
              foreach($usuario as $row){
                echo"<option value=$row->idusuario>$row->nomeusuario</option>";
              }
              ?>

        </select>
            </div>
            <div class="form-group col-md-12">
              <label for="input">Observações</label>
              <input type="text" class="form-control" id="observacao" name="observacao">
            </div>

        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_salvar">Salvar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $( window ).on( "load", function() {
atualizardados();
  });
atualizardados=function(){


  $.ajax({
        url:'<?= base_url();?>saida/listar_afinalizar',
        type:'POST',
        dataType:'HTML',
        success: function(data){

          $("#afinalizar tbody").html(data);
         
        },error:function(data){
            alert(data);
        },
      });
      

  $.ajax({
        url:'<?= base_url();?>saida/listar_finalizados',
        type:'POST',
        dataType:'HTML',
        success: function(data){

          $("#finalizados tbody").html(data);
         
        },error:function(data){
            alert(data);
        },
      });
}
      $("#btn_salvar").on( "click", function(){
          var quantidade=$("#quantidade").val();
          var descarte=$("#descarte").val();
          var aplicador=$("#aplicador").val();
          var data=$("#data").val();
          var observacao=$("#observacao").val();
          var validar=0;
          if(quantidade==""){
            validar++;
          }
          if(descarte==""){
            validar++;
          }
          if(aplicador==""){
            validar++;
          }
          if(data==""){
            validar++;
          }
          if(validar>0){
            alert("Você precisa preencher os campos obrigatórios")
          }else{
                          $.ajax({
                            url:'<?= base_url();?>saida/update_cadastro',
                            type:'POST',
                            data: {
                              id:$("#id").val(),
                              idestoque:$("#idestoque").val(),
                              quantidade:quantidade,
                              descarte:descarte,
                              aplicador:aplicador,
                              data:data,
                              observacao:observacao
                                      },
                            success: function(data){

                              atualizardados();
                              $("#modal_finalizar").modal("hide");
                            
                            },error:function(data){
                                alert(data);
                            },
                    });
          }

        
      });


      finalizar=function(id,qtd,idestoque){
        
        $("#modal_finalizar").modal("show");
        $("#quantidade").val(qtd);
        $("#id").val(id);
        $("#idestoque").val(idestoque);
        $("#descarte").val(0);
     
      }
});


</script>





