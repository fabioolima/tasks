<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use src\Trip;

$boardsCol = json_decode($argv[1], true);

$trip = new Trip($boardsCol);

echo $trip->tripString();


//"[{\"departure\":\"Stockholm\",\"arrival\":\"New York\",\"type\":\"Plane\",\"TransportationNumber\":\"SK22\",\"Seat\":\"7B\",\"Gate\":\"22\"},{\"departure\":\"Madrid\",\"arrival\":\"Barcelona\",\"type\":\"Train\",\"TransportationNumber\":\"78A\",\"Seat\":\"45B\"},{\"departure\":\"Gerona Airport\",\"arrival\":\"Stockholm\",\"type\":\"Plane\",\"TransportationNumber\":\"SK455\",\"Seat\":\"3A\",\"Gate\":\"45B\",\"Baggage\":\"334\"},{\"departure\":\"Barcelona\",\"arrival\":\"Gerona Airport\",\"type\":\"Bus\"}]"