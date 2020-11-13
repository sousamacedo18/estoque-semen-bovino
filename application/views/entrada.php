<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
       
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões
                   </button>
                </a>
              </div>
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>entrada/listar_entrada">
                <button class="btn btn-sm btn-outline-secondary">Listar Cadastros
                </button>
                </a>
  
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>
            </div>
          </div>
<div>
<h1 class="h2">Cadastro - Entrada</h1>
<form method="post" action="<?=base_url()?>entrada/salvar_cadastro">
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="input">Fornecedor</label>
    <select id="idfornecedor" name="idfornecedor" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($cadastro)>0){
    foreach($cadastro as $cad) {
    ?>
    <option value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Cliente</label>
    <select id="idcliente" name="idcliente" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($cadastro)>0){
    foreach($cadastro as $cad) {
    ?>
    <option value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Produto</label>
    <select class="form-control" id="identproduto" placeholder="Produto" name="identproduto" required>
  <?php  if(sizeof($produto)>0){
  foreach($produto as $cad) {
   
    ?>
   

      <option value="<?=$cad->idproduto?>"><?=$cad->descricao ?></option>

<?php }} ?>
  
</select>
</div>
<div class="form-group col-md-6">
    <label for="input">Animal</label>
    <select id="identanimal" name="identanimal" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($animal)>0){
    foreach($animal as $cad) {
    ?>
    <option value="<?=$cad->idanimal;?>"><?=$cad->nomeanimal;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
<div class="form-group col-md-6">
    <label for="input">Botijão</label>
    <select id="identbotijao" name="identbotijao" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($botijao)>0){
    foreach($botijao as $cad) {
    ?>
    <option value="<?=$cad->idbotijao;?>"><?=$cad->nomebotijao;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
  
  <div class="form-group col-md-6">
    <label for="input">Quantidade</label>
    <input type="number" class="form-control" id="qtde" placeholder="" name="qtde" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Valor Unitário</label>
    <input type="number" class="form-control" id="valor_unitario" name="valor_unitario" required>
  </div>

  <div class="form-group col-md-7">
  <button type="submit" class="btn btn-success">Salvar</button>
  </div>

</form>

</div>