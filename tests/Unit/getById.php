<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class getById extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/1');
        $response->assertStatus(200);
    }
}
