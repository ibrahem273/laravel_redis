<?php

function sendMail($subject, $data, $to, $template)
{
    \Illuminate\Support\Facades\Mail::send($template, $data, function ($message) use ($to, $subject) {
        $message->subject($subject);
        $message->to($to);
    });


}
