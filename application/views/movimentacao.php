<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
      
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
              <a  href="<?=base_url();?>botijao/esc_botijao_transf/0">
                <button class="btn btn-sm btn-outline-secondary">Movimentações
                </button>
                </a>
  
              </div>
              <!-- <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button> -->
            </div>
          </div>
          <div class="h5">Emprestimos</div>
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Emprestimos à pagar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Emprestimos pagos</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Movimentação</a>
            </li> -->
      </ul>
      <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="container">

          <table id="tbl_emprestimo" class="table table-responsive table-hover">
                              <thead class="bg-warning">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">Qtd</th>
                                  <th scope="col">Movimentação</th>
                                  <th scope="col">Observação</th>
                                  <th scope="col"></th>
                                  
                                </tr>
                              </thead>
                              <tbody>

                              </tbody>
                            </table>
  </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div id="div_estoque" >
          <table id="tbl_emprestimo_pagos" class="table table-responsive table-hover">
                              <thead class="bg-warning">
                                <tr>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Proprietário</th>
                                  <th scope="col">Qtd</th>
                                  <th scope="col">Movimentação</th>
                                  <th scope="col">ID</th>
                                  <th scope="col">Devolução</th>
                                  <th scope="col">Observação</th>
                                  <th scope="col"></th>
                                  
                                </tr>
                              </thead>
                              <tbody>
                  

                              </tbody>
                            </table>
  </div>
  </div>
      </div>
</main>
<script type="text/javascript">



$(document).ready(function(){

  
  $.ajax({
        url:'<?= base_url();?>emprestimo/listar_emprestimo_apagar',
        type:'POST',
        success: function(data){
        
           $("#tbl_emprestimo tbody").html(data);
        },error:function(data){
            alert(data);
        },
      });    
  $.ajax({
        url:'<?= base_url();?>emprestimo/listar_emprestimo_pagos',
        type:'POST',
        success: function(data){
        
           $("#tbl_emprestimo_pagos tbody").html(data);
        },error:function(data){
            alert(data);
        },
      });    



});
</script>