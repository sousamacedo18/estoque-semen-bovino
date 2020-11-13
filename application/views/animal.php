<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
           
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>animal/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Listar Cadastros
                </button>
                </a>
  
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
            </div>
          </div>
<div>
<h1 class="h2">Cadastro - Animal</h1>
<form method="post" action="<?=base_url()?>animal/salvar_cadastro">
  <div class="form-row">

  <div class="form-group col-md-6">
    <label for="input">Nome do Animal</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome do Animal" name="nomeanimal" required>
  </div>

    <div class="form-group col-md-6">
      <label for="input">Raça</label>
    <select id="raca" name="raca" class="form-control"  required>
    <option value="GL">GL</option>
    <option value="GO">GO</option>
    <option value="HO">HO</option>
    <option value="JE">JE</option>
    <option value="NE">NE</option>
    <option value="NM">NM</option>
    </select>
    </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>