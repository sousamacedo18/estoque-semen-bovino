<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastro - Animal</h1>
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>animal/listar_cadastro">
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
<form method="post" action="<?=base_url()?>animal/update_cadastro">
  <div class="form-row">
  <input type="hidden" name="id" id="id" value="<?=$animal[0]->idanimal;?>">
 
  <div class="form-group col-md-6">
    <label for="input">Nome do Animal</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome do Animal" name="nomeanimal" value="<?=$animal[0]->nomeanimal;?>"required>
  </div>
  <div class="form-group col-md-2">
      <label for="input">Raça</label>
    <select id="raca" name="raca" class="form-control"  required>
    <option <?=$animal[0]->raca=="GL"?'selected':''?> value="GL">GL</option>
    <option <?=$animal[0]->raca=="GO"?'selected':''?>value="GO">GO</option>
    <option <?=$animal[0]->raca=="HO"?'selected':''?>value="HO">HO</option>
    <option <?=$animal[0]->raca=="JE"?'selected':''?>value="JE">JE</option>
    <option <?=$animal[0]->raca=="NE"?'selected':''?>value="NE">NE</option>
    <option <?=$animal[0]->raca=="NM"?'selected':''?>value="NM">NM</option>
    </select>
    </div>

  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>