<?php
// Class Reservation:

class Reservation
{

    private $id_reservation;


    /**
     * Get the value of id_reservation
     */
    public function getId_reservation()
    {
        return $this->id_reservation;
    }

    /**
     * Set the value of id_reservation
     *
     * @return  self
     */
    public function setId_reservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;

        return $this;
    }
}
