<?php require_once("navbar.php");

use DAO\Gender as Gender;
?>

<body>
    <div class="container">
        <!-- Inicio Index -->
        <div id="box" class="row justify-content-center" style="background-color: rgba(255, 255, 255, 0.5);">
            <div class="col-md-10 text-center m-auto">
                <h1 class="" id="cinemaTitle"><i class="fas fa-user-alt"></i>&nbsp;</i>Mis Datos</h1>
            </div>
            <!-- form -->
            <div class="col-md-10">
                <form action="<?php echo FRONT_ROOT ?>Profile/UpdateData" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-12 text-center">
                            <img id="imgProfile" src="img/profileej.png" alt="Avatar" height="120" width="120">
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <button type="button" class="btn btn-dark"><i class="fas fa-upload"></i></i>&nbspCambiar Imagen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" value=<?php echo ($_SESSION['User']['Email']) ?> id="inputEmail" placeholder="Email" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputNombre"><i style="color: red;">&#42&nbsp</i>Nombre</label>
                            <input type="text" name="UserName" value=<?php echo ($_SESSION['User']['UserName']) ?> class="form-control" id="inputNombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputPais">Pais</label>
                            <select id="inputPais" class="form-control">
                                <option selected>Elije uno</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputProvincia">Provincia</label>
                            <select id="inputProvincia" class="form-control" disabled>
                                <option selected>Elije una</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCiudad">Ciudad</label>
                            <select id="inputCiudad" class="form-control" disabled>
                                <option selected>Elije una</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputDate"><i style="color: red;">&#42&nbsp</i>Fecha de Nacimiento</label>
                            <input type="date" name="BirthDate" value=<?php echo ($_SESSION['User']['Birthdate']) ?> class="form-control" id="inputDate" placeholder="Fecha de Nacimiento">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputProvincia"><i style="color: red;">&#42&nbsp</i>Género</label>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" <?php if ($_SESSION['User']['IdGender'] == Gender::Female) echo 'checked'; ?> value=<?php echo (Gender::Female) ?> id="OptionFemenino" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="OptionFemenino">Femenino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" <?php if ($_SESSION['User']['IdGender'] == Gender::Male) echo 'checked'; ?> value=<?php echo (Gender::Male) ?> id="OptionMasculino" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="OptionMasculino">Masculino</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input name="gender" type="radio" <?php if ($_SESSION['User']['IdGender'] == Gender::NotBinary) echo 'checked'; ?> value=<?php echo (Gender::NotBinary) ?> id="OptionOtros" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="OptionOtros">Otros</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i>&nbspGuardar cambios</button>
                    <a type="submit" href="<?php echo FRONT_ROOT ?>Home/View" class="btn btn-primary"><i class="fas fa-arrow-left"></i>&nbspVolver</a>
                </form>
                <!-- form -->
            </div>
        </div>
        <!-- Fin Index -->
    </div>

</body>

</html>

<style>
    #box {
        margin-top: 2%;
        min-height: 80vh !important;
        border-radius: 25px;
    }

    #imgProfile {
        border-radius: 50%;
        border: 4px solid black;
        background-color: rgba(52, 57, 64, 0.5);
    }
</style>