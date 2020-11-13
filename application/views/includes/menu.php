<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SisControle</a>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      -->
      <div class="text-white">
      <?php echo "Logado: ". $this->session->userdata('nome');?>
           
      </div>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="<?= base_url(); ?>dashboard/logout">Sair</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url(); ?>dashboard">
              <span data-feather="home"></span>
              Home <span class="sr-only">(atual)</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>produto/listar_cadastro">
              <span data-feather="shopping-cart" class="text-primary"></span>
              Produtos
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>animal/listar_cadastro">
              <span data-feather="award" class="text-info"></span>
              Animal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>cadastro/listar_cadastro">

              <span data-feather="users" class="text-info"></span>
              Cadastros
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>botijao/listar_cadastro">
              <span data-feather="archive" class="text-primary"></span>
              Botijão
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>usuario/listar_usuario">
              <span data-feather="user-plus" class="text-primary"></span>
              Usuários
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>propriedade/listar_cadastro">
              <span data-feather="sliders" class="text-primary"></span>
              Propriedade
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="text-info"></span>
              Relatórios
            </a>
          </li> -->

        </ul>

        <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Relatórios salvos</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6> -->
       <!-- <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Neste mês
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Último trimestre
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Engajamento social
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Vendas do final de ano
            </a>
          </li>
        </ul> -->
      </div>
    </nav>
