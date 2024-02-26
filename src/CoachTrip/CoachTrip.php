<?php
declare(strict_types=1);

namespace TdgTechDay\CoachTrip;

use Faker\Factory;
use Faker\Generator;
use TdgTechDay\CoachTrip\People\AbstractPerson;
use TdgTechDay\CoachTrip\People\CoachDriver;
use TdgTechDay\CoachTrip\People\Doctor;
use TdgTechDay\CoachTrip\People\Electrician;
use TdgTechDay\CoachTrip\People\Engineer;
use TdgTechDay\CoachTrip\People\PersonFactory;
use TdgTechDay\CoachTrip\People\Sculptor;
use TdgTechDay\CoachTrip\People\TruckDriver;

/**
 * @phpstan-import-type Driver from Coach
 * @phpstan-import-type CoachSpecs from Coach
 */
class CoachTrip
{
    protected Coach $coach;

    protected PersonFactory $factory;

    private Generator $faker;

    public function __construct()
    {
        /** @var CoachSpecs $coachSpecs */
        $coachSpecs = ['seats' => 75, 'wheels' => 4, 'mpg' => 65];
        $this->coach = new Coach($coachSpecs);
        $this->factory = new PersonFactory();
        $this->faker = Factory::create();
    }

    /**
     * We need a driver
     *
     * @param ?Driver $driver
     */
    public function setDriver($driver = null): void
    {
        if ($driver === null) {
            /** @var CoachDriver $driver */
            $driver = $this->factory->make(CoachDriver::class, ['firstName' => 'Ray', 'lastName' => 'Finkle', 'age' => 52]);
        }

        $this->coach->driver = $driver;
    }

    /**
     * Let's pickup some passengers
     *
     * @param positive-int $passengerCount
     */
    public function collectPassengers(int $passengerCount): void
    {
        $people = [CoachDriver::class, Doctor::class, Electrician::class, Engineer::class, Sculptor::class, TruckDriver::class];

        for($i = 0; $i < $passengerCount; $i++) {
            /** @var class-string<AbstractPerson> $typeOfPerson */
            $typeOfPerson = $people[array_rand($people)];

            /** @var AbstractPerson $person */
            $person = $this->factory->make(
                $typeOfPerson,
                [
                    'firstName' => $this->faker->firstName,
                    'lastName' => $this->faker->lastName,
                    'age' => $this->faker->numberBetween(18, 100)
                ]
            );

            $this->coach->passengers[] = $person;
        }
    }

    public function addPassenger(AbstractPerson $passenger): void
    {
        $this->coach->passengers[] = $passenger;
    }

    public function getCoach(): Coach
    {
        return $this->coach;
    }
}