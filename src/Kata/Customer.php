<?php
namespace Kata;

/**
 * Class Customer
 * @package Kata
 */
class Customer
{
    private $name;
    private $rentals = array();

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addRental(Rental $rental)
    {
        array_push($this->rentals, $rental);
    }

    public function statement()
    {
        $totalAmount = 0;
        $frequentRenterPoints = 0;

        $result = "Rental record for " . $this->getName() . "\n";
        foreach ($this->rentals as $rental) {
            $frequentRenterPoints += $rental->calculateFrequentRenterPoints();

            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";

            $totalAmount += $rental->getCharge();
        }

        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;
    }
}

?>