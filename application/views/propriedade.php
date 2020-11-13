<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastro - Propriedade</h1>
       
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>propriedade/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Listar Propriedades
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
<form method="post" action="<?=base_url()?>propriedade/salvar_cadastro">
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="input">Proprietário</label>
    <select id="idproprietario" name="idproprietario" class="form-control"   required>
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
  <div class="form-group col-md-12">
    <label for="input">Nome da Propriedade</label>
    <input type="text" class="form-control" id="nomepropriedade" placeholder="Nome do Propriedade" name="nomepropriedade" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Inscrição Estadual</label>
    <input type="text" class="form-control" id="inscestadual" placeholder="Inscrição Estadual" name="inscestadual" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Endereço</label>
    <input type="text" class="form-control" id="enderecopropriedade" placeholder="Endereço da Propriedade" name="enderecopropriedade" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Municipio</label>
    <input type="text" class="form-control" id="municipiopropriedade" placeholder="Municipio" name="municipiopropriedade" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">UF</label>
   
    <select id="ufpropriedade" name="ufpropriedade" class="form-control"  placeholder="UF" required>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
   
</select>
  </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>