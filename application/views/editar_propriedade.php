<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Alterar Cadastro - Propriedade</h1>
           
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
<form method="post" action="<?=base_url()?>propriedade/update_cadastro">
<input type="hidden" name="id" id="id" value="<?=$propriedade[0]->idpropriedade?>">
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="input">Proprietário</label>
    <select id="idproprietario" name="idproprietario" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($cadastro)>0){
    foreach($cadastro as $cad) {
    ?>
    <option value="<?=$cad->idcadastro;?>" <?=$propriedade[0]->idproprietario==$cad->idcadastro?"selected":""?>><?=$cad->nome;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
  <div class="form-group col-md-12">
    <label for="input">Nome da Propriedade</label>
    <input type="text" class="form-control" id="inputAddress" value="<?=$propriedade[0]->nomepropriedade;?>" placeholder="Nome do Propriedade" name="nomepropriedade" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Inscrição Estadual</label>
    <input type="text" class="form-control" id="inscestadual" value="<?=$propriedade[0]->inscestadual;?>" placeholder="Inscrição Estadual" name="inscestadual" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Endereço</label>
    <input type="text" class="form-control" id="enderecopropriedade" value="<?=$propriedade[0]->enderecopropriedade;?>" placeholder="Endereço da Propriedade" name="enderecopropriedade" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Municipio</label>
    <input type="text" class="form-control" id="municipiopropriedade" value="<?=$propriedade[0]->municipiopropriedade;?>" placeholder="Municipio" name="municipiopropriedade" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">UF</label>
   
    <select id="ufpropriedade" name="ufpropriedade" class="form-control"   placeholder="UF" required>
    <option value="AC" <?=$propriedade[0]->ufpropriedade=="AC"?"selected":""?>>Acre</option>
    <option value="AL" <?=$propriedade[0]->ufpropriedade=="AL"?"selected":""?>>Alagoas</option>
    <option value="AP" <?=$propriedade[0]->ufpropriedade=="AP"?"selected":""?>>Amapá</option>
    <option value="AM" <?=$propriedade[0]->ufpropriedade=="AM"?"selected":""?>>Amazonas</option>
    <option value="BA" <?=$propriedade[0]->ufpropriedade=="BA"?"selected":""?>>Bahia</option>
    <option value="CE" <?=$propriedade[0]->ufpropriedade=="CE"?"selected":""?>>Ceará</option>
    <option value="DF" <?=$propriedade[0]->ufpropriedade=="DF"?"selected":""?>>Distrito Federal</option>
    <option value="ES" <?=$propriedade[0]->ufpropriedade=="ES"?"selected":""?>>Espírito Santo</option>
    <option value="GO" <?=$propriedade[0]->ufpropriedade=="GO"?"selected":""?>>Goiás</option>
    <option value="MA" <?=$propriedade[0]->ufpropriedade=="MA"?"selected":""?>>Maranhão</option>
    <option value="MT" <?=$propriedade[0]->ufpropriedade=="MT"?"selected":""?>>Mato Grosso</option>
    <option value="MS" <?=$propriedade[0]->ufpropriedade=="MS"?"selected":""?>>Mato Grosso do Sul</option>
    <option value="MG" <?=$propriedade[0]->ufpropriedade=="MG"?"selected":""?>>Minas Gerais</option>
    <option value="PA" <?=$propriedade[0]->ufpropriedade=="PA"?"selected":""?>>Pará</option>
    <option value="PB" <?=$propriedade[0]->ufpropriedade=="PB"?"selected":""?>>Paraíba</option>
    <option value="PR" <?=$propriedade[0]->ufpropriedade=="PR"?"selected":""?>>Paraná</option>
    <option value="PE" <?=$propriedade[0]->ufpropriedade=="PE"?"selected":""?>>Pernambuco</option>
    <option value="PI" <?=$propriedade[0]->ufpropriedade=="PI"?"selected":""?>>Piauí</option>
    <option value="RJ" <?=$propriedade[0]->ufpropriedade=="RJ"?"selected":""?>>Rio de Janeiro</option>
    <option value="RN" <?=$propriedade[0]->ufpropriedade=="RN"?"selected":""?>>Rio Grande do Norte</option>
    <option value="RS" <?=$propriedade[0]->ufpropriedade=="RS"?"selected":""?>>Rio Grande do Sul</option>
    <option value="RO" <?=$propriedade[0]->ufpropriedade=="RO"?"selected":""?>>Rondônia</option>
    <option value="RR" <?=$propriedade[0]->ufpropriedade=="RR"?"selected":""?>>Roraima</option>
    <option value="SC" <?=$propriedade[0]->ufpropriedade=="SC"?"selected":""?>>Santa Catarina</option>
    <option value="SP" <?=$propriedade[0]->ufpropriedade=="SP"?"selected":""?>>São Paulo</option>
    <option value="SE" <?=$propriedade[0]->ufpropriedade=="SE"?"selected":""?>>Sergipe</option>
    <option value="TO" <?=$propriedade[0]->ufpropriedade=="TO"?"selected":""?>>Tocantins</option>
   
</select>
  </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>