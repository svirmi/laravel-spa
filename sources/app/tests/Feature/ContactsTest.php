<?php

namespace Tests\Feature;

use App\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_contact_can_be_added()
    {
        $this->post('api/contacts', [
            'name'  => 'Test Name',
            'email' => 'test@test.net',
            'birthday' => '05/14/1988',
            'company'  => 'A Company Name'
        ]);

        $contact = Contact::first();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@test.net', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday);
        $this->assertEquals('A Company Name', $contact->company);
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
            'company'   => 'A Company Name'
        ];
    }
}