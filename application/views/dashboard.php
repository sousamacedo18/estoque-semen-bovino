<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 " >
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
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
        
          <div  class="col-md-12 ml-sm-auto col-lg-12 text-center px-4 " id="menu_central">
           
          <div class='selector '>
<ul>
<li>
<input id='c1' type='checkbox'>
<label for='c1'>HOME</label>
</li>
<li>

<input id='c2' type='checkbox' onclick="abrircadastro();">
<label for='c2'>CLI/FOR</label>
</li>
<li>
<input id='c3' type='checkbox' onclick="abriranimal();">
<label for='c3'>ANIMAL</label>
</li>
<li>
<input id='c4' type='checkbox' onclick="abrirbotijao();">
<label for='c4'>BOTIJÃO</label>
</li>
<li>
<input id='c5' type='checkbox' onclick="abrirusuario();">
<label for='c5'>USUÁRIO</label>
</li>
<li>
<input id='c6' type='checkbox' onclick="abrirpropriedade();">
<label for='c6'>PROPRIEDADE</label>
</li>
<li>
<input id='c7' type='checkbox'>
<label for='c7'>RELATÓRIO</label>
</li>
<li>
<input id='c8' type='checkbox' onclick="abrirproduto">
<label for='c8'>PRODUTO</label>
</li>
</ul>
<a  href="<?= base_url(); ?>dashboard">
<button>MENU</button>
</a>
</div>

          </div>
</main>
          <style>
#menu_late{
  height: 500px;
  background: #dcdee0;
}
#menu_central{

  height: 500px;
  background: #dcdee0;

}
#menu_central_radius{ height: 100%; }

#menu_central_radius {

background:#5cb85c;
overflow: hidden;
  font-family: 'Roboto Condensed', sans-serif;
}

.selector {
position: absolute;
left: 50%;
top: 50%;
width: 140px;
height: 140px;
margin-top: -70px;
margin-left: -70px;
}

.selector,
.selector button {
font-family: 'Roboto Condensed', sans-serif;
font-weight: 600;
    color: #333;
     
}

.selector button {
position: relative;
width: 100%;
height: 100%;
padding: 10px;
background: #fff;
border-radius: 50%;
border: 0;
color: #c90d06  ;
font-size: 20px;
cursor: pointer;
box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
transition: all .1s;
}

.selector button:hover { background: #fff; }

.selector button:focus { outline: none; }

.selector ul {
position: absolute;
list-style: none;
padding: 0;
margin: 0;
top: -20px;
right: -20px;
bottom: -20px;
left: -20px;
}

.selector li {
position: absolute;
width: 0;
height: 100%;
margin: 0 50%;
--ms-transform: rotate(-360deg);
transition: all 0.8s ease-in-out;
}

.selector li input { display: none; }

.selector li input + label {
position: absolute;
left: 50%;
bottom: 100%;
width: 0;
height: 0;
line-height: 1px;
margin-left: 0;
background: #fff;
border-radius: 50%;
text-align: center;
font-size: 1px;
overflow: hidden;
cursor: pointer;
box-shadow: none;
transition: all 0.8s ease-in-out, color 0.1s, background 0.1s;
}

.selector li input + label:hover { background: #f0f0f0; }

.selector li input:checked + label {
background: #5cb85c;
color: white;
}

.selector li input:checked + label:hover { background: #449d44; }

.selector.open li input + label {
width: 80px;
height: 80px;
line-height: 80px;
margin-left: -40px;
box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
font-size: 12px;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script>var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
$({d:angleStart}).animate({d:d}, {
step: function(now) {
$(li)
.css({ transform: 'rotate('+now+'deg)' })
.find('label')
.css({ transform: 'rotate('+(-now)+'deg)' });
}, duration: 0
});
}

// show / hide the options
function toggleOptions(s) {
$(s).toggleClass('open');
var li = $(s).find('li');
var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
for(var i=0; i<li.length; i++) {
var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
$(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
}
}

$('.selector button').click(function(e) {
toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.selector'); }, 100);//@ sourceURL=pen.js

abrircadastro=function(){
  var url="<?= base_url(); ?>cadastro/listar_cadastro";
  $(location).attr('href',url);
}
abrirbotijao=function(){
  var url="<?= base_url(); ?>botijao/listar_cadastro";
  $(location).attr('href',url);
}
abrirusuario=function(){
  var url="<?= base_url(); ?>usuario/listar_usuario";
  $(location).attr('href',url);
}
abrirpropriedade=function(){
  var url="<?= base_url(); ?>propriedade/listar_cadastro";
  $(location).attr('href',url);
}
abriranimal=function(){
  var url="<?= base_url(); ?>animal/listar_cadastro";
  $(location).attr('href',url);
}
abrirproduto=function(){
  var url="<?= base_url(); ?>produto/listar_cadastro";
  $(location).attr('href',url);
}
</script>
