<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>cadastro/listar_cadastro">
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
<h1 class="h2">Cadastro - Cliente/Fornecedor</h1>
<form method="post" action="<?=base_url()?>cadastro/salvar_cadastro">
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="input">Nome</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome completo" name="nome" required>
  </div>
  <div class="form-group col-md-12">
    <label for="input">Endereço</label>
    <input type="text" class="form-control rua" id="endereco" placeholder="Rua/AV/Travessa..." name="endereco" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">Setor</label>
    <input type="text" class="form-control bairro" id="bairro" placeholder="Setor" name="bairro" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">Município</label>
    <input type="text" class="form-control cidade" id="municipio" placeholder="Município" name="municipio" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">UF</label>
   
    <select id="uf" name="uf" class="form-control"  placeholder="UF" required>
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
  <div class="form-group col-md-3">
    <label for="input">CEP</label>
    <input type="text" class="form-control cep" id="cep" placeholder="CEP" name="cep" required>
  </div>
    <div class="form-group col-md-6">
      <label for="fonefixo">Fone Fixo</label>
      <input type="text" class="form-control phone_with_ddd" id="fixo" placeholder="Fone Fixo" name="fixo" required>
    </div>
    <div class="form-group col-md-6">
      <label for="celular">Celular</label>
      <input type="text" class="form-control phone_with_ddd" id="celular" placeholder="Celular" name="celular" required>
    </div>
    <div class="form-group col-md-6">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control cpf" id="cpf" placeholder="CPF" name="cpf" >
    </div>
    <div class="form-group col-md-6">
      <label for="cnpj">CNPJ</label>
      <input type="text" class="form-control cnpj" id="cnpj" placeholder="CNPJ" name="cnpj" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="Propriedade">Tipo de Cadastro</label>
      <select id="tipo" name="tipo" class="form-control"  required>
    <option value="Cliente">Cliente</option>
    <option value="Fornecedor">Fornecedor</option>
    </select>     

      </div>
    <div class="form-group col-md-12">
      <label for="Propriedade">Observação</label>
      
      <textarea class="form-control" id="observacao" name="observacao" rows="4" cols="50">
        
      </textarea>
  </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>
<div style="height:100px;">
</div>
<script>
$(document).ready(function(){
  $('.date').mask('11/11/1111');
  $('.time').mask('00:00:00');
  $('.date_time').mask('99/99/9999 00:00:00');
  $('.cep').mask('99999-999');
  $('.cpf').mask('999.999.999-99');
  $('.cnpj').mask('99.999.999/9999-99');
  $('.phone').mask('9999-9999');
  $('.phone_with_ddd').mask('(99) 99999-9999');
  $('.phone_us').mask('(999) 999-9999');
  $('.mixed').mask('AAA 000-S0S');
  function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...");
                        $("#bairro").val("...");
                        $("#municipio").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#municipio").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                //limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        //limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

</Script>