<?php
require_once "Modele.php";
class User extends Modele{

   public function sendMessage(string $login,string $message){
      $sql = "INSERT INTO message(contenu, auteur, dateMessage) VALUES(?, ?, NOW())";
      $this->exeReq($sql,[$message,$login]);
   }

   public function showMessages(){
      $sql = "SELECT * FROM message ORDER BY dateMessage ";
      return $this->exeReq($sql);
   }

}
?>