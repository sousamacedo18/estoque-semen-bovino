<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>animal/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Cadastro
                </button>
                </a>
              </div>
              <div class="btn-group mr-2">
              
                <a target="_blank" href="<?=base_url();?>impressaoanimal/imprimir_lista_cadastro">
                
                <button class="btn btn-sm btn-outline-secondary">
                <span data-feather="printer"></span>    
                Imprimir</button>
                </a>
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" >
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
   
            </div>
          </div>
<div class="col-md-7 col-lg-7 col-sm-12">
<h3 class="h4 text-danger">Lista de Animais</h3>
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Raça</th>
      <th scope="col" ></th>

    </tr>
  </thead>
  <tbody>
  <?php
  if (sizeof($animal)>0){
    foreach($animal as $cad) {
      
      ?>
    <tr>
      <th scope="row"><?=$cad->idanimal;?></th>
      <td><?=$cad->nomeanimal;?></td>
      <td><?=$cad->raca;?></td>
      <td >
      <a href="<?=base_url('animal/atualizar_cadastro/'.$cad->idanimal)?>" >
        <span data-feather="edit" class="text-primary text-left "></span>
      </a>

      <a href="<?=base_url('animal/excluir_cadastro/'.$cad->idanimal)?>"   onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger text-right"></span>
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
  <tfoot>
  <tr><td  colspan="6">Total de cadastro: <?php echo sizeof($animal)?></td></tr>
  </tfoot>
</table>
</div>
</main>
<script>
$(document).ready( function () {
    $('#myTable').DataTable( {
      "pageLength": 25,
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
} );

</script>