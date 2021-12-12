<?php
/**
*@author Alexia Caride Yáñez
*@modificado 06/12/2021
*@version 01
*/
?>
<div class="container">
    <div class="col-12 col-lg-12 col-sm-12">
        <div class="row">
            <div class="col-4 col-lg-4 col-sm-4 flex-colum">
                <img src="/logos/logoPlan.png" class="img-fluid" width="100px">
            </div>
            <div class="col-4 col-lg-4 col-sm-4">
                <h1 class="text-center fw-bolder text-primary">Aforro enerxético</h1>
            </div>
            <div class="col-4 col-lg-4 col-sm-4 flex-column-reverse">
                <img src="/logos/logoCentro.png" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<ul class="nav justify-content-center bg-primary border border-5 border border-primary">
    <li class="nav-item">
        <a class="nav-link text-white" aria-current="page" href="/Login/signIn.php">Login</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="/Login/signUP.php">Rexistro</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="/CMS/novas.php">Novas</a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="/index.php">Calculadoras</a>
    </li>
    <?php 
    session_status() === PHP_SESSION_ACTIVE ?: session_start();      
    if(isset($_SESSION['userLogged'])) {        
        ?>
    <li class="nav-item">
        <a class="nav-link text-white" href="/Login/logOut.php">Salir</a>
    </li>
    <?php
    }
    ?>
</ul>
