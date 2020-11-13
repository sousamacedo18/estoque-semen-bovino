
<?php
	function formatCnpjCpf($value)
  {
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === 11) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
  }
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>cadastro/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Cadastro
                </button>
                </a>
              </div>
              <div class="btn-group mr-2">  
                <a  href="<?=base_url();?>impressaocadastro/imprimir_lista_cadastro" target="_blank">
                <button class="btn btn-sm btn-outline-secondary">Imprimir</button>
                </a>
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" >
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
   
            </div>
          </div>
<div>
<h3 class="h4 text-danger">Cadastros</h3>
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOME</th>
      <th scope="col">CPF | CNPJ</th>
      <th scope="col">CONTATO</th>
      <th scope="col">TIPO</th>
      <th scope="col"  class="text-center">AÇÃO</th>


    </tr>
  </thead>
  <tbody>
  <?php

   $i=0;
  foreach($cadastro as $cad) {
    $i++;
    ?>
    <tr>
      <th scope="row"><?=$cad->idcadastro;?></th>
      <td><?=$cad->nome;?></td>
      <td>
        <?=$cad->tipo=='Cliente'?formatCnpjCpf($cad->cpf):formatCnpjCpf($cad->cnpj)?>
        <!--<?=$cad->cpf;?>-->
      </td>
      
      <td><?=$cad->celular;?></td>
      <td><?=$cad->tipo;?></td>
      <td class="text-center" >
        <a href="#" onclick="montarcadastro(<?=$cad->idcadastro;?>)" 
        style="text-decoration: none;" >
        <span data-feather="list" class="text-dark btn_acao" data-toggle="modal" data-target="#exampleModal"></span>
        
      </a>

        <a href="<?=base_url('cadastro/atualizar_cadastro/'.$cad->idcadastro)?>"  
        style="text-decoration: none;" >
        <span data-feather="edit" class="text-primary btn_acao"></span>
        
      </a>

      <a href="<?=base_url('cadastro/excluir_cadastro/'.$cad->idcadastro)?>" 
        style="text-decoration: none;"
        onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger btn_acao"></span>
      </a>
    </td>
    </tr>
   
  <?php 
  }

  
?>

  </tbody>

</table>
</div>
<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="margin-top:10px"></div>
      <div class="h5 text-center" id="nomecliente">CARLOS HENRIQUE SOUSA DE MACEDO</div>
      <div class="modal-body">

      <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dados do Cadastro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Estoque</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Fazendas</a>
            </li>
      </ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">
    <div class="text-right">
      
    <a  href="#" onclick="imprimirCadastro();" target="_blank"
     style="text-decoration: none;">
    <span data-feather="printer" class="text-primary "></span>
   </a>
  <a href="#" onclick="redirecionar();" style="text-decoration: none;" >
        <span data-feather="edit" class="text-primary "></span>
        
      </a>

    </div>
    <div id="div_cadastro" class="row">

    </div>
  </div>
  </div>
  <input type="hidden" name="id" id="id" value="0">
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div id="div_estoque" class="row">
    <table id="tbl_estoque" class="table table-response">

    </table>

</div>

  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  <div class="container">
    <div id="div_fazenda" class="row">

    </div>
  </div>
  
  
  </div>
</div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<style>
.btn_acao{
  margin-left: 13px;
  text-decoration: none;
}
</style>
<script>
$(document).ready( function () {
    $('#myTable').DataTable( {
      dom: 'Bfrtip',
    buttons: [
        'copy', 'excel', 'pdf'
    ],
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

imprimirCadastro=function(){
  var id=$("#id").val();
  window.open("<?=base_url();?>impressaocadastro/imprimir_cadastro/"+id);
}
redirecionar=function(){
  var id=$("#id").val();
  window.location.assign("<?=base_url();?>cadastro/atualizar_cadastro/"+id);
}
montarcadastro=function(valor){
    $.ajax({
        url:'<?= base_url();?>cadastro/montar_cadastro',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#div_cadastro").html("");
           $("#div_cadastro").html(data);
           $("#btn_editar").val(valor);
           $("#id").val(valor);

        },error:function(data){
            alert(data);
        },
      });

    $.ajax({
        url:'<?= base_url();?>cadastro/retornar_nome',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#nomecliente").html("");
           $("#nomecliente").html(data);

        },error:function(data){
            alert(data);
        },
      });
    

    $.ajax({
        url:'<?= base_url();?>propriedade/montar',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#div_fazenda").html("");
           $("#div_fazenda").html(data);
        },error:function(data){
            alert (data);
        },
      });

    $.ajax({
        url:'<?= base_url();?>botijao/estoquecliente',
        type:'POST',
        data: {id:valor},
        dataType:"HTML",
        success: function(data){
           $("#tbl_estoque").html("");
           $("#tbl_estoque").html(data);
        },error:function(data){
            alert(data);
        },
      });
    }


} );

</script>

