<?php
  session_start();
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Market online</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="vegetable/index.php">Vegetable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart/index.php">Cart</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart/history.php">History</a>
      </li>
      <?php
      if (isset($_SESSION['Fullname'])){
        echo '<li class="nav-item">
        <a class="nav-link" href="customer/logout.php">Logout</a></li>
        <li class="nav-item">
        <button class="btn btn-info" href="#">'.$_SESSION['Fullname'].'</button></li>'
        ;
    }
    else{
        echo '<li class="nav-item">
        <a class="nav-link" href="customer/login.php">Login</a>
      </li>';
    }  
      ?>    
    </ul>
  </div>  
</nav>