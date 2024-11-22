<?php
namespace App\Services;

use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactService
{
public function getAllContacts(): Collection
{
return Contact::all();
}

public function createContact(array $data): Contact
{
return Contact::create($data);
}

public function updateContact(Contact $contact, array $data): Contact
{
$contact->update($data);
return $contact;
}

public function deleteContact(Contact $contact): void
{
$contact->delete();
}
}
