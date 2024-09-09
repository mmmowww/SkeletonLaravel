<?php

namespace App\Domain\Users\DTO;

class UserDTO
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     */
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
    ) {
    }
}
