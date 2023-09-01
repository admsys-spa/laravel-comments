<?php

use Admsys\Comments\Tests\TestCase;
use Orchestra\Testbench\Factories\UserFactory;

use function Pest\Laravel\actingAs;

uses(TestCase::class)->in(__DIR__);

function login()
{
    $user = UserFactory::new()->create();

    actingAs($user);
}
