<?php
declare(strict_types=1);

namespace TdgTechDay\Pokemon;

use GuzzleHttp\Client;
use TdgTechDay\Pokemon\Pokemon\Attributes\Species;
use TdgTechDay\Pokemon\Pokemon\Attributes\Sprites;
use TdgTechDay\Pokemon\Pokemon\Pokemon;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Api
{
    private string $endpoint = "https://pokeapi.co/api/v2/pokemon/";

    private Client $client;

    private Serializer $serializer;

    public function __construct()
    {
        // Build Guzzle client
        $this->client = new Client([
            'base_uri' => $this->endpoint
        ]);

        // Build serializer
        $normalizers = [new ObjectNormalizer()];
        $encoders = [new JsonEncoder()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }

    /**
     * @param non-empty-string&non-falsy-string $name
     * @return Pokemon
     * @throws \Exception
     */
    public function fetchPokemon(string $name): Pokemon
    {
        $response = $this->client->get($name);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Something went wrong');
        }

        $pokemon = $this->serializer->deserialize(
            $response->getBody()->getContents(), Pokemon::class,
            'json',
            [
                ObjectNormalizer::CALLBACKS => [
                    'species' => static fn ($attributeValue) => new Species(
                        $attributeValue['name'],
                        $attributeValue['url']
                    ),
                    'sprites' => static fn ($attributeValue) => new Sprites(
                        $attributeValue['back_default'],
                        $attributeValue['back_female'],
                        $attributeValue['back_shiny'],
                        $attributeValue['back_shiny_female'],
                        $attributeValue['front_default'],
                        $attributeValue['front_female'],
                        $attributeValue['front_shiny'],
                        $attributeValue['front_shiny_female'],
                        $attributeValue['other'],
                        $attributeValue['versions'],
                    )
                ]
            ]
        );

        return $pokemon;
    }
}