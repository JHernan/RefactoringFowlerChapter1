<?php
namespace Kata;

/**
 * Class RegularPrice
 * @package Kata
 */
class RegularPrice extends Price {

    public function getPriceCode(){
        return Movie::REGULAR;
    }

}

?>