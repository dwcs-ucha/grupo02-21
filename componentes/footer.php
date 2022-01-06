<div class="bg-primary py-5 opacity-75">
    <div class="container text-white">
        <div class="row">
            <div class="col-12 col-4">
                <div class="col-6">
                <?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
                <?php $rol = 'invitado'; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <?php $rol = $_SESSION['user']['rol']; ?>
                <?php endif; ?>
                <h4><a class="text-white text-decoration-none fs-3" href="#inicio">Inicio</a></h4>
                <?php if ($rol == "Admin") : ?>
                    <h4>Administrador</h4>
                    <ul>
                    <li class="nav-item"><a class="nav-link text-white" href="/Login/adminRegPanel.php">Panel de Administración</a></li>
                    <li><a class="nav-link text-white" href="/CMS/i.php">Escribir artigo</a></li>
                    <li><a  class="nav-link text-white" href="/Login/logOut.php">Salir</a></li>
                <?php elseif ($rol != 'invitado') : ?>
                    <h4>Usuario</h4>
                    <ul>
                        <li><a  class="nav-link text-white" href="/Login/userPanel.php">Panel de Control</a></li>
                        <li><a  class="nav-link text-white" href="/Login/logOut.php">Salir</a></li>
                <?php endif; ?>
                
                </div>
                </ul>
            </div>
        </div>
    </div>
</div>