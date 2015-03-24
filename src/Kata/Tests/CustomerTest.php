<?php
namespace Kata\Tests;

use Kata\Customer;
use Kata\Movie;
use Kata\Rental;
use PHPUnit_Framework_TestCase;

class CustomerTest extends PHPUnit_Framework_TestCase
{
    private $THE_HULK;
    private $IRON_MAN;
    private $SPIDER_MAN;

    private $customer;

    public function setUp(){
        $this->THE_HULK = new Movie('The Hulk', Movie::CHILDREN);
        $this->IRON_MAN = new Movie('Iron Man 4', Movie::NEW_RELEASE);
        $this->SPIDER_MAN = new Movie('Spiderman', Movie::REGULAR);

        $this->customer = new Customer('fred');
    }

    public function testBasicChildrenRental() {
        $rental = new Rental($this->THE_HULK, 2);
        $this->customer->addRental($rental);
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("The Hulk", 1.5, 1.5, 1));
    }

    public function testShouldDiscountChildrensRentals() {
        $this->customer->addRental(new Rental($this->THE_HULK, 4));
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("The Hulk", 3.0, 3.0, 1));
    }

    public function testBasicNewReleaseRental() {
        $this->customer->addRental(new Rental($this->IRON_MAN, 1));
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("Iron Man 4", 3.0, 3.0, 1));
    }

    public function testShouldNotDiscountNewReleaseRentalsButBonusFrequentRenterPoints() {
        $this->customer->addRental(new Rental($this->IRON_MAN, 4));
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("Iron Man 4", 12.0, 12.0, 2));
    }

    public function testBasicRegularRental() {
        $this->customer->addRental(new Rental($this->SPIDER_MAN, 2));
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("Spiderman", 2.0, 2.0, 1));
    }

    public function testShouldDiscountRegularRental() {
        $this->customer->addRental(new Rental($this->SPIDER_MAN, 4));
        $this->assertEquals($this->customer->statement(), $this->expectedMessageFor("Spiderman", 5.0, 5.0, 1));
    }

    public function testShouldSumVariousRentals() {
        $this->customer->addRental(new Rental($this->THE_HULK, 2));
        $this->customer->addRental(new Rental($this->SPIDER_MAN, 1));
        $this->customer->addRental(new Rental($this->IRON_MAN, 3));
        $this->assertEquals($this->customer->statement(), "Rental record for fred\n\tThe Hulk\t1,5\n\tSpiderman\t2\n\tIron Man 4\t9\nAmount owed is 12,5\nYou earned 4 frequent renter points");
    }

    private function expectedMessageFor($rental, $price, $total, $renterPointsEarned) {
        return "Rental record for fred\n\t" . $rental . "\t" . $price . "\nAmount owed is " . $total . "\nYou earned " . $renterPointsEarned . " frequent renter points";
    }
}

?>