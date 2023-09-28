<?php

class UserRepository
{
    protected $db;

    public function __construct(
        Database $db
    ) {
        $this->db = $db;
    }

    public function registerUser(
        array $userData
    ): void {
        $this->db->insert('Users', $userData);
    }
}
