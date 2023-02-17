<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InscriptionTest extends TestCase
{
    function test_affichage_ecran_inscription()
    {
        $response = $this->get('/inscription');

        $response->assertStatus(200);
    }
}
