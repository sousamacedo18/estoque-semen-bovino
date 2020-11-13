<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>usuario/listar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Lista de Usuários
                </button>
                </a>
                </div>
                <div class="btn-group mr-2">
                <a  href="<?=base_url();?>usuario/cadastrar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Novo Cadastro</button>
                </a>
                </div>
                <div class="btn-group mr-2">
              
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>
                </div>
            </div>
          </div>
<div>
  <h1 class="h2">Alterar Cadastro de Usuário</h1>
<form method="post" action="<?=base_url()?>usuario/update_usuario">
<input type="hidden" id="idusuario" name="idusuario" value="<?=$usuario[0]->idusuario?>">
  <div class="form-row">
  <div class="form-group col-md-12">
    <label for="input">Nome</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome completo" name="nome" required value="<?=$usuario[0]->nomeusuario?>">
  </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required value="<?=$usuario[0]->emailusuario?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Senha</label>
      <input type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#modalExemplo" value="Atualizar Senha">
    </div>
  </div>


  <button type="submit" class="btn btn-success" >Salvar</button>

</form>

</div>

<div class="modal" tabindex="-1" role="dialog" id="modalExemplo">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alterar Senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?=base_url()?>usuario/salvar_senha" method="post">
      <div class="modal-body">
      
      <input type="hidden" id="idusuario" name="idusuario" value="<?=$usuario[0]->idusuario?>">
                  <div class="form-group col-md-12 form-group">
                    <label for="inputPassword4">Senha Antiga</label>
                    <input type="password" class="form-control" id="senhaantiga" placeholder="Senha" name="senhaantiga" required>
                  </div>
                  <div class="form-group col-md-12 form-group">
                    <label for="inputPassword4">Nova Senha</label>
                    <input type="password" class="form-control" id="novasenha"  placeholder="Senha" name="novasenha" required>
                  </div>
                  <div class="form-group col-md-12 form-group">
                    <label for="inputPassword4">Repetir Senha</label>
                    <input type="password" class="form-control" id="repetirsenha"  placeholder="Senha" name="repetirsenha" required>
                  </div>
                  <div id="divcheck" class="form-group col-md-12 form-group">
                  </div>
    
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"  id="enviarsenha" disabled >Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
 
    var checarSenha = function () {
   
      var password = $("#novasenha").val();
      var confirmPassword = $("#repetirsenha").val();
      if(password=='' || confirmPassword==''){
        $("#divcheck").html("<span style='color: red'>Campos de senha vazios!</span>");
       document.getElementById("enviarsenha").disabled = true;
      }
      else if (password != confirmPassword)  {
        $("#divcheck").html("<span style='color: red'>Senhas não conferem!</span>");
       document.getElementById("enviarsenha").disabled = true;
      } else {
       $("#divcheck").html("<span style='color: green'>Senhas Iguais!</span>");
       document.getElementById("enviarsenha").disabled = false;
      }
    }
    $("#novasenha").keyup(checarSenha);
    $("#repetirsenha").keyup(checarSenha);
 
  });
</script> 