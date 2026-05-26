<?php

use Tobi\BetternshipTest\Controllers\TicketController;


if ($_SERVER['REQUEST_METHOD'] !== "POST")
    exit("wrong method");


try {

    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $title = $_POST['title'] ?? "";

    $description = $_POST['description'] ?? "";

    $ticketController = new TicketController();

    $response = $ticketController->createTicket($name, $email, $title, $description);

    exit('/index.php');

} catch (Exception $e) {
    $logger->log($e->getMessage());
    $err_response = [
        'message' => $e->getMessage(),
        'success' => false
    ];

    echo json_encode($err_response, JSON_PRETTY_PRINT);

    exit;
}