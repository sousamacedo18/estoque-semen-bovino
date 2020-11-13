<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
       
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>usuario/cadastrar_usuario">
                <button class="btn btn-sm btn-outline-secondary">Novo Usuário
                </button>
                </a>
                <!-- <button class="btn btn-sm btn-outline-secondary">Exportar</button> -->
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
            </div>
          </div>
<div>
<h1 class="h4 text-danger">Lista de usuários</h1>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="3">Ação</th>
      

    </tr>
  </thead>
  <tbody>
  <?php $i=0;  foreach($usuario as $usu) {
    $i++;
    ?>

    <tr>
      <th scope="row"><?=$usu->idusuario;?></th>
      <td><?=$usu->nomeusuario;?></td>
      <td><?=$usu->emailusuario;?></td>
      <td>
      <a href="<?=base_url('usuario/atualizar_usuario/'.$usu->idusuario)?>">
        <span data-feather="edit" class="text-primary "></span>
      </a>
      </td>
      <td>
      <a href="<?=base_url('usuario/excluir_usuario/'.$usu->idusuario)?>"   onclick="return confirm('Deseja realmente excluir o cadastro?');">
      <span data-feather="trash-2" class="text-danger"></span>
      </a>
      </td>
            <td>
      <a href="<?=base_url('usuario/listar_acesso/0/'.$usu->idusuario)?>">
        <span data-feather="key" class="text-primary "></span>
      </a>
      </td>
    </tr>

  <?php }?>
  </tbody>
  <tfoot>
        <tr>
            <th scope="row">Total de cadastros:</th>
            <td colspan="5"><?=$i?></td>
        </tr>
    </tfoot>
</table>
</div>