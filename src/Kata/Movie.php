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

    public function __construct($title, $priceCode)
    {
        $this->title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceCode()
    {
        return $this->price->getPriceCode();
    }

    /**
     * @param $price
     */
    public function setPriceCode($priceCode)
    {
        $factory = new PriceFactory();
        $this->price = $factory->create($priceCode);
    }

    /**
     * @param $daysRented
     * @return float|int
     */
    public function getCharge($daysRented){
        return $this->price->getCharge($daysRented);
    }

    /**
     * @param $daysRented
     * @return int
     */
    public function calculateFrequentRenterPoints($daysRented){
        return $this->price->calculateFrequentRenterPoints($daysRented);
    }

}

?>