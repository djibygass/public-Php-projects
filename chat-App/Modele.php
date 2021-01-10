<?php
  abstract class Modele{
     static $db;
     private static function getbdd(){
        if (self::$db == null){
            self::$db = new PDO("mysql:host=localhost;dbname=chat;charset=UTF8","root","");
        } 
        return self::$db;
     }
     protected function exeReq(string $sql, array $params = null){
        if($params == null){
           $result = self::getbdd()->query($sql);
        }else{
         $result = self::getbdd()->prepare($sql);
         $result->execute($params);
        }
        return $result;
     }
  }
?>