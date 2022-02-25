<?php
 class Reservation {
    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO reservation(flight_id,passenger_fname,passenger_lname,depart,arrive) VALUES(:flight_id,:passenger_fname,:passenger_lname,:depart,:arrive);');
        
        $stmt->bindParam(':flight_id',$data['flight_id']);
        // $stmt->bindParam(':passenger_id',$data['passenger_id']);
        $stmt->bindParam(':passenger_fname',$data['passenger_fname']);
        $stmt->bindParam(':passenger_lname',$data['passenger_lname']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);

        if($stmt->execute()){
            // echo "<script>alert('yes');</script>";
            return 'OK';
        }else{
            echo "<script>alert('No');</script>";
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM reservation');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }

    static public function getReservation($data){
        $id = $data['id'];
        try{
           $query = 'SELECT * FROM reservation WHERE id = :id';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array(":id" => $id));
           $reservation = $stmt -> fetch(PDO::FETCH_OBJ);
           return $reservation;
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }

    static public function searchReservation($data){
        $search = $data['search'];
        try{
        $query = 'SELECT * FROM reservation WHERE passenger_fname LIKE ? or passenger_lname LIKE ?';
        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
            return $reservation= $stmt->fetchAll();
        } catch(PDOExeption $ex){
        echo 'erreur' . $ex->getMessage();
        }
    }





 }