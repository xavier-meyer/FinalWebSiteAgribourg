<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class NomProduitRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }
    // filtre php excert
    public function limiterNbDeCaracteresNomProduit($value) : string
    {
        if (strlen( $value) < 13) {
            return $value ;
        } else {
           $new = wordwrap($value, 14);
           $new = explode("\n", $new);
            $new = $new[0] . '...';

            return  $new ;

        }
    }
}
