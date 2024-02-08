<?php

declare(strict_types=1);

use TdgTechDay\Pokemon\Api;

require './vendor/autoload.php';

$api = new Api();
$pokemon = $api->fetchPokemon('meowth');

echo "Name: " . ucfirst($pokemon->name) . "\n";
echo "Height: $pokemon->height\n";
echo "Weight: $pokemon->weight\n";
echo "Sprite: " . $pokemon->sprites->front_default . "\n";
echo "Species url: " . $pokemon->species->url . "\n";