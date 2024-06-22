<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Cookie;

class SetLangControllerTest extends TestCase
{
    /** @test */
    public function testSetLang()
    {
        $response = $this->withSession(['lang' => 'cym'])->get('/set-lang', ['redirect' => '/']);

        $response->assertRedirect('/');
        $this->assertEquals('en', session('lang'));
 
    }
}
