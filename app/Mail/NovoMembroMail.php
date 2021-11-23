<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class NovoMembroMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->destinatario = $email;
        $this->hash = DB::table("membros")->where('email', $email)->get()->toArray();
        $ip = 'http://'.$_SERVER["HTTP_HOST"];
        $this->hash[0]->ip = $ip;
        return $this;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->from( $this->destinatario , "Animanquadri")
        return $this->from( $this->destinatario)
                ->subject("Obrigado por entrar nossa comunidade")
                //->with("$variaveis")
                ->view('bootstrap.mails.mail_newuser')->with(["user"=>$this->hash[0]]);
                
    }
}
