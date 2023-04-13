<?php

namespace App\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ConvertVariableToFloatExtension  extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('convert_variable_to_float', [$this, 'convertVariableToFloat']),
        ];
    }

    public function convertVariableToFloat($value): float
    {
        $floatValue =  floatval($value);
        return number_format($floatValue, 2, '.', '');
    }
}
