<?php

namespace App\Example;

use Illuminate\Support\Facades\Facade;

/**
 * En Tinker probamos que funciona ejecutando:
 *
 *      App\ExampleFacade::go();
 *
 * Si queremos usarla sin el 'App\', deberemos añadir el alias en la seccion aliases
 * del fichero config\app.php.
 *
 *      ExampleFacade::go();
 *
 *      'aliases' => [
 *          ...
 *          'ExampleFacade' => App\ExampleFacade::class,
 *      ]
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
        // return Example::class;
    }
}
