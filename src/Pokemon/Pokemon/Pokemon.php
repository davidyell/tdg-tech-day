<?php

declare(strict_types=1);

namespace TdgTechDay\Pokemon\Pokemon;

use TdgTechDay\Pokemon\Pokemon\Attributes\Ability;
use TdgTechDay\Pokemon\Pokemon\Attributes\Form;
use TdgTechDay\Pokemon\Pokemon\Attributes\Index;
use TdgTechDay\Pokemon\Pokemon\Attributes\Item;
use TdgTechDay\Pokemon\Pokemon\Attributes\Move;
use TdgTechDay\Pokemon\Pokemon\Attributes\Species;
use TdgTechDay\Pokemon\Pokemon\Attributes\Sprites;
use TdgTechDay\Pokemon\Pokemon\Attributes\Stat;
use TdgTechDay\Pokemon\Pokemon\Attributes\Type;

class Pokemon
{
    /**
     * @var Ability[]
     */
    public array $abilities;

    /**
     * @var positive-int
     */
    public int $base_experience;

    /**
     * @var Form[]
     */
    public array $forms;

    /**
     * @var Index[]
     */
    public array $game_indices;

    /**
     * @var positive-int
     */
    public int $height;

    /**
     * @var Item[]
     */
    public array $held_items;

    /**
     * @var positive-int
     */
    public int $id;

    public bool $is_default;

    /**
     * @var non-empty-string&non-falsy-string
     */
    public string $location_area_encounters;

    /**
     * @var Move[]
     */
    public array $moves;

    /**
     * @var non-empty-string&non-falsy-string
     */
    public string $name;

    /**
     * @var positive-int
     */
    public int $order;

    /**
     * @var Ability[]|null
     */
    public ?array $past_abilities;

    /**
     * @var Type[]|null
     */
    public ?array $past_types;

    public Species $species;

    public Sprites $sprites;

    /**
     * @var Stat[]
     */
    public array $stats;

    /**
     * @var Type[]
     */
    public array $types;

    /**
     * @var non-negative-int
     */
    public int $weight;
}