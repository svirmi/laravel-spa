<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    /**
     * @test
     */
    public function a_contact_can_be_added()
    {
        $this->post('api/contacts', ['name' => 'Test Name']);

        $this->assertCount(1, Contact::all());
    }
}
