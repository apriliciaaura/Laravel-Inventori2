<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\DummyEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
 
		Mail::to("testing@example.com")->send(new DummyEmail());
 
		return "Email berhasil dikirim";
 
	}
}
