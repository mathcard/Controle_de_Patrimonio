<?php require "verifica.php"; ?>

    <meta charset="utf-8">
<head>
    <title>Controle de Patrimonio</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dropdown.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-validate.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <img alt="Brand" src="logo.png" width="80" height="50">
    <a class="navbar-brand" href="index.php">   Controle de Patrimônio</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarCollapse' aria-controls='navbarCollapse' aria-expanded='false' aria-label='Toggle navigation'> <span class='navbar-toggler-icon'></span> </button>
    <div class='collapse navbar-collapse' id='navbarCollapse'>
    </div>
        
    <?php 
    if(isset($_SESSION['login']) && isset($_COOKIE['name'])){
    ?>
      <div class='dropdown' style="text-align: right,margin-left: 2cm;">
      <button style="text-align: right,margin-left: 2cm;" class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      Bem vindo <?php echo $_COOKIE['name'];?>
      </button>
      <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    
     <?php
      $op = $tipo;
      
     switch($op){
      
     case 'F':{ 
    ?>	

      <a class="dropdown-item" href="T07.php">Criar MBP</a>
      <a class="dropdown-item" href="T11.php">Inventário</a>
      <a class="dropdown-item" href="logout.php">Logout</a>
      <a class="dropdown-item" href="index.php">Home</a>
      
<?php 
  break;
      };
      
  case 'D':{
?>

      <a class="dropdown-item" href="T03.php">Usuários</a>
      <a class="dropdown-item" href="T07.php">Criar MBP</a>
      <a class="dropdown-item" href="T11.php">Inventário</a>
      <a class="dropdown-item" href="index.php">Home</a>
      <a class="dropdown-item" href="logout.php">Logout</a>
<?php  
  break;
      };
      
  
  case 'P':{
?>

        <a class="dropdown-item" href="T03.php">Usuários</a>
        <a class="dropdown-item" href="T01.php">Categorias</a>
        <a class="dropdown-item" href="T02.php">Prédios</a>
        <a class="dropdown-item" href="T04.php">Departamentos</a>
        <a class="dropdown-item" href="T05.php">Salas</a>
        <a class="dropdown-item" href="T07.php">Criar MBP</a>
        <a class="dropdown-item" href="T11.php">Inventário</a>
        <a class="dropdown-item" href="index.php">Home</a>
        <a class="dropdown-item" href="logout.php">Logout</a>

<?php  
  break;
      };
    };
?>     
        </div>
    </div>
    <p>   </p>
    <?php }; ?>

    </div>
</nav>

