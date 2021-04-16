<?php

namespace src;

/**
 * Class Bus
 */
class Bus extends AbstractTransport
{
    public function toString() : String
	{

		$resp = sprintf("Take the airport bus from %s to %s. Sit in seat %s.", 
                        $this->departure,
                        $this->arrival,
                        $this->seat
                       );

        $msgSeat = " No seat assignment.";
        if (!$this->hasSeat()){
            $msgSeat = sprintf(" Sit in seat %s.",
                             $this->seat
                            );
        }

		return $resp . $msgSeat;

	}

	private function hasSeat() : bool
    {
        return empty($this->seat);
    }

	
}