<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Carlos Henrique Sousa de Macedo">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cadastro de Empresa</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    
  </head>

  <body >


 <div class="container" style="padding: 10px;">
   
    <form method="post" action="<?=base_url()?>dashboard/salvar_cadastro">
    <h4 class="text-danger">CADASTRO DE EMPRESA</h4>
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="input">Nome Empresa</label>
    <input type="text" class="form-control" id="nome" placeholder="Nome Empresa" name="nome" required>
  </div>
  <div class="form-group col-md-12">
    <label for="input">Endereço</label>
    <input type="text" class="form-control" id="endereco" placeholder="Rua/Av./Travessa..." name="endereco" required>
  </div>
  <div class="form-group col-md-6">
    <label for="input">Setor</label>
    <input type="text" class="form-control" id="setor" placeholder="Setor" name="setor" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">Município</label>
    <input type="text" class="form-control" id="municipio" placeholder="Município" name="municipio" required>
  </div>
  <div class="form-group col-md-3">
    <label for="input">UF</label>
   
    <select id="uf" name="uf" class="form-control"  placeholder="UF" required>
    <option value="">...</option>
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
    <div class="form-group col-md-6">
      <label for="fonefixo">Fone Fixo</label>
      <input type="text" class="form-control" id="fixo" placeholder="Fone Fixo" name="fixo" required>
    </div>
    <div class="form-group col-md-6">
      <label for="celular">Celular</label>
      <input type="text" class="form-control phone_with_ddd"  id="sp_celphones" placeholder="Celular" name="celular" required>
    </div>
    <div class="form-group col-md-6">
      <label for="cnpj">CNPJ/CPF</label>
      <input type="text" class="form-control" id="cnpj_cpf" placeholder="CNPJ ou CPF" name="cnpj_cpf" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Responsável</label>
      <input type="text" class="form-control" id="responsavel" placeholder="Responsável" name="responsavel" required>
    </div>

    <div class="form-group col-md-12">
      <label for="Propriedade">Observação</label>
      
      <textarea class="form-control" id="observacao" name="observacao" rows="4" cols="50">
        
      </textarea>
  </div>
  </div>


  <button type="submit" class="btn btn-lg btn-success">Salvar</button>

</form>
 </div>

</div>
<div style="height:100px;">
</div>
  </body>
</html>
<script>
  $(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

var options =  {
  onComplete: function(cep) {
    alert('CEP Completed!:' + cep);
  },
  onKeyPress: function(cep, event, currentField, options){
    console.log('A key was pressed!:', cep, ' event: ', event,
                'currentField: ', currentField, ' options: ', options);
  },
  onChange: function(cep){
    console.log('cep changed! ', cep);
  },
  onInvalid: function(val, e, f, invalid, options){
    var error = invalid[0];
    console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
  }
};

$('.cep_with_callback').mask('00000-000', options);
  </Script>