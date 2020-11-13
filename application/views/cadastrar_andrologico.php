<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>usuario/listar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Lista Exames Andrologicos
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
<h1 class="h2">Cadastrar Exame Andrologico</h1>
<form role="form" >
              <div class="row">
                  <div class="col-xs-5">
                        <div class="form-group">
                          <label for="proprietario">Proprietário</label>
                          <select name="proprietario" id="proprietario" class="form-control">
                              
                          </select>
                        </div>
                 </div>
                 <div class="col-xs-4">
                        <div class="form-group">
                          <label for="proprietario">Propriedade</label>
                          <input type="text" class="form-control" id="propriedade" size="30" name="propriedade">
                        </div>                     
                  </div>
           
              <div class="col-xs-3">
                        <div class="form-group">
                          <label for="pwd">Fone</label>
                          <input type="fone" class="form-control" id="fone" size="15" name="fone">
                        </div>
              </div>
               <div class="col-xs-4">
                        <div class="form-group">
                           <label for="proprietario">Municipio</label>
                           <input type="text" class="form-control" id="municipio" size="15" name="municipio">
                         </div>
              </div>
          <div class="col-xs-3">
           <div class="form-group">
              <label for="estado">UF</label>
              <select class="form-control" id="uf" name="uf">
                                <option value>....</option>
                                <option value="AC">ACRE</option>
                                <option value="AL">ALAGOAS</option>
                                <option value="AM">AMAZONAS</option>
                                <option value="AP">AMAPÁ</option>
                                <option value="BA">BAHIA</option>
                                <option value="CE">CEARÁ</option>
                                <option value="DF">DISTRITO FEDERAL</option>
                                <option value="ES">ESPÍRITO SANTO</option>
                                <option value="GO">GOÍAS</option>
                                <option value="MA">MARANHÃO</option>
                                <option value="MT">MATO GROSSO</option>
                                <option value="MS">MATO GROSSO DO SUL</option>
                                <option value="MG">MINAS GERAIS</option>
                                <option value="PA">PARÁ</option>
                                <option value="PB">PARAÍBA</option>
                                <option value="PR">PARANÁ</option>
                                <option value="PE">PERNAMBUCO</option>
                                <option value="PI">PIAUÍ</option>
                                <option value="RJ">RIO DE JANEIRO</option>
                                <option value="RN">RIO GRANDE DO NORTE</option>
                                <option value="RO">RONDÔNIA</option>
                                <option value="RS">RIO GRANDE DO SUL</option>
                                <option value="RR">RORAIMA</option>
                                <option value="SC">SANTA CATARINA</option>
                                <option value="SE">SERGIPE</option>
                                <option value="SP">SÃO PAULO</option>
                                <option value="TO">TOCANTINS</option>
            </select>
            </div>
            </div>
            </div><!--fim do row-->
              <div class="row">
            <div class="col-xs-3">
                                <div class="form-group">
                                <label for="data">Data Exame</label>
                                <input type="date" class="form-control" id="dtExame" name="dtExame">
                                </div>
            </div>
                   <div class="col-xs-5">
                                <div class="form-group">
                                <label for="coletor">Coletador</label>
                                <input type="text" class="form-control" id="coletador" value="Dr. Andre Luiz Mancini Carreira" size="30" name="coletador">
                                </div>
                   </div>
            </div>
            <div class="row">
                <div class="col-xs-3">
                                <div class="form-group">
                                <label for="animal">Animal</label>
                                <input type="text" class="form-control" id="animal" size="12" name="animal">
                                </div>
                </div>
           <div class="col-xs-3">
                                <div class="form-group">
                                <label for="animal">Raça</label>
                                <input type="text" class="form-control" id="raca" size="12" name="raca">
                                </div>
           </div>
           <div class="col-xs-3">
                                <div class="form-group">
                                <label for="filiacao">Filiação</label>
                                <input type="text" class="form-control" id="filiacao" size="12" name="filiacao">
                                </div>
           </div>
          <div class="col-xs-3">
                                <div class="form-group">
                                <label for="rg">RG</label>
                                <input type="text" class="form-control" id="rg" size="12" name="rg">
                                </div>
          </div>
          </div>
          <div class="row">
          <div class="col-xs-3">  
                                <div class="form-group">
                                <label for="avo">Avô</label>
                                <input type="text" class="form-control" id="avo" size="12" name="avo">
                                </div>
          </div>
          <div class="col-xs-3"> 
                                <div class="form-group">
                                <label for="peso">Peso</label>
                                <input type="text" class="form-control" id="peso" size="12" name="peso">
                                </div>
          </div>
         <div class="col-xs-3"> 
                                <div class="form-group">
                                <label for="idade">Idade</label>
                                <input type="text" class="form-control" id="idade" size="12" name="idade">
                               </div>
         </div>
         <div class="col-xs-6"> 
                                    <div class="form-group">
                                    <label for="historico_anamnese">HISTÓRICO E ANAMNESE</label>
                                    <input type="text" class="form-control" id="historico_anamnese" size="50" value="Animal em bom estado corporal. Nenhuma anormalidade" name="historico_anamnese">
                                    </div>
         </div>
        <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="condicao_corporal">Condição Corporal</label>
                                    <input type="text" class="form-control" id="condicao_corporal" maxlength="5" name="condicao_corporal">
                                    </div>
        </div>
       <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="regime_alimentar">Regime Alimentar</label>
                                    <input type="text" class="form-control" id="regime_alimentar" size="8" value="Pastagem" name="regime_alimentar">
                                    </div>
       </div>
       </div>
       <div class="row"> 
       <div class="col-xs-4"> 
                                    <div class="form-group">
                                    <label for="comportamento_sexual">COMPORTAMENTO SEXUAL</label>
                                    <input type="text" class="form-control" id="comportamento_sexual" size="15" value="Não Avaliado" name="comportamento_sexual">
                                    </div>
       </div>
       <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="especie">ESPÉCIE</label>
                                    <input type="text" class="form-control" id="especie" size="10" value="Bovino" name="especie">
                                    </div>
       </div>
       <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="aprumos">APRUMOS</label>
                                    <input type="text" class="form-control" id="aprumos" size="30" value="Corretos,cascos integros" name="aprumos">
                                    </div>
       </div>
       <div class="col-xs-2">          
                                    <div class="form-group">
                                    <label for="prepurcio">PREPÚCIO</label>
                                    <input type="text" class="form-control" id="prepurcio" size="10" value="Normal" name="prepurcio">
                                    </div>
       </div>
       <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="penis">PÉNIS</label>
                                    <input type="text" class="form-control" id="penis" size="10" value="Normal" name="penis">
                                    </div>
       </div>
       <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="epidimo">EPIDÍMO</label>
                                    <input type="text" class="form-control" id="epidimo" size="10" value="Normal" name="epidimo">
                                    </div>
       </div>
      <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="cord_espermatico">CORD. ESPERMÁTICO</label>
                                    <input type="text" class="form-control" id="cord_espermatico" size="10" value="Normal" name="cord_espermatico">
                                    </div>
      </div>
     <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="grand_vesiculares">GRAND. VESICULARES</label>
                                    <input type="text" class="form-control" id="grand_vesiculares" size="10" value="Normal" name="grand_vesiculares">
                                    </div>
     </div>
     </div>
     <div class="row">
     <div class="col-xs-3"> 
                                <div class="form-group">
                                <label for="escroto">ESCROTO</label>
                                <input type="text" class="form-control" id="escroto" size="10" value="Normal" name="escroto">
                                </div>
     </div>
     <div class="col-xs-3"> 
                                <div class="form-group">
                                <label for="test_te">TEST.TE</label>
                                <input type="text" class="form-control" id="test_te" size="8" name="test_te">
                                </div>
     </div>
    <div class="col-xs-3"> 
                                <div class="form-group">
                                <label for="td">TD</label>
                                <input type="text" class="form-control" id="td" size="8" name="td">
                                </div>
    </div>
    <div class="col-xs-2"> 
                                    <div class="form-group">
                                    <label for="ce">CE</label>
                                    <input type="number" class="form-control" id="ce" name="ce">
                                    </div>
    </div>
     </div>
     <div class="row">
    <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="metodo_coleta">Método de coleta</label>
                                    <input type="text" class="form-control" id="metodo_coleta" size="12" value="Eletroejaculador" name="metodo_coleta">
                                    </div>
    </div>
    <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="numero_coleta">Número de coleta</label>
                                    <input type="text" class="form-control" id="numero_coleta" size="10" value="1 coleta" name="numero_coleta">
                                    </div>
    </div>
    <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="data_coleta">Data da Coleta</label>
                                    <?php $hoje= date("Y-m-d")?>
                                    <input type="date"  class="form-control" id="data_coleta" name="data_coleta" value="<?php echo $hoje?>"  >
                                    
                                    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-xs-10"> 
                                    <div class="form-group">
                                    <label for="observacao">Observacão</label>
                                    <input type="text" class="form-control" id="observacao" name="observacao">
                                    </div>
        </div>
    </div>
  <div class="row">
      <div class="col-xs-1">             
                                    <div class="form-group">
                                    <label for="volume">Volume</label>
                                    <input type="text" class="form-control" id="volume" size="2" name="volume">
                                    </div>
      </div>
     <div class="col-xs-1"> 
                                    <div class="form-group">
                                    <label for="turbilh">Turbilh</label>
                                    <input type="text" class="form-control" id="turbilh" value="1" size="2" name="turbilh">
                                    </div>
     </div> 
    <div class="col-xs-1"> 
                                    <div class="form-group">
                                    <label for="motilidade">Motilidade</label>
                                    <input type="text" class="form-control" id="motilidade" value="1" size="2" name="motilidade">
                                    </div>
    </div>
   <div class="col-xs-2"> 
                                    <div class="form-group">
                                    <label for="vigor">Vigor(0-5)</label>
                                    <input type="number" class="form-control" id="vigor" min="0" max="5" name="vigor">
                                    </div>
   </div>
  <div class="col-xs-2"> 
                                    <div class="form-group">
                                    <label for="concentracao">Concentração</label>
                                    
                                    <select name="concentracao" id="concentracao" class="form-control">
                                        <option value="">...</option>
                                        <option value="Pouca">Pouca</option>
                                        <option value="Média">Média</option>
                                        <option value="Alta">Alta</option>
                                    </select>
                                    </div>
  </div>
  </div>
  <div class="row">
  <div class="col-xs-3"> 
                                    <div class="form-group">
                                    <label for="defeitos_maiores">Defeitos Maiores</label>
                                    <input type="number" class="form-control" id="defeitos_maiores"  min="0" max="10" name="defeitos_maiores">
                                    </div>
  </div>
  <div class="col-xs-3">     
                                    <div class="form-group">
                                    <label for="defeitos_menores">Defeitos Menores</label>
                                    <input type="number" class="form-control" id="defeitos_menores"  min="0" max="10" name="defeitos_menores" >
                                    </div>
  </div>
  </div>
