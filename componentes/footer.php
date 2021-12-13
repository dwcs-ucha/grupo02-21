<div class="bg-primary py-5">
    <div class="container text-white">
        <div class="row">
            <div class="col-12 col-4">
                <h4>Usuarios</h4>
                <ul>
                    <li><a  class="nav-link text-white" href="/Login/userPanel.php">Panel de Control</a></li>
                    <li><a  class="nav-link text-white" href="/Login/logOut.php">Salir</a></li>
                    <?php 
    //session_status() === PHP_SESSION_ACTIVE ?: session_start();      
    if(isset($_SESSION['userLogged'])) {        
        ?>
    <li class="nav-item">
        <a class="nav-link text-white" href="/Login/logOut.php">Saír</a>
    </li>
    <?php
    }
    ?>
                </ul>
            </div>
        </div>
    </div>
</div>