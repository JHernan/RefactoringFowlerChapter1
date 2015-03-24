<?php
namespace Kata;

/**
 * Class Movie
 * @package Kata
 */
class Movie
{
    const CHILDREN = 2;
    const REGULAR = 0;
    const NEW_RELEASE = 1;

    private $title;
    private $price;

    public function __construct($title, $price)
    {
        $this->title = $title;
        $this->setPriceCode($price);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceCode()
    {
        return $this->price->getPriceCode();
    }

    public function setPriceCode($price)
    {
        switch($price){
            case self::REGULAR:
                $this->price = new RegularPrice();
                break;
            case self::CHILDREN:
                $this->price = new ChildrenPrice();
                break;
            case self::NEW_RELEASE:
                $this->price = new NewReleasePrice();
                break;
        }
    }

    /**
     * @param $daysRented
     * @return float|int
     */
    public function getCharge($daysRented){
        $result = 0;
        switch ($this->getPriceCode()) {
            case self::REGULAR:
                $result += 2;
                if ($daysRented > 2)
                    $result += ($daysRented - 2) * 1.5;
                break;
            case self::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case self::CHILDREN:
                $result += 1.5;
                if ($daysRented > 3)
                    $result += ($daysRented - 3) * 1.5;
                break;
        }
        return $result;
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function calculateFrequentRenterPoints($daysRented){
        if ($this->getPriceCode() == self::NEW_RELEASE && $daysRented > 1)
            return 2;

        return 1;
    }

}

?>