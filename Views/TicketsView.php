<?php require_once("navbar.php"); ?>

<body>
    <div class="container">
        <div class="form-group has-search">
            <div class="SearchField">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
        </div>
        <div class="overflow-auto">
            <?php foreach ($Orders as $order) { ?>
                <div class="card mb-3">
                    <div class="card-header">
                        Pedido
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="card-text">Cliente: <?php $order['UserName'] ?> </p><br>
                                <p class="card-text">Complejo: <?php $order['cinemaname'] ?> </p><br>
                                <p class="card-text">Dirección: <?php $order['CinemaAddress'] ?> </p><br>
                                <p class="card-text">Sala: <?php $order['roomnumber'] ?> </p><br>
                                <p class="card-text">Fecha: <?php $order['startdate'] ?> </p><br>
                                <p class="card-text">Horario: <?php $order[''] ?> </p><br>
                            </div>
                            <div class="col-sm-6">
                                <p class="card-text">Pelicula: <?php $order['moviename'] ?> </p><br>
                                <p class="card-text">Butacas: <?php $order['MovieSeats'] ?> </p><br>
                                <p class="card-text">Entradas: <?php $order[''] ?> </p><br>
                                <p class="card-text">Descuento: <?php $order['Discount'] ?> </p><br>
                                <p class="card-text">SubTotal: <?php $order['Subtotal'] ?> </p><br>
                                <p class="card-text">Total: <?php $order['Total'] ?> </p><br>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
<style>
    .SearchField {
        width: 20%;
    }

    .container {
        padding: 3%;
        height: 85%;
        background-color: white;
        opacity: .9;
        background-size: cover;
        margin-top: 1%;
        width: 70%;
        border-radius: 1%;
    }

    .overflow-auto {
        height: 85%;
    }

    .card-text {
        margin: -2%;
    }

    .card {
        background-color: black;
        color: white;
        opacity: 1;
        margin: 5%;
        padding: 1%;
        width: 75%;
    }
</style>