<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class DateFormatRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function convertDateTimeImmutableToString($value) : string
    {
       $commandProductDate = $value;

       $formattedDate =  $commandProductDate->format("d-m-Y");

        return  $formattedDate;
    }
}
