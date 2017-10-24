<?php require "verifica.php"; ?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	<img alt="Brand" src="logo.png" width="80" height="50">
        <a class="navbar-brand" href="#">   Sistema de Login de Usuários</a>
        
    <?php 
    if(isset($_SESSION['login'])){
        echo "
      <div class='dropdown'>
      <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
        Menu de Opções
      </button>
      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
      $op = $tipo;
      
  switch($op){
      
  case 'F':{	
      echo" 
      <a class='dropdown-item' href='T07.html'> Criar MBP</a>
      <a class='dropdown-item' href='T09.html'>Localização dos Bens</a>
      <a class='dropdown-item' href='T10.html'>Relação das movimentações</a>
      <a class='dropdown-item' href='logout.php'>Logout</a>
      ";
  
  break;
      }
      
  
  case 'D':{
      echo "
      <a class='dropdown-item' href='T03.html'>Incluir Usuario</a>
      <a class='dropdown-item' href='T07.html'> Criar MBP</a>
      <a class='dropdown-item' href='T09.html'>Localização dos Bens</a>
      <a class='dropdown-item' href='T10.html'>Relação das movimentações</a>
      <a class='dropdown-item' href='T09.html'>Movimentações Pendentes</a>
      <a class='dropdown-item' href='logout.php'>Logout</a>
      ";
  
  break;
      }
      
  
  case 'P':{
  echo "
        <a class='dropdown-item' href='T03.html'>Incluir Usuario</a>
        <a class='dropdown-item' href='T07.html'> Criar MBP</a>
        <a class='dropdown-item' href='T09.html'>Localização dos Bens</a>
        <a class='dropdown-item' href='T10.html'>Relação das movimentações</a>
        <a class='dropdown-item' href='T09.html'>Movimentações Pendentes</a>
        <a class='dropdown-item' href='logout.php'>Logout</a>
  ";
  break;
      }
 echo"     
        </div>
    </div>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'> <span class='navbar-toggler-icon'></span> </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
    </div>
</nav>
<hr class='divider'>
<div class='container'>
</div>
 </div>
<div style='width: 600px; margin: auto'>
";
};
    };
?>