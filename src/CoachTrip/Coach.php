<?php

declare(strict_types=1);

namespace TdgTechDay\CoachTrip;

use TdgTechDay\CoachTrip\People\AbstractPerson;
use TdgTechDay\CoachTrip\People\CoachDriver;
use TdgTechDay\CoachTrip\People\TruckDriver;

/**
 * @phpstan-type CoachSpecs array{ seats: int, wheels: int, mpg: float }
 * @phpstan-type Driver CoachDriver|TruckDriver
 */
class Coach
{
    /**
     * @var Driver
     */
    public $driver;

    /**
     * @var CoachSpecs
     */
    protected array $specifications = [
        'seats' => 50,
        'wheels' => 6,
        'mpg' => 25.78
    ];

    /**
     * @var AbstractPerson[]
     */
    public array $passengers;

    /**
     * @return CoachSpecs
     */
    public function getCoachSpecs(): array
    {
        return $this->specifications;
    }

    /**
     * @return string[]
     */
    public function rollCall(): array
    {
        return array_map(static fn (AbstractPerson $person) => sprintf('%s %s | %s', $person->firstName, $person->lastName, (new \ReflectionClass($person))->getShortName()), $this->passengers);
    }

    /**
     * @return non-negative-int
     */
    public function headCount(): int
    {
        return count($this->passengers);
    }

    public function isFull(): bool
    {
        return $this->headCount() >= $this->specifications['seats'];
    }
}