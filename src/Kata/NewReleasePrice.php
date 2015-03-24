<?php
namespace Kata;

/**
 * Class NewReleasePrice
 * @package Kata
 */
class NewReleasePrice extends Price {

    public function getPriceCode(){
        return Movie::NEW_RELEASE;
    }

    /**
     * @param $daysRented
     * @return float|int
     */
    public function getCharge($daysRented){
        return $daysRented * 3;
    }

}

?>