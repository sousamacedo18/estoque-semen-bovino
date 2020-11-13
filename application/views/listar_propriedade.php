<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>propriedade/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Nova Propriedade
                </button>
                </a>
              </div>
              <div class="btn-group mr-2">
              
                <a  href="<?=base_url();?>impressaopropriedade/imprimir_lista_cadastro" target="_blank">
                <button class="btn btn-sm btn-outline-secondary">Imprimir</button>
                </a>
              </div>
              <!--<button class="btn btn-sm btn-outline-secondary dropdown-toggle" >
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
   
            </div>
          </div>
<div>
<h3 class="h4 text-danger">Lista de Propriedades</h3>
<table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome Propriedade</th>
      <th scope="col">Nome Proprietário</th>
      <th scope="col">Inscrição Estadual</th>
      <th scope="col">Municipio</th>
      <th scope="col">UF</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>
  <tbody>
  <?php

   $i=0;
  foreach($propriedade as $cad) {
    $i++;
    ?>
    <tr>
      <th scope="row"><?=$cad->idpropriedade;?></th>
      <td><?=$cad->nomepropriedade;?></td>
      <td><?=$cad->nome;?></td>
      <td><?=$cad->inscestadual;?></td>
      <td><?=$cad->municipiopropriedade;?></td>
      <td><?=$cad->ufpropriedade;?></td>
      <td>
        
        <a href="<?=base_url('propriedade/atualizar_cadastro/'.$cad->idpropriedade)?>">
        <span data-feather="edit" class="text-primary btn_acao"></span>        
      </a>
    
      <a href="<?=base_url('propriedade/excluir_cadastro/'.$cad->idpropriedade)?>"  onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger btn_acao"></span>
       </a>
        
  </td>
    </tr>
 
  <?php 
  }

  
?>
  </tbody>
</table>
<div class="h6">Total de cadastros: <?php echo$i;?></div>
</div>
<style>
  .btn_acao{
  margin-left: 15px;
   
  }

</style>
<script>
$(document).ready( function () {
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