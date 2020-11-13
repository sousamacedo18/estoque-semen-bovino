<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 " >
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Visualizar Caneca</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Compartilhar</button>
                <button class="btn btn-sm btn-outline-secondary">Exportar</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                Esta semana
              </button>
            </div>
          </div>
  
    <div class="card  bg-light mb-3" style="max-width: 18rem;">
  <div class="card-header">Botijão: 001</div>
  <div class="card-body">
    <h5 class="card-title">Caneca 02</h5>
  
          <div class="row">
          
          <div class="caneca border border-primary" >
           
          <div class="circ_media" style="width:41px;">
          <?php 
            $qtd_rack_media=4;
            $qtd_rack_fina=8;
            $total_armazenagem_media=160;
            $total_armazenagem_fina=160;
            $m_media=$total_armazenagem_media/$qtd_rack_media;
            $m_fina=$total_armazenagem_fina/$qtd_rack_fina;
            $media=100;
            $fina=60;
            for($i=1;$i<=$qtd_rack_media;$i++){
    
              if($media<$m_media){
                ?>
                  <div class="media" style="height:41px ;">
                <?php
                $rack[$i]=$media;
                $i=$qtd_rack_media+1;
                for($j=1;$j<=$media;$j++){
                  echo"<span></span>";
                }
                echo"
              
                </div>";
              }else{
                ?>
                <div class="media" style="height:41px ;">
                <?php
                $rack[$i]=$m_media;
                $media=$media-$m_media;
                for($j=1;$j<=$m_media;$j++){
                  echo"<span></span>";
                }
                echo"</div>";
              }
              
            }
               
            
            ?>
        
          
     
               
          </div>
          <div class="circ_fina "  style="width: 30px;">
        <?php
        for($i=1;$i<$qtd_rack_fina;$i++){
                  if($fina<$m_fina){
                    $i=$qtd_rack_fina+1;
        ?>
         <div class="fina" style="height:26px;">
         <?php
         for($j=1;$j<$fina;$j++){
         ?>
        <abbr title="<?php echo$fina?>"> <span></span></abbr>
         </div>
         <?php
         }
                  }else{
                    $fina=$fina-$m_fina;
                  
         ?>
       <div class="fina" style="height:26px;">
       <?php
       for($j=1;$j<=$m_fina;$j++){
       ?>
         <span></span>
         <?php
       }
         ?>
         </div>
         <?php
                  }
         ?>
        
<?php
 }
?>
          </div>
          </div>

          </div>
          </div>
      <style>
        .media{
          background: #4287f5;
     
          border:  white solid;
          border-radius:10px; 
         display: grid;
         grid-template-columns: 5px 5px 5px 5px;
         grid-template-rows: 2px 2px 2px 2px 2px 2px 2px 2px 2px 2px;

         grid-gap: 1px;
         justify-content: center;
         align-content: center;
       

        }

        .fina{

          background: yellowgreen;             
          border:  white solid;
          border-radius:10px; 
         display: grid;
         grid-template-columns: 2px 2px 2px 2px;
         grid-template-rows: 2px 2px 2px 2px 2px;

         grid-gap: 1px;

         justify-content: center;
         align-content: center;
       
        }
        .caneca{
         background: white;
         width: 50vh;
         display: grid;
         grid-template-columns: 1fr 1fr;
         grid-gap: 1px;
         justify-content: center;
         align-content: center;
        }
        span{
          
          background: white;
          height: 2px;
          width: 2px;
          border-radius: 50%;
          
      
          
         
        }
      </style>
           

