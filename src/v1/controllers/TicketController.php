<?php


namespace Tobi\BetternshipTest\Controllers;

use Exception;




class TicketController
{


    public function createTicket(string $fullname, string $email, string $title, string $description)
    {
        /// Validate inputs
        if (empty($fullname) || empty($email) || empty($title) || empty($description)) {
            throw new Exception('All fields are required');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email");
        }

        /// save the input

        $entry = [
            "ticket_id" => uniqid(),
            "name" => trim($fullname),
            "email" => trim($email),
            "title" => trim($title),
            "description" => trim($description),
            "created_at" => date('Y-m-d'),
            "status" => "open"
        ];

        $path = __DIR__ . "/../ticket.json";
        $contents = is_file($path) ? file_get_contents($path) : false;
        $tickets = [];

        if ($contents !== false && trim($contents) !== '') {
            $decoded = json_decode($contents, true);

            if (is_array($decoded)) {
                $tickets = array_is_list($decoded) ? $decoded : [$decoded];
            }
        }

        $tickets[] = $entry;

        file_put_contents($path, json_encode($tickets, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL, LOCK_EX);

        return json_encode([
            "success" => true
        ]);
    }

    public function getTickets()
    {
        $path = __DIR__ . "/../ticket.json";
        $contents = is_file($path) ? file_get_contents($path) : false;
        $tickets = [];

        if ($contents !== false && trim($contents) !== '') {
            $decoded = json_decode($contents, true);

            if (is_array($decoded)) {
                $tickets = array_is_list($decoded) ? $decoded : [$decoded];
            }
        }

        return json_encode([
            "success" => true,
            "data" => $tickets
        ]);
    }
}