<div class="row">
<div class="col-xs-3">        
 
                                    <div class="form-group">
                                    <label for="conclusao">Conclusão</label>
                                    <select class="form-control" name="conclusao" id="conclusao" >
                                        <option value="APTO">APTO</option>
                                        <option value="INAPTO">INAPTO</option>  
                                    </select>
                                   </div>
</div>
</div>
<div class="row">
    <div class="col-xs-5">   
                                <div class="form-group">
                                <label for="assinatura">Quem vai Assinar</label>
                                <input type="text" class="form-control" name="assinatura" id="assinatura" value="Dr. André Luiz Mancini Carreira" size="30">
                                </div>
    </div>
</div>
<div class="row">
<div class="col-xs-3">   
               <div class="form-group">
               <label for="crmv">CRMV</label>
               <input type="text" class="form-control" name="crmv" id="crmv" value="CRMV - 0157 - TO" size="20">
               </div>
</div>
<div class="col-xs-3">   
                            <div class="form-group">
                           <label for="crmv">DATA ASSINATURA</label>
                           <input type="date" class="form-control" name="dtassinatura" id="dtassinatura">
                            </div>              
</div>
</div>
</div>
</main>

<script type="text/javascript">
      $(document).ready(function(){
    $(function() {
        $.mask.definitions['~'] = "[+-]";
        $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy",completed:function(){alert("completed!");}});
        $(".phone").mask("(999) 999-9999");
        $("#phoneExt").mask("(999) 999-9999? x99999");
        $("#iphone").mask("+33 999 999 999");
        $("#tin").mask("99-9999999");
        $("#ssn").mask("999-99-9999");
        $("#product").mask("a*-999-a999", { placeholder: " " });
        $("#eyescript").mask("~9.99 ~9.99 999");
        $("#po").mask("PO: aaa-999-***");
        $("#pct").mask("99%");
        $("#fone1").mask("(99) 9999-9999", { autoclear: false, completed:function(){alert("completed autoclear!");} });
        $("#fone").mask("(99) ?9999-9999", { autoclear: false });
        $("input").blur(function() {
            $("#info").html("Unmasked value: " + $(this).mask());
        }).dblclick(function() {
            $(this).unmask();
        });
    });
    $("#data_coleta").val(Date.now);
 
      });
  </script>
