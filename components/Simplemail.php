<?php

require realpath(__DIR__).'/../vendor/autoload.php';
use Mailgun\Mailgun;

class Simplemail
{
    protected $to;
    protected $from;
    protected $sender;
    protected $sender_email;
    protected $subject;
    protected $html;

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function setFrom($from)
    {
        $this->from = $from;
    }

    public function setSender($sender)
    {
        $this->sender = $sender;
    }

    public function setSenderEmail($sender_email)
    {
        $this->sender_email = $sender_email;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function send()
    {
        $message  = 'Дата: ' . date('D, d M Y H:i:s') . PHP_EOL;
        $message .= 'От: ' . $this->sender . PHP_EOL;
        $message .= 'E-mail: ' . $this->sender_email . PHP_EOL;
        $message .= 'Тема: ' . $this->subject . PHP_EOL;
        $message .= '' . PHP_EOL;
        $message .= $this->message . PHP_EOL;


        # Instantiate the client.
        $mgClient = new Mailgun('key-c305f22a2743043db416e86a6dcf0f49');
        $domain = "sandboxadea2534f6be44f09e9f2e52d82ebdf7.mailgun.org";
                    
        # Make the call to the client.
        $result = $mgClient->sendMessage("$domain",
            array('from'    => $this->from,
                  'to'      => $this->to,
                  'subject' => 'Сообщение с сайта',
                  'text'    => $message));
    }
}