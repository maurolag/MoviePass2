<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <!-- Titulo con logo -->
        <a class="navbar-brand " href="<?php echo FRONT_ROOT?>Home/View">
            MoviePass
        </a>

        <!-- Opciones NavBar -->
        <ul class="navbar-nav mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href=<?php echo FRONT_ROOT. "Home/View"?>><i class="fas fa-home"></i>&nbspInicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-film"></i>&nbspCartelera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-id-card"></i>&nbspContacto</a>
          </li>
        </ul>

        <!--Opcion Perfil -->
        <?php 

            if(isset($_SESSION['isLogged'])){  

              echo '<ul class="nav navbar-nav ml-auto">
                    <img src="'; 
              echo  FRONT_ROOT.VIEWS_PATH.'img/profileej.png" width="30" height="30" class="d-inline-block align-top">
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">';echo $_SESSION['User']['UserName'] . '</a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="';echo FRONT_ROOT. 'Profile/View"><i class="fas fa-user-alt"></i>&nbspMi Perfil</a>
                        <a class="dropdown-item" href="';echo FRONT_ROOT. 'Tickets/View"><i class="fas fa-ticket-alt"></i>&nbspMis Tickets</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-check-square"></i>&nbspCompras Previas</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="';echo FRONT_ROOT. 'Login/Logout"><i class="fas fa-sign-out-alt"></i>&nbspCerrar Sesión</a>
                      </div>
                    </li>                     
                  </ul>';   
             
            } else {
              echo '<ul class="nav navbar-nav ml-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="';echo FRONT_ROOT. 'Login/View"><i class="fas fa-sign-in-alt"></i></i>&nbspIniciar sesión</a>
                      </li>
                    </ul>';    
            }  
        ?>
      </div>
    </nav>