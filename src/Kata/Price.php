<?php
namespace Kata;

/**
 * Class Price
 * @package Kata
 */
abstract class Price {

    abstract function getPriceCode();

    /**
     * @param $daysRented
     * @return int
     */
    public function calculateFrequentRenterPoints($daysRented){
        return 1;
    }

}

?>