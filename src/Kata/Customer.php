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
            $amount = $this->amountFor($rental);

            // add frequent renter points
            $frequentRenterPoints++;
            // add bonus for a two day new release rental
            if ($rental->getMovie()->getPriceCode() == Movie::NEW_RELEASE && $rental->getDaysRented() > 1)
                $frequentRenterPoints++;

            // show figures for this rental
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . $amount . "\n";

            $totalAmount += $amount;
        }

        $result .= "Amount owed is " . $totalAmount . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points";

        return $result;
    }

    /**
     * @param $rental
     * @return float|int
     */
    private function amountFor($rental)
    {
        return $rental->getCharge();
    }
}

?>