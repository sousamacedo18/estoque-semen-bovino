
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>produto/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Entrada
                </button>
                </a>
     
                <a  href="<?=base_url();?>entrada/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Relatórios</button>
                </a>
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" >
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
   
            </div>
          </div>
<div>
<h3 class="h4 text-danger">Lista de Produtos</h3>
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descrição</th>
      <th scope="col">Status</th>
      <th scope="col" >Ação</th>

    </tr>
  </thead>
  <tbody>
  
  <?php  
  if(sizeof($produto)>0){
  foreach($produto as $cad) {
    
    ?>

    <tr>
      <th scope="row"><?=$cad->idproduto;?></th>
      <td ><?=$cad->descricao;?></td>
      <td><?=$cad->status=='A'? 'Ativo':'Inativo';?></td>
      <!-- <td><a href="<?=base_url('produto/atualizar_cadastro/'.$cad->idproduto)?>" class="btn btn-primary btn-group">Alterar</a>
      <a href="<?=base_url('produto/excluir_cadastro/'.$cad->idproduto)?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir o cadastro?');">Excluir</a></td> -->
      <td >
      <a href="<?=base_url('produto/atualizar_cadastro/'.$cad->idproduto)?>" >
    
        <span data-feather="edit" class="text-primary " ></span>
      </a>
 
      <a href="<?=base_url('produto/excluir_cadastro/'.$cad->idproduto)?>"   onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger"></span>
      </a>
      </td>
    </tr>

  <?php
    }
}else{
  echo"<tr> <td class=''>Sem dados!</td> </tr>";

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
});

</script>