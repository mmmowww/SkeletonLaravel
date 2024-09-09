<?php

namespace Tests\Unit;

use App\Domain\Users\Tools\JwtService;
use App\Domain\Users\Tools\UsersService;
use App\Domain\Users\UsersManager;
use PHPUnit\Framework\TestCase;

class UserManagerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testUsersManager(): void
    {   //todo: Доделать тест менеджера
        $manager = new UsersManager(new  JwtService(), new UsersService());
    }
}
