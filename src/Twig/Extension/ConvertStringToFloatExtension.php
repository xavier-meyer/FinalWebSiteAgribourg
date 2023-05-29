<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ConvertStringToFloatExtension  extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('convert_string_to_float', [$this, 'convertStringToFloat']),
        ];
    }

    public function convertStringToFloat($value): float
    {
        $floatValue = (float)str_replace(',', '.',$value);
        return number_format($floatValue, 2, '.', '');


    }
}
