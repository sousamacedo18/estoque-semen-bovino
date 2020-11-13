

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <a href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
              </div>
              <div class="btn-group mr-2">
                <a href="<?=base_url();?>emprestimo/listar_emprestimo">
                <button class="btn btn-sm btn-outline-secondary">Emprestimos</button>
                </a>
              </div>
              <!-- <div class="btn-group mr-2">
     
                <a target="_blank" href="<?=base_url();?>relatorio/pdf">
              
                <button class="btn btn-sm btn-outline-secondary" >Relatórios</button>
                </a>
              </div> -->
    
   
            </div>
            
          </div>
          <div class="col-md-12">
          <h3 class="h4 text-danger text-center">Movimentação entre botijões</h3>
          </div>
         
          <div class="row">
          <div class="col-md-12 text-center" id="div_botoes_top">

          <button id="btn_transferir" class="btn btn-success" disabled> Transferência entre canecas</button>

          <button id="btn_novoespaco" class="btn btn-primary"  > Transferir e abrir novo espaço</button></div>
            <div class="col-md-6">
            <!--<img src="<?= base_url();?>assets/bootstrap-icons/bootstrap.svg" alt="" width="32" height="32" title="Bootstrap">
-->
            <div class="h5 text-danger" id="div_tbl_origem">Botijão Origem </div>
            <div class="row">
            <div class="col-md-10">
            <select class="form-control" id="select_botijao_origem">
            <option></option>
              <?php
            foreach ($botijao as $row) {
     
              echo"<option value=$row->idbotijao >$row->nomebotijao</option>";
              
            }
       
            ?>

            </select>
            </div>
            <div class="col-md-2">
            <buttom class="btn btn-outline-primary btn-sm" id="btn_atualizar_origem" >
            <img 
                                      src="<?= base_url();?>assets/bootstrap-icons/arrow-clockwise.svg" alt="" 
                                      width="20" height="20" title="Bootstrap" ">
            </buttom>
            </div>
            </div>
         

            <div>
            <table id="tbl_origem" class="table table-responsive table-hover">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">C</th>
                                  <th scope="col">Touro</th>
                                  <th scope="col">Raça</th>
                                  <th scope="col">Qtd</th>
                                  <th scope="col">Cód</th>
                                  <th scope="col">Tipo</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col"></th>
                                
                                </tr>
                              </thead>
                              <tbody>
        
   
            <tr >
            <td colspan="9">
            Sem dados!
            <!-- <img src="<?= base_url();?>assets/img/loading.gif"
             alt="" 
            width='200' height='200' title='loading' >	 -->
            </td>
            </tr>
                                       

                              </tbody>
                            </table>
            </div>
            </div>
   

            <div class="col-md-6" id="div_tbl_destino">
              
              <div class="h5 text-success">Botijão Destino</div>
              <div class="row">
              <div class="col-md-10">
              <select class="form-control" id="select_botijao_destino">
              <option></option>
            
            <?php
          foreach ($botijao as $row) {
   
            echo"<option value=$row->idbotijao>$row->nomebotijao</option>";
            
          }
     
          ?>
          
          </select>
          </div>
          <div class="col-md-2">
          <buttom class="btn btn-outline-primary btn-sm" id="btn_atualizar_destino" >
            <img 
                                      src="<?= base_url();?>assets/bootstrap-icons/arrow-clockwise.svg" alt="" 
                                      width="20" height="20" title="Bootstrap" ">
          </buttom>
          </div>  
          </div>
            <table id="tbl_destino" class="table table-responsive table-hover">
                              <thead class="bg-warning">
                                <tr>
                                  <th scope="col">C</th>
                                  <th scope="col">Touro</th>
                                  <th scope="col">Raça</th>
                                  <th scope="col">Qtd</th>
                                  <th scope="col">Cód</th>
                                  <th scope="col">Tipo</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col"></th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                                      <tr >
                                      <td colspan="9">
                                        Sem dados!
                                      </td>
                                      </tr>                              


                              </tbody>
                            </table>
                            

            </div>
           <div class="col-md-12 text-right" id="div_botoes_bottom">
             <!-- <button class="btn btn-success">Transferir >></button></div>-->
          </div>
        
