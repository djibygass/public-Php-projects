<?php
if(isset($_GET['nombre1']) && isset($_GET['nombre2'])){
    if(isset($_GET['bouton'])){
        switch($_GET['bouton']){
            case "plus":
                $result = (int)$_GET['nombre1'] + (int)$_GET['nombre2'];

        }
        switch($_GET['bouton']){
          case "moins":
              $result = (int)$_GET['nombre1'] - (int)$_GET['nombre2'];

      }
      switch($_GET['bouton']){
        case "fois":
            $result = (int)$_GET['nombre1'] * (int)$_GET['nombre2'];

    }
    switch($_GET['bouton']){
      case "divise":
          $result = (int)$_GET['nombre1'] / (int)$_GET['nombre2'];
          $result = (round($result, 2));
  }
    }
}

?>
<html>
    <head>
        <title>Calculette</title>
        <meta charset="utf8" />
    </head>
    <body>
        <h1>Bienvenue dans la calculette</h1>
        <hr>
        <div class="global" style="width:100%;">
            <div class="gauche" style="width:48%; display:inline-block; border:1px solid black; padding:20px">
            <form method="GET">
            <div class="nombres">
                <div class="divNombre">
                    <label>Nombre 1</label><br/>
                    <input type="number" name="nombre1">
                </div>
        
                <div class="divNombre">
                    <label>Nombre 2</label><br/>
                    <input type="number" name="nombre2">
                </div>
            </div>
            <div class="boutons">
                <table>
                    <tr>
                        <td><button type="submit" name="bouton" value="plus">+</button></td>
                        <td><button type="submit" name="bouton" value="moins">-</button></td>
                        <td><button type="submit" name="bouton" value="fois">x</button></td>
                        <td><button type="submit" name="bouton" value="divise">÷</button></td>
                    </tr>
                </table>
            </div>
        </form>
        <div class="resultat">
            <?php
            echo (isset($result) ? $result : "");
            ?>
  
        

    </body>
    <style>
        h1{
            color: blue;
        }
        input{
            height: 40px !important;
            border-radius: 20px;
            background-color: lightblue;
            font-size: 2em;
            width: 200px;
            text-align: center;
            outline-width: 0;
        }
        label{
            font-weight: bold;
            color: blue;
            
        }
        .divNombre{
            width: 210px;
            text-align: center;
            display: inline-block
        }
        .boutons{
            width: 210px;
            margin-top: 50px;
        }
        .resultat{
            margin-top: 50px;
            width: 390px;
            height: 40px;
            border: 1px solid black;
            background-color: lightblue;
            border-radius: 20px;
            text-align: center;
            padding: 20px;
            font-size: 2em;
        }
        button{
            flex:1;
            width: 50px;
            height: 50px;
            font-size: 2em;
            align-items: center;
            color: white;
            background-color: blue;
            margin-left: 40px; 
            cursor: pointer;
        }
    </style>
</html>