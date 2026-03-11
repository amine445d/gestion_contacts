<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactService;

class ContactController extends Controller
{

    protected $contactService;

    // Injection de dépendance
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function index()
    {
        $contacts = $this->contactService->getAllContacts();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $this->contactService->createContact($request->all());

        return redirect()->route('contacts.index')
        ->with('success', 'Contact ajouté avec succès !');
    }

    public function edit($id)
    {
        $contact = $this->contactService->getContactById($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $this->contactService->updateContact($id, $request->all());

        return redirect()->route('contacts.index')
        ->with('success', 'Contact modifié avec succès !');
    }

    public function destroy($id)
    {
        $this->contactService->deleteContact($id);

        return redirect()->route('contacts.index')
        ->with('success', 'Contact supprimé avec succès !');
    }

}