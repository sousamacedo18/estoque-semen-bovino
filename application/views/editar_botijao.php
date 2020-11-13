<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Atualizar Cadastro de Botijão</h1>
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Icones
                </button>
                </a>
  
              </div>
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/mostrarlista">
                <button class="btn btn-sm btn-outline-secondary">Lista
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
<form method="post" action="<?=base_url()?>botijao/update_cadastro">
<div class="form-row">
<div class="form-group col-md-3">
    <label for="input">Status</label>

    <select class="form-control" name="statusbotijao" id="statusbotijao">
    <option value="Ativo" <?=$botijao[0]->statusbotijao=="Ativo"?"selected":"";?>>Ativo</option>
    <option value="Inativo" <?=$botijao[0]->statusbotijao=="Inativo"?"selected":"";?>>Inativo</option>
    </select>
  </div>
</div>
  <div class="form-row">
    <input type="hidden" name="id" id="id" value="<?=$botijao[0]->idbotijao;?>">

  <div class="form-group col-md-6">
    <label for="input">Nome Botijão</label>
    <input type="text" class="form-control" id="nomebotijao" placeholder="Nome Botijão" name="nomebotijao" value="<?=$botijao[0]->nomebotijao;?>" required>
  </div>
  </div>
  <div class="form-row">

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
    <option <?=$botijao[0]->idproprietario==$cad->idcadastro?'selected':''?>  value="<?=$cad->idcadastro;?>"><?=$cad->nome;?></option>
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
    <select id="idpropriedade" name="idpropriedade" class="form-control"    required>
    <option value=""></option>
    <?php
    if (sizeof($propriedade)>0){
    foreach($propriedade as $cad) {
    ?>
    <option <?=$botijao[0]->idbotpropriedade==$cad->idpropriedade?'selected':''?>  
    value="<?=$cad->idproprietario;?>"><?=$cad->nomepropriedade;?>
  </option>
    <?php
    }
  }
    ?>


    </select>
  </div>
  </div>
  <div class="form-row">

  <div class="form-group col-md-6">
    <label for="input">Observações</label>
    <textarea rows="5" class="form-control" name="obsbotijao" id="obsbotijao">
    <?=$botijao[0]->obsbotijao;?>
    </textarea>
  </div>

  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>
<script type="text/javascript">
  $("#idcliente").change(function(){
    var valor;
    valor = $("#idcliente option:selected").val();
     
      $.ajax({
        url:'<?= base_url();?>propriedade/listadinamica',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#idpropriedade").html("");
           $("#idpropriedade").html(data);
        },error:function(data){
            alert(data);
        },
      });
  });
</script>