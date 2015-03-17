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
        $result = 0;
        switch ($rental->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($rental->getDaysRented() > 2)
                    $result += ($rental->getDaysRented() - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $result += $rental->getDaysRented() * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($rental->getDaysRented() > 3)
                    $result += ($rental->getDaysRented() - 3) * 1.5;
                break;
        }
        return $result;
    }
}

?>