<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
      
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Novo Botijão
                </button>
                </a>
              </div>
              <!-- <div class="btn-group mr-2">
              <a  href="<?=base_url();?>entrada/cadastrar">
                <button class="btn btn-sm btn-outline-secondary">Entradas
                </button>
                </a>
              </div> -->
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/esc_botijao_transf/0">
                <button class="btn btn-sm btn-outline-secondary">Transferências
                </button>
                </a>
              </div>
              <!-- <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/esc_botijao_transf/0">
                <button class="btn btn-sm btn-outline-secondary">Saídas
                </button>
                </a>
              </div> -->
              <div class="btn-group mr-2">
                <a  href="<?=base_url();?>botijao/mostrarlista">
                <button class="btn btn-sm btn-outline-secondary">Mostrar Lista</button>
                </a>
              </div>
            
  
            <div class="btn-group mr-2">
                                <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                <button class="btn btn-sm btn-outline-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="repeat"></span>
                Lançamentos
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item"  href="<?=base_url();?>entrada/listar_cadastro">
                                  Entrada</a>
                                  <a class="dropdown-item"  href="<?=base_url();?>saida/listar_cadastro">
                                  
                                  Saída</a>

                                </div>
            </div>
            <div class="btn-group">
                                <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                                <button class="btn btn-sm btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span data-feather="repeat"></span>
                Imprimir
                                </button>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" target="_blank"  href="<?=base_url();?>impressaoanimal/imprimir_quantidade_por_animal">
                                  Quantidade por animal</a>

                                  <a class="dropdown-item" target="_blank"  href="<?=base_url();?>impressaoanimal/imprimir_quantidade_detalhada">
                                  Quantidade detalhada do estoque</a>

                                  <a class="dropdown-item"  href="<?=base_url();?>cadastro/relatorioporcliente">                                  
                                  Quantidade por determinado cliente</a>

                                  <a class="dropdown-item"  href="<?=base_url();?>cadastro/relatorioporanimal">                                  
                                  Quantidade por determinado animal</a>

                                </div>
            </div>
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
<?php $i=0;  foreach($botijao as $cad) {
    $i++;
    ?>
    
<div class="card" style="width: 19rem;float: left; margin:10px;">
<p class="card-text text-center"><b><?=$cad->nome;?></b></p>
  <img class="card-img-top" src="<?= base_url();?>assets/img/botijao1.jpg" style="
  margin-left: auto;
  margin-right: auto;width:150px;height:100px;" alt="Card image cap" >
  <div class="card-body" style="padding: 5px;">
    <h5 class="card-title text-center"><b><?=$cad->nomebotijao;?></b></h5>
    <p class="card-text"><p>Propriedade:</p><p><b> <?=$cad->nomepropriedade;?></b></p>
    <p class="card-text"><p>Município:</p><p><b> <?=$cad->municipiopropriedade;?></b></p>
    <p class="card-text">UF:<b> <?=$cad->ufpropriedade;?></b></p>
   
    
    <h6 class="text-center"><a href="<?=base_url('botijao/estoque/0/'.$cad->idbotijao)?>" class=" btn btn-outline-primary">Abrir</a></h6>
  </div>
</div>

<?php }?>