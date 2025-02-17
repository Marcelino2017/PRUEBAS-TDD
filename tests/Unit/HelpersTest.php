<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase

{
    /**
     * A basic unit test example.
     */
    public function test_email_validation()
    {
        $response = mail_validation('marcelinomebe@gmail.com');
        $this->assertTrue($response);

        $response = mail_validation('Marcelino');
        $this->assertFalse($response);
    }
}
