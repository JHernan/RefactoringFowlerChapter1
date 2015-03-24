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
     * @return float|int
     */
    public function getCharge($daysRented){
        $result = 0;
        switch ($this->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2;
                if ($daysRented > 2)
                    $result += ($daysRented - 2) * 1.5;
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($daysRented > 3)
                    $result += ($daysRented - 3) * 1.5;
                break;
        }
        return $result;
    }

}

?>