</main>
          
         
<div class="modal" tabindex="-1" id="exampleModal_novoespaco">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Criar Novo Espaço na Caneca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="h5 text-center text-primary">Nova Armazenagem</div>
        <div class="row">
        <div class="col-md-6">
            <label>Tipo de Transferência</label>
           <select class="form-control" id="tipo_transf" name="tipo_transf" >
             <option value="1">Transferência</option>
             <option value="2">Doação</option>
             <option value="3">Emprestimo</option>

           </select>
          </div>
        <div class="col-md-3">
            <label>Caneca</label>
            <select name="caneca" id="caneca" class="form-control">
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
          <div class="col-md-10">
            <label>Proprietário</label>
            <select name="proprietario" id="proprietario" class="form-control">
                <option></option>
            </select>
          </div>
          <div class="col-md-6">
            <label>Touro</label>
            <select name="animal" id="animal" class="form-control">
                <option></option>
            </select>
          </div>
          <div class="col-md-6">
           
            <div class="form-group">
              <label>Código</label>
              <input type="text" class="form-control" name="codigo" id="codigo"  placeholder="Código">
              
            </div>

          </div>
        </div>
        <div class="row">
          
          <div class="col-md-6">
             
             <div class="form-group">
               <label>Tipo</label>
          <select class="form-control" name="tiposemem" id="tiposemem" >
               <option value="CV">CV</option>
               <option value="SXF">SXF</option>
               <option value="SXM">SXM</option>
          </select>
             </div>
             </div>
          <div class="col-md-6">
             
             <div class="form-group">
               <label>Qtde</label>
          <input type="number" class="form-control" name="qtde" id="qtde" >

             </div>
             </div>
            
          <div class="col-md-12">
          <div class="form-group">

            <label>Observação</label>
            <textarea name="observacao_novo" id="observacao_novo" class="form-control" rows="3" cols="10"></textarea>
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
</div>
<div class="modal" tabindex="-1" id="exampleModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nova Espaço na Caneca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você deseja cadastrar uma novo espaço em um caneca deste botijão de destino?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-primary" id="btn_confirmacao">Sim</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="exampleModal_transferencia">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Transferência</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Você está prestes a fazer uma transfência entre botijões.</p>
        <div class="row">
          <div class="col-md-6">
            <label>Tipo de Transferência</label>
           <select class="form-control" id="tipo" name="tipo" >
             <option value="1">Transferência</option>
             <option value="2">Doação</option>
             <option value="3">Emprestimo</option>
             <option value="4">Pagar Emprestimo</option>

           </select>
          </div>
          <div class="col-md-6">
            <label>Qtd para transferir</label>
            <input type="number" name="qtd" id="qtd" class="form-control">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Observação</label>
            <textarea name="observacao" id="observacao" class="form-control" rows="3" cols="10"></textarea>
          </div>
        </div>
        <div id="div_tblemprestimo" class="row" >
        <div class="col-md-12" style="margin-top:10px;" >
        <label>Emprestimo</label>
        <table id="tbl_emprestimo" class="table table-responsive table-hover" style="display: none;">
                              <thead class="bg-warning">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">Qtd</th>
                                  <th scope="col">Movimentação</th>
                                  <th scope="col">Observação</th>
                                  <th scope="col"></th>
                                  
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                            </table>
</div>
      </div>
      </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button id="btn_exec_transferencia" type="button" class="btn btn-success">Tranferir</button>
      </div>
    </div>
  </div>
</div>


<style>
  #div_tbl_destino{
    border-left:solid 2px green;
    padding-top:10px;
  }
  #div_tbl_origem{
    padding-top:10px;
  }
  #div_botoes_top{
    border-bottom: solid 2px green;
    padding-bottom: 10px;

  }
  #div_botoes_bottom{
    border-top: solid 2px green;
    padding-top: 20px;
    

  }
  #select_botijao_origem{
    margin-bottom:5px;
  }
  #select_botijao_destino{
    margin-bottom:5px;
  }
