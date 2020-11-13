

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3 class="h4 text-danger">Estoque de Sêmem Bovino</h3>
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
      
               
     
                <a href="<?=base_url();?>botijao/listar_cadastro">
                <button class="btn btn-sm btn-outline-secondary">Botijões</button>
                </a>
     
                <a target="_blank" href="<?=base_url();?>relatorio/pdf">
              
                <button class="btn btn-sm btn-outline-secondary" >Relatórios</button>
                </a>
              </div>
    
   
            </div>
          </div>
          <?php echo $rederizar_dados[0];?>
          <div>
         


<script type="text/javascript">
$(document).ready(function(){

  addestoque=function(valor){
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalhoJson',
        type:'POST',
        data: {id:valor},
        dataType:'json',
        success: function(data){
          
          $("#canecaestoque").html(data[0].estcaneca);
          $("#nome").html(data[0].nome);
          $("#animalestoque").html(data[0].nomeanimal);
          $("#codigoestoque").html(data[0].estcodigo);
          $("#tipoestoque").html(data[0].esttipo);
          $("#estanterior").val(data[0].qtde);
          $("#idauxadd").val(data[0].idestoque);
          $("#qtdearmazenada").html(data[0].qtde);
         
        },error:function(data){
            alert(data);
        },
      });
  }
  sairestoque=function(valor){
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalhoJson',
        type:'POST',
        data: {id:valor},
        dataType:'json',
        success: function(data){
          
          $("#canecaestoquesai").html(data[0].estcaneca);
          $("#nomesai").html(data[0].nome);
          $("#animalestoquesai").html(data[0].nomeanimal);
          $("#codigoestoquesai").html(data[0].estcodigo);
          $("#tipoestoquesai").html(data[0].esttipo);
          $("#estanteriorsai").val(data[0].qtde);
          $("#idauxsai").val(data[0].idestoque);
         
        },error:function(data){
            alert(data);
        },
      });
  }
  transferencia=function(valor){
    
    $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalhoJson',
        type:'POST',
        data: {id:valor},
        dataType:'json',
        success: function(data){
          
          $("#canecaestoquetra").html(data[0].estcaneca);
          $("#nometra").html(data[0].nome);
          $("#animalestoquetra").html(data[0].nomeanimal);
          $("#codigoestoquetra").html(data[0].estcodigo);
          $("#tipoestoquetra").html(data[0].esttipo);
          $("#estanteriortra").val(data[0].qtde);
          $("#idauxtra").val(data[0].idestoque);
         
        },error:function(data){
            alert(data);
        },
      });
      $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        success: function(data){
        
           $("#slc_botijao").html(data);
        },error:function(data){
            alert(data);
        },
      });
  }
  movimentacao=function(valor,qtde){
     
      $.ajax({
        url:'<?= base_url();?>botijao/movimentacao',
        type:'POST',
        data: {id:valor},
        success: function(data){
          
           $("#tabmov tbody").html(data);
           $("#tabmov tfoot").html("<tr class=text-success><td colspan=7><b>Estoque Atual:<span class=text-danger>"+qtde+"</span></b></td></tr>");
        },error:function(data){
            alert(data);
        },
      });

      $.ajax({
        url:'<?= base_url();?>botijao/estoquecabecalho',
        type:'POST',
        data: {id:valor},
        dataType: 'html',
        success: function(data){
          
           $("#cabecalho").html(data);
        },error:function(data){
            alert(data);
        },
      });
    }


    
  $("#slc_botijao").change(function(){
    var valor;
    valor = $("#slc_botijao option:selected").val();
     
      $.ajax({
        url:'<?= base_url();?>botijao/montarcanecas',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#tbl_canecas").html(data);
        },error:function(data){
            alert(data);
        },
      });
  });
  

  $("#idforadd").change(function(){
    var valor;
    valor = $("#idforadd option:selected").val();
     
      $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoesFornecedor',
        type:'POST',
        data: {id:valor},
        success: function(data){
           $("#tbl_botijoes").html(data);
        },error:function(data){
            alert(data);
        },
      });


  });

  $("#caneca").change(function(){
    $('#btnSalvarZero').prop('disabled', false);
    $('#animal').removeAttr('disabled');
    var idestoque,num_caneca,cpxmaxcaneca,calc_caneca,qt,idanimal;
    qt=0;
    idestbotijao = $("#idestbotijaoaux").val();
    cpxmaxcaneca = $("#cpxcaneca").val();
    num_caneca = $("#caneca option:selected").val();
 
     if(num_caneca>0){
      $.ajax({
        url:'<?= base_url();?>botijao/verificar_espaco_caneca',
        type:'POST',
        datatype: 'JSON',
        data: {idestbotijao:idestbotijao,num_caneca:num_caneca},
        success: function(data){
          
          var dados=data;
     
          var linha=dados.length;
       
          if(linha>0){
           
           for (var i = 0;linha>i ; i++) {
           
                  qt=qt+parseInt(dados[i].qtde);
                  idanimal=dados[i].idestanimal;
                 
                   }
                   $('#animal').val(idanimal).change();
                 //  alert("quantidade: "+qt+" capacide maxima: "+cpxmaxcaneca);
                   if(cpxmaxcaneca==qt){
                    $('#btnSalvarZero').prop('disabled', true);
                    $('#animal').attr('disabled', 'disabled');
                    alert("Caneca sem espaço para nova armazenagem");
                  }else
                  if(cpxmaxcaneca>qt){
                    calc_caneca=cpxmaxcaneca-qt;
                    $('#btnSalvarZero').prop('disabled', false);
                    
                    alert("A caneca: "+num_caneca+" tem capacidade máxima de "+cpxmaxcaneca +" dose(s), no momento tem espaço para  "+calc_caneca +" dose(s)");
                  } 
          }
         
        },error:function(data){
            alert("erro: "+data);
        },
      });
     }else{
       alert("Você precisa escolhar um caneca");
     }

  });

  montarbotijao=function(){
    $.ajax({
        url:'<?= base_url();?>botijao/montarbotijoes',
        type:'POST',
        data: {id:valor},
        success: function(data){
          alert(data);
           $("#slc_botijao").html(data);
        },error:function(data){
            alert(data);
        },
      });
  }

  });
      





</script>