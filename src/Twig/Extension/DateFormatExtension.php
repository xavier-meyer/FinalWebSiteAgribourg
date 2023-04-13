<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\DateFormatRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DateFormatExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('convert_date_to_string', [DateFormatRuntime::class, 'convertDateTimeImmutableToString']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [DateFormatRuntime::class, 'doSomething']),
        ];
    }
}
