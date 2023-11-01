<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\ContactService;

class AdminContactController extends Controller
{
    protected $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();
        return view('admin.contact.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = $this->contactService->getContactById($id);
        return view('admin.contact.view', compact('contact'));
    }

    public function delete($id)
    {
        $this->contactService->deleteContact($id);
        return redirect()->route('admin.contacts.index')->with('success', 'Deleted Successfully!');
    }
}