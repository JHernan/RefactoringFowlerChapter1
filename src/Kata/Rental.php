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

}

?>