<?php 

class BookingRepository{

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db->getConnection();
    }

    //Deduct Payment
    public function deductBalance($userId, $amount){
        $query = "UPDATE users SET balance = balance - :amount WHERE id = :id";
        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':amount' => $amount,
            ':id' => $userId
        ]);
    }

    //Reserve seat
    public function reserveSeat($seatId){

        $query = "UPDATE seats SET is_booked = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':id' => $seatId
        ]);
    }
}

?>