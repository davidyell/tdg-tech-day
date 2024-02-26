<?php

declare(strict_types=1);

require './vendor/autoload.php';

use TdgTechDay\CoachTrip\CoachTrip;
use TdgTechDay\CoachTrip\People\Doctor;
use TdgTechDay\CoachTrip\People\Sculptor;

$s = ['seats' => 0, 'wheels' => -3, 'mpg' => false];
$c = new \TdgTechDay\CoachTrip\Coach($s);

$trip = new CoachTrip();
$trip->setDriver();
$trip->collectPassengers(-5);

$passengerOne = new Sculptor('', '', -3);
$passengerTwo = new Doctor('Gilbert', 'Grape', 34);
$trip->addPassenger($passengerOne);
$trip->addPassenger($passengerTwo);

var_dump(
    $trip->getCoach()->driver,
    $trip->getCoach()->rollCall(),
    $trip->getCoach()->isFull()
);