<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Atualizar - Produto</h1>
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>produto/listar_produto">
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
<form method="post" action="<?=base_url()?>produto/update_cadastro">
  <input type="hidden" name="id" id="id" value="<?=$produto[0]->idproduto;?>">
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="input">Descrição</label>
<input type="text" class="form-control" id="inputAddress" placeholder="Descrição" name="descricao" required value="<?=$produto[0]->descricao;?>">
  </div>
  <div class="form-group col-md-6">
    <label for="input">Estoque Minimo</label>
    <input type="number" class="form-control" id="estoque_minimo" placeholder="Estoque minimo" name="estoque_minimo" required value="<?=$produto[0]->estoque_minimo;?>">
  </div>
  <div class="form-group col-md-6">
    <label for="input">Estoque Máximo</label>
    <input type="number" class="form-control" id="estoque_maximo" placeholder="Estoque Máximo" name="estoque_maximo" required value="<?=$produto[0]->estoque_maximo;?>">
  </div>
  <div class="form-group col-md-6">
      <label for="Propriedade">Status</label>
      <select id="status" name="status" class="form-control"  required>
    <option <?=$produto[0]->status=="A"?'selected':''?> value="A">Ativo</option>
    <option <?=$produto[0]->status=="I"?'selected':''?> value="I">Inativo</option>
    </select>  
    </div>
    <div class="form-group col-md-12">
  <button type="submit" class="btn btn-success">Salvar</button>
</div>
</form>

</div>