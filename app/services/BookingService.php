<?php 

class BookingService{

    private $db;
    private $bookingRepo;

    public function __construct(Database $db, BookingRepository $bookingRepo)
    {
        $this->db = $db;
        $this->bookingRepo = $bookingRepo;
    }

    public function bookTicket($userId, $seatId, $amount){

        try{

            //Start transaction
            $this->db->beginTransaction();

            //Step 1 : Deduct payment
            $this->bookingRepo->deductBalance($userId, $amount);

            //Simulate failure(for testing)
            //throw new Exception("Payment error");

            //Step 2:  Reserve seat
            $this->bookingRepo->reserveSeat($seatId);

            //Commit if all success
            $this->db->commit();

            return [
                'success' => true,
                'message' => 'Booking successfull'
            ];
        }catch(Exception $e){

            //Rollback if any error
            $this->db->rollback();

            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}


?>