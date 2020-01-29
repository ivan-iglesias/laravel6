<?php

namespace App;

use Illuminate\Support\Facades\Facade;

/**
 * En Tinker provamos que funciona ejecutando:
 *
 * App\ExampleFacade::go();
 */
class ExampleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        /**
         * Buscando la key en el contenedor.
         */
        return 'example';

        /**
         * Instancia directamente la clase, si el constructor de la clase tuviese argumentos
         * habria que hacerlo mediante key (podemos usar Example::class como key)
         */
        return Example::class;
    }
}
