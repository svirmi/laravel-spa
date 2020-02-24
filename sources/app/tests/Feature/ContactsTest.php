<?php

namespace Tests\Feature;

use App\Contact;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }


    /**
     * @test
     */
    public function an_authenticated_user_can_add_contact()
    {
//        $this->withoutExceptionHandling();

        $this->post('api/contacts', $this->data());

        $contact = Contact::first();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@test.net', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('A Company Name', $contact->company);
    }

    /**
     * @test
     */
    public function a_contact_can_be_retrieved()
    {
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        $response = $this->get('/api/contacts/' . $contact->id . '?api_token=' . $this->user->api_token);

        $response->assertJson([
            'name'      => $contact->name,
            'email'     => $contact->email,
            'birthday'  => $contact->birthday,
            'company'   => $contact->company
        ]);
    }

    /**
     * @test
     */
    public function only_the_users_contacts_can_be_retrieved()
    {
        $contact = factory(Contact::class)->create(['user_id' => $this->user->id]);

        $anotherUser = factory(User::class)->create();

        $response = $this->get('/api/contacts/' . $contact->id . '?api_token=' . $anotherUser->api_token);

        $response->assertStatus(403);
    }

    /**
     * @test
     */
    public function a_contact_can_be_patched()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->patch('/api/contacts/' . $contact->id, $this->data());

        $contact = $contact->fresh();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@test.net', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('A Company Name', $contact->company);
    }

    /**
     * @test
     */
    public function an_unauthenticated_user_shoild_be_redirected_to_login()
    {
        $response = $this->post('api/contacts', array_merge($this->data(), ['api_token' => '']));

        $response->assertRedirect('/login');
        $this->assertCount(0, Contact::all());
    }

    /**
     * @test
     */
    public function a_list_of_contacts_can_be_fetched_for_an_authenticated_user()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();

        $contact1 = factory(Contact::class)->create(['user_id' => $user1->id]);
        $contact2 = factory(Contact::class)->create(['user_id' => $user2->id]);

        $response1 = $this->get('/api/contacts?api_token=' . $user1->api_token);

        $response1->assertJsonCount(1)->assertJson([['id' => $contact1->id]]);
    }

    /**
     * @test
     */
    public function a_contact_can_be_deleted()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->delete('/api/contacts/' . $contact->id, ['api_token' => $this->user->api_token]);

        $contact = $contact->fresh();

        $this->assertCount(0, Contact::all());
    }

    /**
     * @test
     */
    public function fields_are_required()
    {
        collect(['name','email','birthday','company'])->each(function ($field){
            $response = $this->post('api/contacts', array_merge($this->data(), [$field => '']));

            $response->assertSessionHasErrors($field);
            $this->assertCount(0,Contact::all());           // no record saved if no email provided
        });
    }

    /**
     * @test
     */
    public function birthdays_are_properly_stored()
    {
        $response = $this->post('api/contacts', array_merge($this->data()));

        $this->withoutExceptionHandling();

        $this->assertCount(1,Contact::all());
        $this->assertInstanceOf(Carbon::class, Contact::first()->birthday);
        $this->assertEquals('05-14-1988', Contact::first()->birthday->format('m-d-Y'));
    }

    /**
     * @test
     */
    public function email_must_be_a_valid_email()
    {
        $response = $this->post('api/contacts', array_merge($this->data(), ['email' => 'NOT an EMAIL']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0,Contact::all());
    }

    /**
     * @test
     */
    public function a_name_is_requred()
    {
        $response = $this->post('api/contacts', array_merge($this->data(), ['name' => '']));

        $response->assertSessionHasErrors('name');
        $this->assertCount(0,Contact::all());  // no record saved if no name provided, can be skipped because fields_are_required test covers all that
    }

    /**
     * @test
     */
    public function an_email_is_requred()
    {
        $response = $this->post('api/contacts', array_merge($this->data(), ['email' => '']));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0,Contact::all());  // no record saved if no name provided, can be skipped because fields_are_required test covers all that
    }

    private function data()
    {
        return [
            'name'      => 'Test Name',
            'email'     => 'test@test.net',
            'birthday'  => '05/14/1988',
            'company'   => 'A Company Name',
            'api_token' => $this->user->api_token,
        ];
    }
}
