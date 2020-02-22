<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store()
    {
        Contact::create($this->validate_data());
    }

    public function show(Contact $contact)
    {
        return $contact;
    }

    public function update(Contact $contact)
    {
        $contact->update($this->validate_data());
    }

    private function validate_data()
    {
        return \request()->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'birthday'  => 'required',
            'company'   => 'required'
        ]);
    }
}
