<style>

label{
  display: flex;

  font-family: Arial, Arial, Helvetica, sans-serif;
  font-size:13px;
 


}
input[type='checkbox']{
  position:relative;
  top:0;
  width: 40px;
  height: 40px;
  -webkit-appearance:none; 
  outline: none;
  transition: 0.5s ;
}
input[type='checkbox']::before{
  content: '';
  position: absolute;
  top:0;
  left: 0;
  height: 40%;
  width: 40%;
  border: 2px solid black;
  box-sizing: border-box;
  transition: 0.5s;

}
input:checked[type='checkbox']::before{
  border-left:none;
  border-top:none;
  width: 12px;
  transform: rotate(38deg) translate(5px, -10px);
  border-color:green;
  transition: 0.5s;
}
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <a href="#">
                    <span data-feather="chevron-left" class="text-primary " onclick="goBack()"></span>
                  </a>
            <h1 class="h2">Definir Acesso ao Sistema</h1>
           
             <div class="btn-toolbar mb-2 mb-md-0">

              <div class="btn-group mr-2">
              <!-- <a  href="<?=base_url();?>usuario/listar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Lista de Usuários
                </button>
                </a> -->
  
              </div>

              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
            </div>
          </div>
    <div style="margin-bottom:50px">
  <h5>Alterar Nível de Acesso para o usuário: <span class="text-success" ><?=$acesso[0]->nomeusuario;?></span> </h5>
<form method="post" action="<?=base_url()?>usuario/update_acesso">
  <div class="form-row">
  <table class="table table-hover">
  <tr class="bg-primary text-light">
    <th>Modulo</th>
    <th>Visualização/Leitura</th>
    <th>Criar Novo Cadastro</th>
    <th>Alterar Dados</th>
    <th>Excluír Dados</th>
  </tr>
  <tr>
    <td>Produtos</td>
    <td><label><input type="checkbox" name="visualizar1" id="visualizar"<?=$acesso[0]->visualizar=="S"?"Checked=checked":""?> >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar1" id="cadastrar"<?=$acesso[0]->cadastrar=="S"?"Checked=checked":""?>   >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar1" id="alterar" <?=$acesso[0]->alterar=="S"?"Checked=checked":""?>  >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir1" id="excluir" <?=$acesso[0]->excluir=="S"?"Checked=checked":""?>  >Excluír</label></td>
  </tr>
  <tr>
    <td>Animal</td>
    <td><label><input type="checkbox" name="visualizar2" id="visualizar" <?=$acesso[1]->visualizar=="S"?"Checked=checked":""?>  >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar2" id="cadastrar" <?=$acesso[1]->cadastrar=="S"?"Checked=checked":""?> >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar2" id="alterar" <?=$acesso[1]->alterar=="S"?"Checked=checked":""?> >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir2" id="excluir"<?=$acesso[1]->excluir=="S"?"Checked=checked":""?>   >Excluír</label></td>
  </tr>
  <tr>
    <td>Cliente/Fornecedores</td>
    <td><label><input type="checkbox" name="visualizar3" id="visualizar" <?=$acesso[2]->visualizar=="S"?"Checked=checked":""?>  >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar3" id="cadastrar" <?=$acesso[2]->cadastrar=="S"?"Checked=checked":""?>  >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar3" id="alterar" <?=$acesso[2]->alterar=="S"?"Checked=checked":""?>  >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir3" id="excluir" <?=$acesso[2]->excluir=="S"?"Checked=checked":""?>  >Excluír</label></td>
  </tr>
  <tr>
    <td>Botijão</td>
    <td><label><input type="checkbox" name="visualizar4" id="visualizar" <?=$acesso[3]->visualizar=="S"?"Checked=checked":""?> >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar4" id="cadastrar" <?=$acesso[3]->cadastrar=="S"?"Checked=checked":""?>  >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar4" id="alterar" <?=$acesso[3]->alterar=="S"?"Checked=checked":""?>  >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir4" id="excluir" <?=$acesso[3]->excluir=="S"?"Checked=checked":""?>  >Excluír</label></td>
  </tr>
  <tr>
    <td>Usuário</td>
    <td><label><input type="checkbox" name="visualizar5" id="visualizar" <?=$acesso[4]->visualizar=="S"?"Checked=checked":""?>  >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar5" id="cadastrar" <?=$acesso[4]->cadastrar=="S"?"Checked=checked":""?> >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar5" id="alterar" <?=$acesso[4]->alterar=="S"?"Checked=checked":""?> >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir5" id="excluir" <?=$acesso[4]->excluir=="S"?"Checked=checked":""?>   >Excluír</label></td>
  </tr>
  <tr>
    <td>Acesso</td>
    <td><label><input type="checkbox" name="visualizar6" id="visualizar" <?=$acesso[5]->visualizar=="S"?"Checked=checked":""?> >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar6" id="cadastrar" <?=$acesso[5]->cadastrar=="S"?"Checked=checked":""?>  >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar6" id="alterar" <?=$acesso[5]->alterar=="S"?"Checked=checked":""?>  >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir6" id="excluir" <?=$acesso[5]->excluir=="S"?"Checked=checked":""?>  >Excluír</label></td>
  </tr>
  <tr>
    <td>Propriedade</td>
    <td><label><input type="checkbox" name="visualizar7" id="visualizar" <?=$acesso[6]->visualizar=="S"?"Checked=checked":""?>  >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar7" id="cadastrar" <?=$acesso[6]->cadastrar=="S"?"Checked=checked":""?>   >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar7" id="alterar" <?=$acesso[6]->alterar=="S"?"Checked=checked":""?>  >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir7" id="excluir" <?=$acesso[6]->excluir=="S"?"Checked=checked":""?> >Excluír</label></td>
  </tr>
  <tr>
    <td>Relatórios</td>
    <td><label><input type="checkbox" name="visualizar8" id="visualizar" <?=$acesso[7]->visualizar=="S"?"Checked=checked":""?>  >Visualizar</label></td>
    <td><label><input type="checkbox" name="cadastrar8" id="cadastrar" <?=$acesso[7]->cadastrar=="S"?"Checked=checked":""?>  >Cadastrar</label></td>
    <td><label><input type="checkbox" name="alterar8" id="alterar" <?=$acesso[7]->alterar=="S"?"Checked=checked":""?> >Alterar</label></td>
    <td><label><input type="checkbox" name="excluir8" id="excluir" <?=$acesso[7]->excluir=="S"?"Checked=checked":""?>   >Excluír</label></td>
  </tr>
</table>
  </div>

  <input type="hidden" name="idusuario" value="<?= $acesso[0]->idusuario;?>">
  <button type="submit" class="btn btn-success">Alterar</button>

</form>

</div>
<script>
function goBack() {
  window.history.back();
}
</script>