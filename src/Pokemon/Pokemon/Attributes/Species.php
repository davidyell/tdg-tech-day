<?php
declare(strict_types=1);

namespace TdgTechDay\Pokemon\Pokemon\Attributes;

class Species
{
    /**
     * @param non-empty-string $name
     * @param non-empty-string $url
     */
    public function __construct(public string $name, public string $url)
    {
    }


}