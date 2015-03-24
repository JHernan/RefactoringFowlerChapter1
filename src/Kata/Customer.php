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
        $result = "Rental record for " . $this->getName() . "\n";
        foreach ($this->rentals as $rental) {
            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $rental->getCharge() . "\n";
        }

        $result .= "Amount owed is " . $this->calculateTotalCharge() . "\n";
        $result .= "You earned " . $this->calculateTotalFrequentRenterPoints() . " frequent renter points";

        return $result;
    }

    /**
     * @return int
     */
    private function calculateTotalCharge(){
        $totalCharge = 0;
        foreach($this->rentals as $rental){
            $totalCharge += $rental->getCharge();
        }
        return $totalCharge;
    }

    /**
     * @return int
     */
    private function calculateTotalFrequentRenterPoints(){
        $frequentRenterPoints = 0;
        foreach($this->rentals as $rental){
            $frequentRenterPoints += $rental->calculateFrequentRenterPoints();
        }
        return $frequentRenterPoints;
    }
}

?>