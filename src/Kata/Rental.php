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

    public function getCharge(){
        $result = 0;
        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($this->getDaysRented() > 2)
                    $result += ($this->getDaysRented() - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($this->getDaysRented() > 3)
                    $result += ($this->getDaysRented() - 3) * 1.5;
                break;
        }
        return $result;
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