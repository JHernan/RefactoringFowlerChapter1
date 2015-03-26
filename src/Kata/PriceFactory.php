<?php
namespace Kata;

/**
 * Class Price
 * @package Kata
 */
class PriceFactory {

    protected $typeList;

    public function __construct(){
        $this->typeList = array(
            Movie::REGULAR => __NAMESPACE__ . '\RegularPrice',
            Movie::CHILDREN => __NAMESPACE__ . '\ChildrenPrice',
            Movie::NEW_RELEASE => __NAMESPACE__ . '\NewReleasePrice'
        );
    }

    public function create($type){
        if (!array_key_exists($type, $this->typeList)) {
            throw new \InvalidArgumentException("$type is not valid vehicle");
        }

        $className = $this->typeList[$type];

        return new $className;
    }

}

?>