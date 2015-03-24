<?php
namespace Kata;

/**
 * Class ChildrenPrice
 * @package Kata
 */
class ChildrenPrice extends Price {

    public function getPriceCode(){
        return Movie::CHILDREN;
    }

    /**
     * @param $daysRented
     * @return float|int
     */
    public function getCharge($daysRented){
        $result = 1.5;
        if ($daysRented > 3)
            $result += ($daysRented - 3) * 1.5;

        return $result;
    }

}

?>