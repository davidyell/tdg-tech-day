<?php
declare(strict_types=1);

namespace TdgTechDay\CoachTrip;

/**
 * @see https://refactoring.guru/design-patterns/factory-method
 */
class PersonFactory
{
    /**
     * @phpstan-template T of AbstractPerson
     * @param class-string<T> $className
     * @param array{ firstName: string, lastName: string, age: int } $attributes
     * @return AbstractPerson
     */
    public function make(string $className, array $attributes)
    {
        return new $className(
            firstName: $attributes['firstName'],
            lastName: $attributes['lastName'],
            age: $attributes['age']
        );
    }
}