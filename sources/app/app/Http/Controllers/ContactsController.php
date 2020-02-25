<?php

namespace App\Http\Controllers;

use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Contact::class);

        return request()->user()->contacts;
    }

    public function store()
    {
        $this->authorize('create', Contact::class);

        request()->user()->contacts()->create($this->validate_data());
    }

    public function show(Contact $contact)
    {
        $this->authorize('view', $contact);

        return $contact;
    }

    public function update(Contact $contact)
    {
        $this->authorize('update', $contact);

        $contact->update($this->validate_data());
    }

    public function destroy(Contact $contact)
    {
        $this->authorize('delete', $contact);

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
