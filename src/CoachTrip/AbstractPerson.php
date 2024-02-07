<?php
declare(strict_types=1);

namespace TdgTechDay\CoachTrip;

abstract class AbstractPerson implements PersonInterface
{
    /**
     * @param non-empty-string|non-falsy-string $firstName
     * @param non-empty-string|non-falsy-string $lastName
     * @param positive-int $age
     */
    public function __construct(
        public string $firstName,
        public string $lastName,
        public int $age
    )
    {
    }
}