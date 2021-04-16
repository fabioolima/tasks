<?php

namespace src;

/**
 * Class Train
 *
 * @package src\Transport
 */
class Train extends AbstractTransport
{

    public function toString() : String
    {
        $resp = sprintf("Take train %s from %s to %s. Sit in seat %s.", 
                        $this->transportNum,
                        $this->departure,
                        $this->arrival,
                        $this->seat
                       );

        return $resp;
    }
}