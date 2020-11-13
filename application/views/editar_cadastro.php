<?php
	function formatCnpjCpf($value)
  {
  $cnpj_cpf = preg_replace("/\D/", '', $value);
  
  if (strlen($cnpj_cpf) === 11) {
    return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } 
  
  return preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
  }
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h4">Atualizar - Cliente/Fornecedor</h1>
        
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>cadastro/listar_cadastro">
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
<form method="post" action="<?=base_url()?>cadastro/update_cadastro">
  <input type="hidden" name="id" id="id" value="<?=$cadastro[0]->idcadastro;?>">
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="input">Nome</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome completo" name="nome" required value="<?=$cadastro[0]->nome;?>">
  </div>
  <div class="form-group col-md-12">
    <label for="input">Endereço</label>
    <input type="text" class="form-control" id="endereco" placeholder="Rua/AV/Travessa..." name="endereco" required value="<?=$cadastro[0]->endereco;?>">
  </div>
  <div class="form-group col-md-3">
    <label for="input">Setor</label>
    <input type="text" class="form-control" id="bairro" placeholder="Setor" name="bairro" required value="<?=$cadastro[0]->bairro;?>">
  </div>
  <div class="form-group col-md-3">
    <label for="input">Município</label>
    <input type="text" class="form-control" id="municipio" placeholder="Município" name="municipio" required value="<?=$cadastro[0]->municipio;?>">
  </div>
  <div class="form-group col-md-3">
    <label for="input">UF</label>
   
    <select id="uf" name="uf" class="form-control"  placeholder="UF" required>
    <option <?=$cadastro[0]->uf=="AC"?'selected':''?> value="AC">Acre</option>
    <option <?=$cadastro[0]->uf=="AL"?'selected':''?> value="AL">Alagoas</option>
    <option <?=$cadastro[0]->uf=="AP"?'selected':''?> value="AP">Amapá</option>
    <option <?=$cadastro[0]->uf=="AM"?'selected':''?> value="AM">Amazonas</option>
    <option <?=$cadastro[0]->uf=="BA"?'selected':''?> value="BA">Bahia</option>
    <option <?=$cadastro[0]->uf=="CE"?'selected':''?> value="CE">Ceará</option>
    <option <?=$cadastro[0]->uf=="DF"?'selected':''?> value="DF">Distrito Federal</option>
    <option <?=$cadastro[0]->uf=="ES"?'selected':''?> value="ES">Espírito Santo</option>
    <option <?=$cadastro[0]->uf=="GO"?'selected':''?> value="GO">Goiás</option>
    <option <?=$cadastro[0]->uf=="MA"?'selected':''?> value="MA">Maranhão</option>
    <option <?=$cadastro[0]->uf=="MT"?'selected':''?> value="MT">Mato Grosso</option>
    <option <?=$cadastro[0]->uf=="MS"?'selected':''?>value="MS">Mato Grosso do Sul</option>
    <option <?=$cadastro[0]->uf=="MG"?'selected':''?> value="MG">Minas Gerais</option>
    <option <?=$cadastro[0]->uf=="PA"?'selected':''?> value="PA">Pará</option>
    <option <?=$cadastro[0]->uf=="PB"?'selected':''?> value="PB">Paraíba</option>
    <option <?=$cadastro[0]->uf=="PR"?'selected':''?> value="PR">Paraná</option>
    <option <?=$cadastro[0]->uf=="PE"?'selected':''?> value="PE">Pernambuco</option>
    <option <?=$cadastro[0]->uf=="PI"?'selected':''?> value="PI">Piauí</option>
    <option <?=$cadastro[0]->uf=="RJ"?'selected':''?> value="RJ">Rio de Janeiro</option>
    <option <?=$cadastro[0]->uf=="RN"?'selected':''?> value="RN">Rio Grande do Norte</option>
    <option <?=$cadastro[0]->uf=="RS"?'selected':''?> value="RS">Rio Grande do Sul</option>
    <option <?=$cadastro[0]->uf=="RO"?'selected':''?> value="RO">Rondônia</option>
    <option <?=$cadastro[0]->uf=="RR"?'selected':''?> value="RR">Roraima</option>
    <option <?=$cadastro[0]->uf=="SC"?'selected':''?> value="SC">Santa Catarina</option>
    <option <?=$cadastro[0]->uf=="SP"?'selected':''?> value="SP">São Paulo</option>
    <option <?=$cadastro[0]->uf=="SE"?'selected':''?> value="SE">Sergipe</option>
    <option <?=$cadastro[0]->uf=="TO"?'selected':''?>  value="TO">Tocantins</option>
   
</select>
  </div>
  <div class="form-group col-md-3">
    <label for="input">CEP</label>
    <input type="text" class="form-control" id="cep" placeholder="CEP" name="cep" required value="<?=$cadastro[0]->cep;?>">
  </div>
    <div class="form-group col-md-6">
      <label for="fonefixo">Fone Fixo</label>
      <input type="text" class="form-control" id="fixo" placeholder="Fone Fixo" name="fixo" required value="<?=$cadastro[0]->fixo;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="celular">Celular</label>
      <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" required value="<?=$cadastro[0]->celular;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" placeholder="CPF" name="cpf" value="<?=formatCnpjCpf($cadastro[0]->cpf);?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="cnpj">CNPJ</label>
      <input type="text" class="form-control" id="cnpj" placeholder="CNPJ" name="cnpj" value="<?=$cadastro[0]->cnpj;?>" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Email" name="email" required value="<?=$cadastro[0]->email;?>">
    </div>
    <div class="form-group col-md-6">
      <label for="Propriedade">Tipo de Cadastro</label>
      <select id="tipo" name="tipo" class="form-control"  required>
    <option <?=$cadastro[0]->tipo=="Cliente"?'selected':''?> value="Cliente">Cliente</option>
    <option <?=$cadastro[0]->tipo=="Fornecedor"?'selected':''?> value="Fornecedor">Fornecedor</option>
    </select>     

      </div>
    <div class="form-group col-md-12">
      <label for="Propriedade">Observação</label>
      
      <textarea class="form-control" id="observacao" name="observacao" rows="4" cols="50">
      <?=$cadastro[0]->observacao;?>
      </textarea>
  </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>