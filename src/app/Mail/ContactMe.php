<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;

    // La vista puede acceder a las variables públicas.
    public $topic;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($topic)
    {
        $this->topic = $topic;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /**
         * - Crear email con format markdown:
         * php artisan make:mail ContactMe --markdown=emails.contact-me-md
         *
         * - Para editar el estilo del email:
         * php artisan vendor:publish --tag=laravel-mail
         *
         * Se creara la carpeta "views/vendor/email", donde podemos modificar los estilos,
         * incluso crear un css para usar de plantilla, estableciendolo en el fichero de
         * configuración "mail.php".
         */
        return $this->markdown('emails.contact-me-md')
            ->subject('More information about ' . $this->topic);
    }
}
