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

        $db = fopen(__DIR__ . "/../ticket.json", 'a+');
        fwrite($db, json_encode($entry) . PHP_EOL);
        fclose($db);

        return json_encode([
            "success" => true
        ]);
    }
}