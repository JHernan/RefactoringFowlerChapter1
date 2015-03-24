<?php
namespace Kata;

/**
 * Class Rental
 * @package Kata
 */
class Rental
{
    private $movie;
    private $daysRented;

    public function __construct($movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function getDaysRented()
    {
        return $this->daysRented;
    }

    /**
     * @return mixed
     */
    public function getCharge(){
        return $this->getMovie()->getCharge($this->getDaysRented());
    }

    /**
     * @param $rental
     * @return mixed
     */
    public function calculateFrequentRenterPoints()
    {
        if ($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE && $this->getDaysRented() > 1)
            return 2;

        return 1;
    }

}

?>