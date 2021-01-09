<?php
session_start();
if(isset($_POST["ok"]))
{
    // print_r($_POST);
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    // $id = mysqli_connect("localhost","root","","hopital");
    include 'connectbdd.php';
     // $res = mysqli_query($id,$req);
    $req=$connexion->query("SELECT COUNT(*) FROM user WHERE login = '".$login."' AND password = '".$mdp."'");

    // $ligne = mysqli_fetch_assoc($res);
    
    if($req->fetchColumn()==1)
    {
        $req=$connexion->query("SELECT * FROM user WHERE login = '".$login."' AND password = '".$mdp."'");
        $donnee=$req->fetch();
        if($donnee['level']==1)
        {
            //taking the id
            $reqid=$connexion->query("SELECT * FROM user WHERE login = '".$login."' AND password = '".$mdp."'");
            $id=$reqid->fetch();
            //taking the connection's Datetime
            $reqc=$connexion->query("INSERT INTO connection(connection_start,id_login) VALUES (NOW(),".$id['id'].")");
            //getting the last id (last connection)
            $reql=$connexion->query("SELECT *
            FROM connection
            ORDER BY id DESC
            LIMIT 1 ");
            $get=$reql->fetch();
            $_SESSION["login"] = $id['login'];
            $_SESSION["lastid"] = $get['id'];
            header("location:bienvenue.php");
         }
         elseif($donnee['level']==2)
         {
            $_SESSION['adminonline']=$_POST['login'];
            $_SESSION['mdpadmin']=$_POST['mdp'];
            header("location:admin.php");
         }
    }else{
        $erreur = "<h3> Erreur de login ou mot de passe !!!</h3>";
    }
}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title> connexion </title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
<h1> Connexion </h1>
<form method="post">
<?php 
if(isset($erreur)) echo $erreur; ?>
Login : <input type="text" name="login" required> <br><br>
Pass : <input type="password" name="mdp"><br><br>
<input type="submit" value="Envoyer" name="ok">
</form>
</body>
</html>


