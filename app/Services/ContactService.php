<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function getAllContacts()
    {
        return Contact::orderBy('id', 'DESC')->with('user')->paginate(20);
    }

    public function getContactById($id)
    {
        return Contact::findOrFail($id);
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
    }
}