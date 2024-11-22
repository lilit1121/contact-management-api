<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    protected  $service;

    public function __construct(ContactService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return response()->json($this->service->getAllContacts());
    }

    public function store(ContactRequest $request)
    {
        return response()->json($this->service->createContact($request->validated()), 201);
    }

    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        return response()->json($this->service->updateContact($contact, $request->validated()));
    }

    public function destroy(Contact $contact)
    {
        $this->service->deleteContact($contact);
        return response()->json(null, 204);
    }
}
