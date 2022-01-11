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
        return $this;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $ip = $_SERVER['PROTOCOL'].'://'.$_SERVER["HTTP_HOST"];
        $this->hash = DB::table("membros")->where('email', $this->destinatario)->get()->toArray();
        $this->hash[0]->ip = $ip;
        return $this->from( $this->destinatario)
                ->subject("Obrigado por entrar nossa comunidade")
                ->view('bootstrap.mails.mail_newuser')->with(["user"=>$this->hash[0]]);    
    }
}
