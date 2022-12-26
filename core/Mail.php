<?php
class Mail
{
    private $to;
    private $subject;
    private $message;
    private $headers;
    private $parameters;

    function __construct($to = null, $subject = null, $message = null, $headers = null, $parameters = null)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = $headers;
        $this->parameters = $parameters;
    }

    function to($to)
    {
        $this->to = $to;
    }
    function setSubject($subject)
    {
        $this->$subject = $subject;
    }
    function setMessage($message)
    {
        $this->$message = $message;
    }
    function setHeaders($headers)
    {
        $this->headers = $headers;
    }
    function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    function send() {
        if (empty($this->headers)) {
            mail($this->to, $this->subject, $this->message);
        } elseif(empty($this->parameters)) {
            mail($this->to, $this->subject, $this->message, $this->headers);
        } else {
            mail($this->to, $this->subject, $this->message, $this->headers, $this->parameters);
        }
    }
}
