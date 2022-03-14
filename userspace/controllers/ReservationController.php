<?php
  class ReservationController{
    public function addReservation(){
        if(isset($_POST['submit'])){
                        $data = array(
                            'flight_id' => $_POST['flight_id'],
                            'passenger_fname' => $_POST['passenger_fname'],
                            'passenger_lname' => $_POST['passenger_lname'],
                            'depart' => $_POST['depart'],
                            'arrive' => $_POST['arrive'],
                            'depart_date' => $_POST['depart_date'],
                        );
                        // die(print_r($data));
                        $result = Reservation::add($data);
                        // die(print_r($result));
                        if($result == 'OK'){
                            Session::set('success','flight booked successfully');
                            Redirect::to('home');
                        }else{
                            echo $result;
                        }
                    }
    }

    public function getAllReservations(){
        $reservations = Reservation::getAll();
        return $reservations;
    }

    public function getOneReservation()
      {
        if(isset($_POST['id'])){
            $data = array(
                'id' => $_POST['id']
            );
        
        $reservation = Reservation::getReservation($data);
        return $reservation;
        }
      }

    public function findReservation(){
        if(isset($_POST['search'])){
            $data= array('search' => $_POST['search']);
        }
        $reservation = Reservation::searchReservation($data);
        return $reservation;
      }


  }