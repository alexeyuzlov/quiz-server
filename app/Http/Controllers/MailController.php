<?php

namespace App\Http\Controllers;

use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::to(['sample@dev.com'])->send(new SampleMail());
    }
}
