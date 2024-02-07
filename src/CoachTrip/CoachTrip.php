<?php
declare(strict_types=1);

namespace TdgTechDay\CoachTrip;

use Faker\Factory;
use Faker\Generator;

class CoachTrip
{
    protected Coach $coach;

    protected PersonFactory $factory;

    private Generator $faker;

    public function __construct()
    {
        $this->coach = new Coach();
        $this->factory = new PersonFactory();
        $this->faker = Factory::create();
    }

    /**
     * We need a driver
     */
    public function setDriver(): void
    {
        /** @var CoachDriver $driver */
        $driver = $this->factory->make(CoachDriver::class, ['firstName' => 'Ray', 'lastName' => 'Finkle', 'age' => 52]);

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