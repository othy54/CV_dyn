<?php
session_start();
unset($_SESSION);
session_destroy();
session_start();
?>

<!doctype html>
<html lang="fr">

<head>
    <title>MyResume</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
        crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
</head>


<body>




    <!-- CONNEXION  -->

    <div class="mainContainer">
        <div class="container">
            <div class="row" id="connexion">
                <div class="col-10 col-md-6" id="squareConnexion">
                    <form action="co_sgn_ctrl.php" method="post">
                        <h1 class="titre">MyResume</h1>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="exemple@gmail.com" name="mail_user"  data-toggle="popover"
                                data-placement="top" data-content="Cet email sera utilisé dans le CV" data-trigger="active" required>
                                <p style="color: red;"> <?php 
                                
                                
                                    if(isset($_GET['error']))
                                    {
                                        echo htmlspecialchars($_GET['error']);
                                    } 
                                    
                                
                                ?>
                            </p>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe"
                                name="keypass_user" required>
                                
                        </div>
                        <div>
                            <p><a href="#">Mot de passe oublié ?</a></p>
                            
                           
                        </div>
                        <div id="connex-signup">
                            <button type="submit" class="btn btn-primary" id="connexionBtn" name="connexionBtn" onclick="myConnexion()">Connexion</button>
                            <button type="submit" class="btn btn-success" name="registerBtn" onclick="mySignup()">S'enregistrer</button>
                        </div>
                        <input type="text" style="display:none" value="" id="secret" name="secret">
                    </form>
                </div>
            </div class="row">
        </div>
    </div>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })


        // FONCTION DES BOUTONS 

        function myConnexion() {
            $("#secret").attr("value", "connexionGo");
        }

        function mySignup() {
            $("#secret").attr("value", "registerGo");
        }
    
    </script>

</body>

</html>