<?php

namespace Tobi\BetternshipTest\Controllers;

use Exception;



class AdminController
{

    public function login(string $email, string $password)
    {
        if (empty($email) || empty($password)) {
            throw new Exception('All fields are required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email");
        }

        $path = __DIR__ . "/../admin.json";

        if (!is_readable($path)) {
            throw new Exception('Admin data not available');
        }

        $contents = file_get_contents($path);
        if ($contents === false) {
            throw new Exception('Failed to read admin data');
        }

        $check = json_decode($contents, true);
        if (!is_array($check) || !isset($check['email'], $check['password'])) {
            throw new Exception('Invalid admin data');
        }

        if (!password_verify($password, $check['password']) || $email !== $check['email']) {
            throw new Exception('Login failed!');
        }

        return true;
    }
}