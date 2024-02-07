<?php

declare(strict_types=1);

require './vendor/autoload.php';

use TdgTechDay\CoachTrip\CoachTrip;

$trip = new CoachTrip();
$trip->setDriver();
$trip->collectPassengers(3);

$trip->addPassenger(new \TdgTechDay\CoachTrip\Sculptor('', '', -5));

var_dump(
    $trip->getCoach()->driver,
    $trip->getCoach()->rollCall(),
    $trip->getCoach()->isFull()
);