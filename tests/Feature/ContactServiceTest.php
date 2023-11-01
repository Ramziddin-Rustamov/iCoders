<?php
use Tests\TestCase;
use App\Services\ContactService;
use App\Models\Contact;
use App\Models\User;

class ContactServiceTest extends TestCase
{
    public function testGetAllContacts()
    {
        $user = User::factory()->create();
        Contact::factory(20)->create(['user_id' => $user->id]);

        $contactService = new ContactService();
        $contacts = $contactService->getAllContacts();

        $this->assertCount(20, $contacts);
    }

    public function testGetContactById()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $contactService = new ContactService();
        $retrievedContact = $contactService->getContactById($contact->id);

        $this->assertEquals($contact->id, $retrievedContact->id);
    }

    public function testDeleteContact()
    {
        $user = User::factory()->create();
        $contact = Contact::factory()->create(['user_id' => $user->id]);

        $contactService = new ContactService();
        $contactService->deleteContact($contact->id);

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}