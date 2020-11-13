<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Imprimir Estoque por Cliente</h1>
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>animal/listar_cadastro">
                <!-- <button class="btn btn-sm btn-outline-secondary">Listar Cadastros
                </button> -->
                </a>
  
              </div>
            <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>  -->
            </div>
          </div>
          
<div class="col-md-6">

  

<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NOME</th>
      <th scope="col"  class="text-center"></th>


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
     

      <td class="text-center" >
        <a target="" href="<?=base_url()?>impressaoanimal/imprimir_quantidade_proprietario/<?=$cad->idcadastro;?>"
        style="text-decoration: none;" >
        <span data-feather="printer" class="text-dark btn_acao" data-toggle="modal" data-target="#exampleModal"></span>
        
      </a>



    </td>
    </tr>
   
  <?php 
  }

  
?>

  </tbody>

</table>

</div>
</main>
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

    }


} );
</script>