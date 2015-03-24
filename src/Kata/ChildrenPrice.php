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

}

?>