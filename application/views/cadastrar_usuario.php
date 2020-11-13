<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
           
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>usuario/listar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Lista de Usuários
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
<h1 class="h2">Cadastro de Usuário</h1>
<form method="post" action="<?=base_url()?>usuario/salvar_usuario">
  <div class="form-row">
  <div class="form-group col-md-7">
    <label for="input">Nome</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Nome completo" name="nome" required>
  </div>
    <div class="form-group col-md-7">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" required>
    </div>
    <div class="form-group col-md-7">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha" name="senha" required>
    </div>
  </div>


  <button type="submit" class="btn btn-success">Salvar</button>

</form>

</div>