<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class registerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
           // $this->assertTrue(true);
    }
}
