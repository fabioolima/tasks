<?php

namespace src;

/**
 * @package src
 */
class Trip
{
    /**
     * @var array
     */
    protected $boardings = array();

    function __construct($boardings)
    {
        $this->boardings = $boardings;
        $this->sort();
    }

    private function sort()
    {
        $this->arrangeFirstLast();
        $limit = count($this->boardings) - 1;

        for ($idx=0; $idx < $limit; $idx++) {
            foreach ($this->boardings as $key => $value) {
                if (strcasecmp($this->boardings[$idx]['arrival'], $value['departure']) == 0) {
                    $tempBoarding = $this->boardings[$idx + 1];
                    $this->boardings[$idx + 1] = $value;
                    $this->boardings[$key] = $tempBoarding;
                }
            }
        }
    }

    private function arrangeFirstLast()
    {

        $hasPrevious = false;
        $isLast      = true;
        $size        = count($this->boardings);

        for ($idx = 0; $idx < $size; $idx++) {
            foreach ($this->boardings as $value) {
                $hasPrevious = 0 == strcasecmp($this->boardings[$idx]['departure'], $value['arrival']) ? true : false;
                $isLast = 0 == strcasecmp($this->boardings[$idx]['arrival'], $value['departure']) ? false : true;
            }

            if (!$hasPrevious) {
                array_unshift($this->boardings, $this->boardings[$idx]);
                unset($this->boardings[$idx]);
            } else if ($isLast) {
                array_push($this->boardings, $this->boardings[$idx]);
                unset($this->boardings[$idx]);
            }
        }
        ksort($this->boardings);

        $this->boardings = array_values($this->boardings); 
    }

    /**
     * @return array
     */
    public function getTransports() : array 
    {
        $validTransports = array(
            'Bus', 'Plane', 'Train'
        );

        $transportList = [];

        if (count($this->boardings) == 0) {
            return $transportList;
        }

        foreach ($this->boardings as $boarding) {
            $type = ucfirst($boarding['type']);
            
            if (!in_array($type, $validTransports)) {
                throw new \Exception("This type of transport [" . $type . "] is invalid.");
            }

            $class = "src\\" . $type;

            $transportList[] = new $class($boarding);
        }

        return $transportList;
    }

    /**
     * @return string
     */
    public function tripString() : String
    {
        $arrResp = [];
        foreach ($this->getTransports() as $key => $transports) {
            $arrResp[][$key + 1] = $transports->toString();
        }
        return json_encode($arrResp);
    }
}