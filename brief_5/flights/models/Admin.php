<?php
class Admin{
    static public function login($data){
        $username = $data['username'];
        // die(print_r($data));
        try{
           $query = 'SELECT * FROM admin WHERE username = :username';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array(":username" => $username));
           $admin = $stmt->fetch(PDO::FETCH_OBJ);
           return $admin;
           if($stmt->execute()){
               return 'OK';
           }
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }


}