<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<br>
<br>
<div>
  <div class="h3 text-center">PESQUISAR HISTÓRICO</div>

<div class='row'>
  <div class="col-md-6">
    <label for="select">Botijão</label>
   
    <select name="pesquisar" id="pesquisar" class="form-control">
      <option value="01">001</option>
      <option value="02">002</option>
      <option>003</option>
    </select>

  </div>

</div>
<div class="row">
<div class="col-md-6 text-right"> 
  <label for="select"></label>
     <button style="margin-top:10px;" type="" onclick="pesquisar();" id="btn_pesquisar" class="btn btn-success">Pesquisar</button>
    </div>
</div>

<div class="container" >
<table id="historico" class="table table-responsive">
</table>
</div>
</div>


<script type="text/javascript">

$(document).ready(function(){


  pesquisar=function(){

  
  valor = $("#pesquisar option:selected").val();
  alert(valor);
  $.ajax({
        url:'<?= base_url();?>relatorio/historico',
        type:'POST',
        dataType:'HTML',
        data: {id:valor},
        success: function(data){
         if(data!=""){
          $("#historico").html("");
          $("#historico").html(data);
        }else{
          $("#historico").html("<tr><td>Retornou vazio!</td></tr");
        }
        },error:function(data){
            alert(data);
        },
      });
  }
});


</script>