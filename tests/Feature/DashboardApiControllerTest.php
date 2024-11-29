<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardApiControllerTest extends TestCase
{
    public function test_dashboard_api_returns_correct_counts()
    {
        // Hit API endpoint langsung
        $response = $this->getJson('/api/admin');

        // Verifikasi respon sesuai data di database lokal
        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'success',
                     'data' => [
                         'artikel_count',
                         'titik_count',
                     ],
                 ]);

        $response->assertJson([
            'success' => true,
            'data' => [
                'artikel_count' => 0,
                'titik_count' => 0, 
            ],
        ]);
    }
}
