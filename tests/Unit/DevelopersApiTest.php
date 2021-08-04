<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class DevelopersApiTest extends TestCase
{
    public function testAuthorization()
    {
        $this->withHeaders([
            'Authorization' => '',
        ])->get(
            config('app.url').'/api/developers'
        )->assertStatus(400);

        $this->withHeaders([
            'Authorization' => '',
        ])->get(
            config('app.url').'developers/get/', 1
        )->assertStatus(400);
    }
}
