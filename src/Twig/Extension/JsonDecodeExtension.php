<?php

namespace App\Twig\Extension;

use InvalidArgumentException;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class JsonDecodeExtension extends AbstractExtension
{

    public function getFunctions() : array
    {
        return [
            new TwigFunction('convert_json_to_array', [$this, 'convertJsonToArray']),
        ];
    }

    public function convertJsonToArray($jsonData) : array
    {
        if (is_string($jsonData)) {
            return json_decode($jsonData, true);
        } elseif (is_array($jsonData)) {
            return $jsonData;
        } else {
            throw new InvalidArgumentException('Le filtre "convert_json_to_array" ne peut être appliqué qu\'à une chaîne de caractères JSON ou un tableau.');
        }
    }

}

