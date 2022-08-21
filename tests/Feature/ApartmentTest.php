<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApartmentTest extends TestCase
{
    public function test_apartment()
    {
        $response = $this->getJson('api/aparments')->assertStatus(200);
    }
}
