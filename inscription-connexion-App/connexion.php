<?php
include('bdd.php');
?>
<html>
    <head>
        <title>TP Connexion</title>
        <meta charset="utf8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body style="padding:10px; text-align:center">
        <h1>Connexion</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="background-color:lightblue; height: 100%; border-radius: 20px">
                    <form autocomplete="off" method = "POST" action = "traitements/connexion.php">

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2>Formulaire de connexion</h2>
                            </div>
                        </div>
                        <div class="row formulaireRow">
                            <div class="col-sm-12">
                                <input type="text" name="login" class="form-control" placeholder="Nom d'utilisateur"/>
                            </div>
                        </div>
                        <div class="row formulaireRow">
                            <div class="col-sm-12">
                                <input type="password" name="password" class="form-control" placeholder="Mot de passe"/>
                            </div>
                        </div>
                        <div class="row formulaireRow">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" style="width:100%">CONNEXION</button>
                            </div>
                        </div>
                        <div class="row formulaireRow">
                            <div class="col-sm-12">
                                <a href="inscription.php" class="btn btn-success" style="width:100%;">INSCRIPTION</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </body>
    <style>
        .container{
            width: 100%;
            border-radius: 20px;
        }

        .form-control{
            height: 50px;
        }

        .formulaireRow{
            margin-top: 50px;
        }
    </style>
</html>