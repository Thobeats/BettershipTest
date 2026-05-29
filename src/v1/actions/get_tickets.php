<?php
require __DIR__ . '/../../../vendor/autoload.php';

use Tobi\BetternshipTest\Controllers\TicketController;


if ($_SERVER['REQUEST_METHOD'] !== "GET")
    exit("wrong method");


try {

    $ticketController = new TicketController();

    $response = $ticketController->getTickets();

    echo $response;
} catch (Exception $e) {
    $err_response = [
        'message' => $e->getMessage(),
        'success' => false
    ];

    echo json_encode($err_response, JSON_PRETTY_PRINT);

    exit;
}