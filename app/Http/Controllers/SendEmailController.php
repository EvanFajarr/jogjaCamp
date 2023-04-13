<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\notifEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index(){
        $user = User::all();
        Mail::to('sese@gmail.com')->send(new notifEmail($user));
    }
}
