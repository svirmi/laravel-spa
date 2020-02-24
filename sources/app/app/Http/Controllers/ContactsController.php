<?php

namespace App\Http\Controllers;

use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        return request()->user()->contacts;
    }

    public function store()
    {
        request()->user()->contacts()->create($this->validate_data());
    }

    public function show(Contact $contact)
    {
        if(request()->user()->isNot($contact->user)) {
            return response([],403);
        }

        return $contact;
    }

    public function update(Contact $contact)
    {
        $contact->update($this->validate_data());
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
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
