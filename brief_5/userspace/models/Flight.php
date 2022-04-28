<?php
 class Flight {
    static public function getAll(){
         $stmt = DB::connect()->prepare('SELECT * FROM flight');
         $stmt->execute();
         return $stmt->fetchAll();
         $stmt->close();
         $stmt = null;
     }

    static public function getFlight($data){
         $id = $data['id'];
         try{
            $query = 'SELECT * FROM flight WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $flight = $stmt -> fetch(PDO::FETCH_OBJ);
            return $flight;
         } catch(PDOExeption $ex){
            echo 'erreur' . $ex->getMessage();
         }
    }

    static public function add($data){
        $stmt = DB::connect()->prepare('INSERT INTO flight(flight_num,depart,arrive,date_depart,prix,nb_places) VALUES(:flight_num,:depart,:arrive,:date_depart,:prix,:nb_places);');
        
        $stmt->bindParam(':flight_num',$data['flight_num']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':nb_places',$data['nb_places']);

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
     
    static public function update($data){
        $stmt = DB::connect()->prepare('UPDATE flight SET 
            flight_num = :flight_num,depart = :depart,arrive = :arrive,date_depart = :date_depart,prix = :prix,nb_places = :nb_places WHERE id = :id');
        
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':flight_num',$data['flight_num']);
        $stmt->bindParam(':depart',$data['depart']);
        $stmt->bindParam(':arrive',$data['arrive']);
        $stmt->bindParam(':date_depart',$data['date_depart']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':nb_places',$data['nb_places']);
        // die (print_r($data));
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
    
    static public function delete($data){
         $id = $data['id'];
         try{
            $query = 'DELETE FROM flight WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            if($stmt->execute()){
                return 'OK';
            }
         } catch(PDOExeption $ex){
            echo 'erreur' . $ex->getMessage();
         }
    }

    // static public function searchFlight($data){
    //     $search = $data['search'];
    //     try{
    //        $query = 'SELECT * FROM flight WHERE depart LIKE ? or arrive LIKE ?';
    //        $stmt = DB::connect()->prepare($query);
    //        $stmt->execute(array('%'.$search.'%','%'.$search.'%'));
    //         return $flights= $stmt->fetchAll();
    //     } catch(PDOExeption $ex){
    //        echo 'erreur' . $ex->getMessage();
    //     }
    // }

    // static public function searchFlight2($data){
    //     $depart = $data['depart'];
    //     $arrive = $data['arrive'];
    //     $dated = $data['dated'];
    //     $datea = $data['datea'];
    //     // die(var_dump($data));
    //     try{
    //        $query = 'SELECT * FROM flight as V1, flight as V2 
    //                 WHERE (V1.`depart` LIKE ? AND V1.`arrive` LIKE ? AND V1.`date_depart` LIKE ? ) AND (V2.`depart` LIKE ? AND V2.`arrive` LIKE ? AND V2.`date_depart` LIKE ?) ';
    //        $stmt = DB::connect()->prepare($query);
    //        $stmt->execute(array('%'.$depart.'%','%'.$arrive.'%','%'.$dated.'%','%'.$arrive.'%','%'.$depart.'%','%'.$datea.'%'));
    //     //    die(var_dump($stmt));
    //        $flights= $stmt->fetch(PDO::FETCH_ASSOC);
    //     //    print_r($flights);
    //         return $flights;
    //     } catch(PDOExeption $ex){
    //        echo 'erreur' . $ex->getMessage();
    //     }
    // }

    static public function searchFlight($data){
        $depart = $data['depart'];
        $arrive = $data['arrive'];
        $dated = $data['dated'];
        // $datea = $data['datea'];
        // die(var_dump($dated));
        try{
           $query = 'SELECT * FROM flight WHERE depart LIKE ? and arrive LIKE ? and date_depart LIKE ?';
           $stmt = DB::connect()->prepare($query);
           $stmt->execute(array('%'.$depart.'%','%'.$arrive.'%','%'.$dated.'%'));
            return $flights= $stmt->fetchAll();
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }


    static public function searchFlight2($data){
        $depart = $data['depart'];
        $arrive = $data['arrive'];
        $dated = $data['dated'];
        $datea = $data['datea'];
        // die(var_dump($dated));
        try{
           $query = 'SELECT * FROM flight WHERE depart LIKE ? and arrive LIKE ? and date_depart LIKE ?';
           $query2 = 'SELECT * FROM flight WHERE depart LIKE ? and arrive LIKE ? and date_depart LIKE ?';
           $stmt = DB::connect()->prepare($query);
           $stmt2 = DB::connect()->prepare($query2);
           $stmt->execute(array('%'.$depart.'%','%'.$arrive.'%','%'.$dated.'%'));
           $stmt2->execute(array('%'.$arrive.'%','%'.$depart.'%','%'.$datea.'%'));

           if ($stmt->rowCount() > 0 && $stmt2->rowCount() > 0) {
                $flights= $stmt->fetchAll(PDO::FETCH_ASSOC);
                $flights2= $stmt2->fetchAll(PDO::FETCH_ASSOC);
                return array_merge($flights,$flights2);
           }

            return [];
        } catch(PDOExeption $ex){
           echo 'erreur' . $ex->getMessage();
        }
    }

}

// }