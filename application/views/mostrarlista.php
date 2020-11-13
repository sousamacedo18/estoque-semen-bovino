<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
      
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Botijão
                </button>
                </a>
                <a  href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Mostrar Miniaturas</button>
                </a>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>
            </div>
          </div>
<div>
<!--<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Botijão</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>
  <tbody>
  <?php $i=0;  foreach($botijao as $cad) {
    $i++;
    ?>

    <tr>
      <th scope="row"><?=$cad->idbotijao;?></th>
      <td><?=$cad->nomebotijao;?></td>
      <td><a href="<?=base_url('botijao/atualizar_cadastro/0/'.$cad->idbotijao)?>" class="btn btn-primary btn-group">Alterar</a>
      <a href="<?=base_url('botijao/excluir_cadastro/0/'.$cad->idbotijao)?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir o cadastro?');">Excluir</a></td>
    </tr>

  <?php }?>
  </tbody>
  <tfoot>
        <tr>
            <th scope="row">Total de cadastros:</th>
            <td><?=$i?></td>
        </tr>
    </tfoot>
</table>
  -->
</div>
<h1 class="h4 text-danger">Botijões</h1>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome Botijão</th>
      <th scope="col">Proprietário</th>
      <th scope="col">Fazenda</th>
      <th scope="col" colspan="3" class="text-center"> Ação</th>
    </tr>
  </thead>
  <tbody>



<?php $i=0;  foreach($botijao as $cad) {
    $i++;

    ?>
    <tr>
    <th scope="row"><?=$cad->idbotijao;?></th>
    <td><?=$cad->nomebotijao;?></td>
    <td><?=$cad->nome;?></td>
    <td><?=$cad->nomepropriedade;?></td>
    <td>
  
    <a href='<?=base_url('botijao/estoque/0/'.$cad->idbotijao)?>'>
        <span data-feather="chevron-right" class="text-success "></span>
      </a>
    </td>
    <td>
    <a href="<?=base_url('botijao/atualizar_cadastro/'.$cad->idbotijao)?>" >
        <span data-feather="edit" class="text-primary "></span>
      </a>
      </td>
    <td>
      <a href="<?=base_url('botijao/excluir_cadastro/'.$cad->idbotijao)?>"   onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger"></span>
      </a>

  
  </td>
  </tr>

<?php }?>
</tbody>
</table>