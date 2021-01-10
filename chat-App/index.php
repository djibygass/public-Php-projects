<?php
require_once "User.php";
$users = new User();
$allMessages = $users->showMessages();
?>
<html>
    <head>
        <title>Chat</title>
        <meta charset="utf8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="default.css">
    </head>
    <body style="padding:10px">
        <h1>Chat</h1>
        <hr>
        <div class="container">
            <div class="conversation">
            <?php
            foreach($allMessages as $message){

               
                ?>
                <div class="messagecontainer">
                    <span class="username">user : <?=$message['auteur']?></span>
                    <p> <?=$message['contenu'];?></p>
                    <span class="time-right"><?=$message['dateMessage']?></span>
                    
                </div>
            <?php
            }
            ?>
            </div>
            <div class="message">
                <form method="POST" action="newMessage.php">
                    <div class="row" style="margin: 10px;">
                        <div class="col-md-6">
                            <textarea name="message" class="form-control" style="resize:none; overflow-y: auto;" rows="5" placeholder="Ecrire un message ..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="auteur" class="form-control" placeholder="Nom d'utilisateur..."/>
                            <br/>
                            <button type="submit" class="btn btn-primary" style="width:100%">ENVOYER LE MESSAGE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>

</html>