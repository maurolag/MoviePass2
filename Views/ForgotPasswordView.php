<main>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div id="formBox" class="col-md-5">
                    <h1 id="mainTitle"><i class="fas fa-ticket-alt"></i>&nbspMoviePass</h1>
                    <hr>
                    <br>
                    <form action="<?php echo FRONT_ROOT ?>User/RecoverPassword" method="post">
                        <div class="forgotPassword-box">
                            <div class="textbox">
                                <i class="fas fa-user"></i>
                                <input type="text" required placeholder="E-mail" name="email" value="">
                            </div>
                            <button id="forgotPasswordBtn" type="submit" name="button">Recuperar contraseña</button><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
    .container {
        color: white;
        font-family: 'Muli', sans-serif;
    }

    hr {
        border: none;
        height: 2px;
        background: white;
        border-radius: 25px;
        width: 75%;
    }

    #forgotPasswordBtn {
          display: block;
          width: 80%;
          height: 50px;
          border-radius: 25px;
          margin: 1rem 0 0 0.4rem;
          font-size: 1.2rem;
          outline: none;
          border: none;
          background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
     }

     #forgotPasswordBtn:hover {
          background-image: linear-gradient(to right, #27a37a, #32be8f, #27a37a);
          cursor: pointer;
     }

    .textbox input {
        border: none;
        outline: none;
        background: none;
        color: white;
        font-size: 18px;
        width: 80%;
        float: left;
        margin: 0 10px 0 0.4rem;
    }

    .forgotPassword-box {
        margin-left: 14%;
    }

    #formBox {
        width: 80%;
        margin-top: 10%;
        color: white;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 2%;
    }

    .textbox {
        width: 70%;
        overflow: hidden;
        font-size: 15px;
        padding: 8px 0;
        margin: 8px 0;
        border-bottom: 1px solid white;
    }

    #mainTitle {
        font-family: 'Montserrat', sans-serif;
        margin-top: 5%;
        text-align: center;
        font-size: 240%;
        font-weight: 600;
    }
</style>