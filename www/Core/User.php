<?php

namespace App\Core;

class User
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function isLogged(): bool
    {
        return isset($_SESSION['firstname']);
    }

    public function getRoles(): array
    {
        return $_SESSION['roles'] ?? [];
    }

    public function logout(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}