</style>
<script type="text/javascript">
$(document).ready(function(){

function habilitar_transferencia(){
  $("#btn_transferir").prop( "disabled", false );
}

function desabilitar_transferencia(){
  $("#btn_transferir").prop( "disabled", true );
}

$("#btn_confirmacao").click(function(){
  $("#exampleModal").modal("hide");
  $("#exampleModal_novoespaco").modal("show");
});
//div_tblemprestimo
//$(document).on('change', "#tipo", function(){
$("#tipo").on("change",function(event){
  valor = $("#tipo option:selected").val();
  
  if(valor>3){
    $("#tbl_emprestimo").show("slow");
    $.ajax({
        url:'<?= base_url();?>emprestimo/listar_emprestimo_apagar',
        type:'POST',
        success: function(data){
        
           $("#tbl_emprestimo tbody").html(data);
        },error:function(data){
            alert(data);
        },
      }); 
  }else{
    $("#tbl_emprestimo").hide("slow");
  }
  event.preventDefault();
 
});
$(document).on('click', "#btn_salvar", function(){
  $.ajax({
        url:'<?= base_url();?>botijao/salvar_espaco',
        type:'POST',
        data: {

          proprietario:$("#proprietario").val(),
          animal:$("#animal").val(),
          codigo:$("#codigo").val(),
          tiposemem:$("#tiposemem").val(),
          tipotransf:$("#tipo_transf option:selected").val(),
          caneca:$("#caneca").val(),
          qtde:$("#qtde").val(),
          idorigem:$("#input_origem").val(),
          observacao_novo:$("#observacao_novo").val(),
          qtdorigem:$("#qtd_origem").val(),
          botijao: $("#select_botijao_destino option:selected").val()
             },
        dataType:'html',
        success: function(data){
          $("#exampleModal_novoespaco").modal("hide");
          atualizardestino();
          atualizarorigem();
          desabilitar_transferencia();

         
        },error:function(data){
            alert(data);
           
        },
      });    
});

$(document).on('click', "#btn_transferir", function(){
          
          if($("#qtd_origem").length && $("#qtd_destino").length){
            var idanimalorigem=$("#id_animal_origem").val();
            var idanimaldestino=$("#id_animal_destino").val();
            if(idanimalorigem!==idanimaldestino){
              alert("Ops! As canecas selecionadas devem ser do mesmo animal");
            }else{
            $("#exampleModal_transferencia").modal("show");
          }
          }else{
            alert("Desculpe, mas você precisa selecionar duas canecas (uma  em cada botijão)!")
          }
          
          
});

            $(document).on('click', "#btn_novoespaco", function(){
                valor = $("#select_botijao_destino option:selected").val();
                if(valor.length>0 && $("#qtd_origem").length){
                  $("#exampleModal_novoespaco").modal("show");
                                      $.ajax({
                                              url:'<?= base_url();?>botijao/montarcaneca',
                                              type:'POST',
                                              dataType:'JSON',
                                              data: {
                                                    id:$("#input_origem").val(),
                                                    
                                              },
                                              success: function(data){
                                                var linha=data.length;
       
                                               if(linha>0){
                                                for (var i = 0;linha>i ; i++) {
                                                    $("#codigo").val(data[i].estcodigo),
                                                    $("#qtde").val(data[i].qtde),
                                                   
                                                    $('#caneca option[value="' +data[i].estcaneca+'"]').attr({ selected : "selected" });
                                                    $('#proprietario option[value="' +data[i].idestcliente+'"]').attr({ selected : "selected" });
                                                    $('#animal option[value="' +data[i].idestanimal+'"]').attr({ selected : "selected" });
                                                    $('#tiposemem option[value="' +data[i].esttipo+'"]').attr({ selected : "selected" });
                                                }
                                               }
                                      
                                      },error:function(data){
                                          alert(data);
                                      },
                                    });

                       }else{
                    alert("Você precisa selecionar uma caneca de origem e um botijão de destino ")
                 }     
});

  $(document).on('click', "#btn_exec_transferencia", function(){
    valor = $("#tipo option:selected").val();
    var movimentacao=0;


    if(valor>3 && $("#slc_emprestimo").is(":checked") == false ){
      alert("Você precisa escolha qual emprestimo para pagar");
    }else{
      var $radio  = $("input[name='slc_emprestimo']");
      movimentacao = $radio.filter(':checked').val();
   
    $.ajax({
        url:'<?= base_url();?>botijao/salvar_transferencia',
        type:'POST',
        data: {
          qtd:$("#qtd"). val(),
          idorigem:$("#input_origem").val(),
          iddestino:$("#input_destino").val(),
          qtdorigem:$("#qtd_origem").val(),
          qtddestino:$("#qtd_destino").val(),
          tipo:$("#tipo").val(),
          movimentacao:movimentacao,
          observacao:$("#observacao").val()
             },
        dataType:'html',
        success: function(data){
          $("#exampleModal_transferencia").modal("hide");
          $("#tbl_emprestimo tbody").html("");
          atualizardestino();
          atualizarorigem();
          desabilitar_transferencia();

         
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
});


function atualizardestino(){
  var img_src="<img src='<?= base_url();?>assets/img/loading.gif' height=100 width=100>";
  var botijao;
    botijao = $("#select_botijao_destino").val();
    if(botijao==0){
      alert('Para atualizar, escolha um botijão de destino');
    }else{
      $.ajax({
        url:'<?= base_url();?>botijao/atualizar_destino',
        type:'POST',
        data: {id:botijao},
        success: function(data){
          $("#tbl_destino tbody").html("<tr><td colspan='9' class='text-center'>"+img_src+"</td></tr>");
           if(data!==""){
            window.setTimeout(function() {
              
              $("#tbl_destino tbody").html(data);
    
           
          
            }, 1000);
           }else{
            window.setTimeout(function() {
           
            $("#tbl_destino tbody").html("<tr><td colspan='9' class='text-center'>Sem dados!</td></tr>");
          }, 1000);
           }
        },error:function(data){
            alert(data);
        },
      });
     
    }
   
}
function atualizarorigem(){
  var img_src="<img src='<?= base_url();?>assets/img/loading.gif' height=100 width=100>";
  var botijao;
    botijao = $("#select_botijao_origem").val();
    if(botijao==0){
      alert('Para atualizar, escolha um botijão de origem');
    }
    else{
  
      $.ajax({
        url:'<?= base_url();?>botijao/atualizar_origem',
        type:'POST',
        data: {id:botijao},
        success: function(data){
          $("#tbl_origem tbody").html("<tr><td colspan='9' class='text-center'>"+img_src+"</td></tr>");
           if(data!==""){
            window.setTimeout(function() {
              $("#tbl_origem tbody").html(data);
            }, 1000);
           }else{
            window.setTimeout(function() {
            $("#tbl_origem tbody").html("<tr><td colspan='9' class='text-center'>Sem dados!</td></tr>");
          }, 1000);
           }
           
        },error:function(data){
            alert(data);
        },
      });
    }
}
 $("#btn_atualizar_destino").click(function(){
      atualizardestino();
 });
 $("#btn_atualizar_origem").click(function(){
      atualizarorigem();
 });
 $(document).on('click', "input:radio[name='opt_origem']", function(){
   
  var $radio  = $("input[name='opt_origem']");
  var estoque;
    estoque = $radio.filter(':checked').val();
    //alert(estoque);
  
      $.ajax({
        url:'<?= base_url();?>botijao/filtrar_origem',
        type:'POST',
        data: {id:estoque},
        success: function(data){
      
           $("#tbl_origem tbody").html(data);
           
        },error:function(data){
            alert(data);
        },
      });
    
 });
 $(document).on('click', "#btn_transferir", function(){
   var qtd_origem=$("#qtd_origem").val();
   $("#qtd").val(qtd_origem);
 });
 $(document).on('click', "input:radio[name='opt_destino']", function(){

  var $radio  = $("input[name='opt_destino']");
  var estoque;


    estoque = $radio.filter(':checked').val();
    //alert(estoque);
  
      $.ajax({
        url:'<?= base_url();?>botijao/filtrar_destino',
        type:'POST',
        data: {id:estoque},
        success: function(data){
           if(data!==""){
           $("#tbl_destino tbody").html(data);
           habilitar_transferencia();
          
           }else{
             desabilitar_transferencia();
            
           }
           
        },error:function(data){
            alert(data);
        },
      });
    
 });
    
  $("#select_botijao_origem").change(function(){
   
   var img_src="<img src='<?= base_url();?>assets/img/loading.gif' height=100 width=100>";
    var valor;
    valor = $("#select_botijao_origem option:selected").val();
       $.ajax({
       url:'<?= base_url();?>botijao/atualizar_origem',
       type:'POST',
       data: {id:valor},
       success: function(data){
           $("#tbl_origem tbody").html("<tr><td colspan='9' class='text-center'>"+img_src+"</td></tr>");
           if(data!==""){
            window.setTimeout(function() {
              $("#tbl_origem tbody").html(data);
            }, 1000);
           }else{
            window.setTimeout(function() {
            $("#tbl_origem tbody").html("<tr><td colspan='9' class='text-center'>Sem dados!</td></tr>");
          }, 1000);
           }
       },error:function(data){
              alert(data);
       },
       });
 
  });
  
  $(document).on('change', "#select_botijao_destino", function(){
  
    var img_src="<img src='<?= base_url();?>assets/img/loading.gif' height=100 width=100>";
    var valor;
    valor = $("#select_botijao_destino option:selected").val();
    //alert(valor);
    $.ajax({
       url:'<?= base_url();?>botijao/atualizar_destino',
       type:'POST',
       data: {id:valor},
       success: function(data){
        $("#tbl_destino tbody").html("<tr><td colspan='9' class='text-center'>"+img_src+"</td></tr>");
           if(data!==""){
            window.setTimeout(function() {
              $("#tbl_destino tbody").html(data);
              habilitar_transferencia();
             
            }, 1000);
           }else{
            window.setTimeout(function() {
            $("#tbl_destino tbody").html("<tr><td colspan='9' class='text-center'>Sem dados!</td></tr>");
           desabilitar_transferencia();
           
          }, 1000);
          
           }
       
       },error:function(data){
              alert(data);
       },
       });
    $.ajax({
       url:'<?= base_url();?>cadastro/montar_select_cliente',
       type:'POST',
       dataType:"HTML",
       success: function(data){
        $("#proprietario").html("");
        $("#proprietario").html(data);

      
       
       },error:function(data){
              alert(data);
       },
       });
    $.ajax({
       url:'<?= base_url();?>animal/montar_select_animal',
       type:'POST',
       dataType:"HTML",
       success: function(data){
        $("#animal").html("");
        $("#animal").html(data);

      
       
       },error:function(data){
              alert(data);
       },
       });
  });
  




  });
      





</script>