<?php
session_start();
include('./bdd.php');
?>
<html>
    <head>
        <title>TP Connexion</title>
        <meta charset="utf8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    </head>
    <body style="padding:10px; text-align:center">
        <h1>Page Membre</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3" style="background-color:lightblue; height: 100%; border-radius: 20px">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h2>Bienvenue à toi : <?=$_SESSION['login']?></h2>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </body>
    <style>
        .container{
            width: 100%;
            border-radius: 20px;
            height: 200px;
        }
    </style>
</html>