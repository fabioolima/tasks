<?php

namespace src;

class Plane extends AbstractTransport
{

    protected $baggage;

    protected $gate;
    
    public function toString() : String
    {
        $resp = sprintf("From %s, take flight %s to %s. Gate %s, seat %s.",
                        $this->departure,
                        $this->transportNum,
                        $this->arrival,
                        $this->gate,
                        $this->seat
                       );

        $msgBaggage = " Baggage will we automatically transferred from your last leg.";
        if (!$this->hasBaggage()){
            $msgBaggage = sprintf(" Baggage drop at ticket counter %s.",
                             $this->baggage
                            );
        }

        return $resp . $msgBaggage;
    }

    private function hasBaggage() : bool
    {
        return empty($this->baggage);
    }
}