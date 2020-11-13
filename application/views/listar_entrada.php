<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
          
            <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
              </div>
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>saida/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Saídas
                </button>
                </a>
              </div>
                <div class="btn-group mr-2">
                <a  href="<?=base_url();?>entrada/listar_cadastro">
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
<div>
<h3 class="h4 text-danger">Lista de Entradas</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cliente</th>     
      <th scope="col">Botijão</th>
      <th scope="col">Animal</th>
      <th scope="col">Código</th>
      <th scope="col">Qtde</th>
      <th scope="col">DT Entrada</th>
      <th scope="col">Ação</th>

    </tr>
  </thead>
  <tbody>
  
  <?php  
  function formatardata($data){
    return date("d/m/Y", strtotime($data));
}
  if(sizeof($entrada_semem)>0){
  foreach($entrada_semem as $cad) {
    $d=$cad->dataentrada;
    $data=formatardata($d);
    ?>

    <tr>
      <th scope="row"><?=$cad->identrada;?></th>
      <td><?=$cad->nome;?></td>
      <td><?=$cad->nomebotijao;?></td>
      <td><?=$cad->nomeanimal;?></td>
      <td><?=$cad->estcodigo;?></td>
      <td><?=$cad->qtde;?></td>
      <td><?=$data;?></td>

      <td>
        <!-- <a href="<?=base_url('entrada/atualizar_cadastro/'.$cad->identrada)?>" class="btn btn-primary btn-group">Alterar</a>
         <a href="<?=base_url('entrada/excluir_cadastro/'.$cad->identrada)?>" class="btn btn-danger btn-group" onclick="return confirm('Deseja realmente excluir o cadastro?');">Excluir</a></td>
     -->
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





