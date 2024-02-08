<?php

declare(strict_types=1);

require './vendor/autoload.php';

use TdgTechDay\CoachTrip\CoachTrip;
use TdgTechDay\CoachTrip\People\Doctor;
use TdgTechDay\CoachTrip\People\Sculptor;

$trip = new CoachTrip();
$trip->setDriver();
$trip->collectPassengers(0);

$passengerOne = new Sculptor('', '', -5);
$passengerTwo = new Doctor('Gilbert', 'Grape', 0);
$trip->addPassenger($passengerOne);
$trip->addPassenger($passengerTwo);

var_dump(
    $trip->getCoach()->driver,
    $trip->getCoach()->rollCall(),
    $trip->getCoach()->isFull()
);