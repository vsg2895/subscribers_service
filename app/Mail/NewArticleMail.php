<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewArticleMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $description, $site_name)
    {
        $this->name = $name;
        $this->description = $description;
        $this->site_name = $site_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_USERNAME"), 'New Article')->subject($this->site_name)
            ->markdown('mail.new-article-mail', ['name' => $this->name, 'description' => $this->description]);

    }
}
