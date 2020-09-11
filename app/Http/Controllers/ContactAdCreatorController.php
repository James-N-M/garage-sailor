<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Mail\ContactAdCreator;
use Illuminate\Support\Facades\Mail;

class ContactAdCreatorController extends Controller
{
    public function store(Ad $ad)
    {
        request()->validate(['body' => 'required']);

        Mail::to($ad->creator->email)
            ->send(new ContactAdCreator(request()->body));

        return redirect()->back()
            ->with(['message' => 'Email sent!']);
    }
}
