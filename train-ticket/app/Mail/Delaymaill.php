<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Delaymaill extends Mailable
{
    use Queueable, SerializesModels;
    public $train_id;
    public $passenger_id;
    public $delay_time;
    /**
     * Create a new message instance.
     *
     * @param int $train_id
     * @param int $passenger_id
     * @param string $delay_time
     * @return void
     */
    public function __construct($train_id, $passenger_id, $delay_time)
    {
        $this->train_id = $train_id;
        $this->passenger_id = $passenger_id;
        $this->delay_time = $delay_time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Train Delay Notification From E-Train')->replyTo('isurangabtk@gmail.com')->from('contact@etrain.sanshine.lk')->markdown('emails.ticket.delaymaill');
    }
}
