<?php

declare(strict_types=1);

require './vendor/autoload.php';

use TdgTechDay\CoachTrip\CoachTrip;
use TdgTechDay\CoachTrip\Sculptor;

$trip = new CoachTrip();
$trip->setDriver();
$trip->collectPassengers(3);

$passenger = new Sculptor('', '', -5);
$trip->addPassenger($passenger);

var_dump(
    $trip->getCoach()->driver,
    $trip->getCoach()->rollCall(),
    $trip->getCoach()->isFull()
);