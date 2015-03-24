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

}

?>