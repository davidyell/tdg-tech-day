<?php
declare(strict_types=1);

namespace TdgTechDay\Pokemon\Pokemon\Attributes;

class Sprites
{
    /**
     * @param string|null $back_default
     * @param string|null $back_female
     * @param string|null $back_shiny
     * @param string|null $back_shiny_female
     * @param string|null $front_default
     * @param string|null $front_female
     * @param string|null $front_shiny
     * @param string|null $front_shiny_female
     * @param array{ dream_world: array<string, string|null>, home: array<string, string|null>, official-artwork: array<string, string|null>, showdown: array<string, string|null> } $other
     * @param array<string, mixed> $versions
     */
    public function __construct(
        public ?string $back_default,
        public ?string $back_female,
        public ?string $back_shiny,
        public ?string $back_shiny_female,
        public ?string $front_default,
        public ?string $front_female,
        public ?string $front_shiny,
        public ?string $front_shiny_female,
        public array $other,
        public array $versions
    )
    {
    }


}