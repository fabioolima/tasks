<?php

namespace src;

/**
 * Class AbstractTransport
 *
 * @package src
 */
abstract class AbstractTransport implements ITransport
{

    /**
     * @var string
     */
    protected $transportNum;

    /**
     * @var string
     */
    protected $departure;

    /**
     * @var string
     */
    protected $arrival;

    /**
     * @var string
     */
    protected $seat;

    /**
     * @param array $trip
     */
    public function __construct(array $trip)
    {
        foreach ($trip as $key => $value) {
            $property = lcfirst($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
        
    }

}