<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function getMail()
    {
    	$data = ['name' => 'Mau' ];
    	Mail::to('rubenoctavio@itsn.edu.mx')->send(new TestMail($data));
    }
}
