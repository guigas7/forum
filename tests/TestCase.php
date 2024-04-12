<?php

namespace Tests;

use AllowDynamicProperties;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

#[AllowDynamicProperties] abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutVite();
    }
}
