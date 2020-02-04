<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        /**
         * En config/mail.php tenemos la configuración de envio de correos. Podemos añadir en
         * ".env" el MAIL_FROM_ADDRESS para que los correos se envien con la cuenta deseada.
         *
         * MAIL_FROM_ADDRESS=admin@example.com
         *
         * -------------------------------------------------------
         * It works!
         * [2020-02-04 16:53:32] local.DEBUG: Message-ID: <08f4ffd5ea3a62981dacfd7d85bee8f5@swift.generated>
         * Date: Tue, 04 Feb 2020 16:53:32 +0000
         * Subject: Hello There
         * From: Example <admin@example.com>
         * To: foo@gmail.com
         * MIME-Version: 1.0
         * Content-Type: text/plain; charset=utf-8
         * Content-Transfer-Encoding: quoted-printable
         */
        Mail::raw('It works!', function($message) {
            $message->to(request('email'))
                    ->subject('Hello There');
        });

        return redirect('/contact')
            ->with('message', 'Email sent!');
    }
}
