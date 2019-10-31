<?php require_once("navbar.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/1f086749d5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <a href="https://icons8.com/icon/11251/movie-ticket"></a>
</head>
<body>

  <fieldset>
    <div class= "row">
    <form id ="searchBox" action="" >
            <input id ="inputSearch" type="search">
              <i class="fa fa-search" id="inputConfig"></i>
      </form>
      <select  id = "genres" id = "generos">
          <option value="0">Selecciona el Género</option>
          <option value="1"></option>
      </select>
      <form id="date" action="">
        <input id="inputDate" type="date" name="date">
        <input id="inputSubmit" type="submit" value="Buscar">
      </form>
    </div>
  </fieldset>

  <div class="container" > 
    <div id="box" class="row" style="background-color: rgba(255, 255, 255, 0.5);">        
      <?php foreach($movieList as $movies) { ?>   
        <div class="col-md-3">
            <div class="flip-card movieBoxes">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                  <img src= "<?php echo $movies->getPhoto()?>"" alt="Avatar" style="width:100%;height:100%;">
                </div>
                <div class="flip-card-back">
                  <h1> <?php echo $movies->getMovieName(); ?> </h1> 
                  <p><?php echo $movies->getReleaseDate(); ?></p> 
                  <p><a id="buyTicket" href = "#"></a><button class="button">Comprar</a><i class="fas fa-ticket-alt"></i></button></p>
                </div>
              </div>
            </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

<style>

body {
    height: 100%;
    max-height: 100vh;
    margin: 0;
}


#box {
    min-height: 100vh !important;
    height: auto !important;
    margin-bottom: 10%;
    
} 

h1{
  font-size: 20px;
  margin-top: 10%;
}

.flip-card {
    background-color: transparent;
    width: 200px;
    height: 250px;
    border: 1px solid #f1f1f1;
    perspective: 1000px; /* Remove this if you don't want the 3D effect */
  }
  
  /* This container is needed to position the front and back side */
  .flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
  }
  
  /* Do an horizontal flip when you move the mouse over the flip box container */
  .flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
  }
  
  /* Position the front and back side */
  .flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
  }
  
  /* Style the front side (fallback if image is missing) */
  .flip-card-front {
    background-color: #bbb;
    color: black;
  }
  
  /* Style the back side */
  .flip-card-back {
    background-color: rgba(88, 88, 88, 0.534);
    color: white;
    font-size-adjust: small;
    transform: rotateY(180deg);
  }

.container {
     min-height: 100vh; 
     height: 100% !important;
     width: 100%;
 }

.movieBoxes {
    margin-left: 7%;
    width: 85%;
    padding: 10px;
    margin-bottom: 10%;
}

   .col-md-3 img {
     opacity: 0.8; 
     cursor: pointer; 
   }
   
   .col-md-3 img:hover {
     opacity: 1;
   }


#searchBox{
    position: relative;
    margin-top: 5%;
    left: 10.5%;
    transform: translate(-50%,-50%);
    transition: all 1s;
    width: 50px;
    height: 50px;
    background: white;
    box-sizing: border-box;
    border-radius: 25px;
    border: 4px solid white;
    padding: 5px;
}

#inputSearch{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;;
    height: 42.5px;
    line-height: 30px;
    outline: 0;
    border: 0;
    display: none;
    font-size: 1em;
    border-radius: 20px;
    padding: 0 20px;
}

#inputConfig{
    box-sizing: border-box;
    padding: 10px;
    width: 42.5px;
    height: 42.5px;
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 50%;
    color: #07051a;
    text-align: center;
    font-size: 1.2em;
    transition: all 1s;
}

#searchBox:hover{
    width: 200px;
    cursor: pointer;
}

#searchBox:hover input{
    display: block;
}

#searchBox:hover .fa{
    background: #07051a;
    color: white;
    display: block;
}

#date{
  margin-top: 3.5%;
}

#inputDate{
  border-radius: 100px;
  margin-bottom: 10px;
  background-color: #2c2c2cb2;
  background: rgba(39, 39, 39, 0.596);
  color: #8d9092;
  box-shadow: 0 1px 0 rgba(5, 5, 5, 0.705) inset;
}

#inputSubmit{
background-color: #ffffff;
color: #181818;
border-radius: 75px;
}


select {
  border: none;
  font-size: 16px;
  height: 50%;
  margin: 0;
  margin-top: 3.5%;
  margin-left: 10%;
  outline: 0;
  padding: 5px;
  width: 17%;
  background-color: #2c2c2cb2;
  background: rgba(39, 39, 39, 0.596);
  color: #8d9092;
  box-shadow: 0 1px 0 rgba(5, 5, 5, 0.705) inset;
  margin-bottom: 10px;
  border-radius: 100px;
}

option{
  background: rgba(0, 0, 0, 0.418);
}

fieldset {
  display: inline-block;
  margin-top: 5%;
  justify-content: space-between;
  align-items: flex-end;
  margin-left: 7.75%;
  height: 25%;
  width: 84.55%;
  background-color: rgba(255, 255, 255, 0.5);
}

#icon{
  margin-right: 2%;
}

.button {
  background-color: rgba(39, 116, 70, 1);
  border: none;
  color: white;
  padding: 5% 30%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1rem;
  cursor: pointer;
}
.button .icon {
  float: left;
  width: 40px;
  height: 40px;
  margin-top: 5%;
  filter: invert(100%);
}  

</style>
</html>
