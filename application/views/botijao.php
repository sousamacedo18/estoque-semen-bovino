<main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2 text-primary">Cadastro de Botijão</h1>
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Lista de Botijão
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


<form method="post" action="<?=base_url()?>botijao/salvar_cadastro">

  <div class="form-row">

  <div class="form-group col-md-6">
    <label for="input">Nome Botijão</label>
    <input type="text" class="form-control" id="nomebotijao" placeholder="Nome Botijão" name="nomebotijao" required>
  </div>

  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
  <label for="input">Proprietário</label>
    <select id="idcliente" name="idcliente" class="form-control"   required>
    <option value=""></option>
    <?php
    if (sizeof($cadastro)>0){
    foreach($cadastro as $cad) {
    ?>
    <option  value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
    <?php
    }
  }
    ?>
    </select>
  </div>
  </div>
  <div class="form-row">
  <div class="div_sumir form-group col-md-6" >
  <label for="input">Propriedade</label>
    <select id="idpropriedade" name="idpropriedade" class="form-control"   required>

    </select>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="input">Observações</label>
  
    <textarea rows="5" class="form-control" name="obsbotijao" id="obsbotijao">

    </textarea>
  </div>
  </div>

  </div>
  <button type="submit" class="btn btn-success">Salvar</button> 
</form>
<div style="height:100px;">
</div>
</div>
</main>
<script type="text/javascript">
$(document).ready(function(){
  var valor;
  $("#idcliente").change(function(){
    
    valor = $("#idcliente option:selected").val();
     
      $.ajax({
        url:'<?= base_url();?>propriedade/listadinamica',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#idpropriedade").html(data);
        },error:function(data){
            alert(data);
        },
      });


  });

  // $("#tipobotijao").change(function(){
    
  //   valor = $("#tipobotijao option:selected").val();
  //    if(valor==2 || valor==3){
  //     $(".div_sumir").hide("slow");
  //    }else if(valor==1){
  //     $(".div_sumir").show(1000);
  //    }


  // });


});
</script>