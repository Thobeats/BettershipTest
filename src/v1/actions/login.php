<?php
require __DIR__ . '/../../../vendor/autoload.php';

use Tobi\BetternshipTest\Controllers\AdminController;


if ($_SERVER['REQUEST_METHOD'] !== "POST")
    exit("wrong method");

try {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if (empty($email) || empty($password)) {
        throw new Exception("Email and password are required");
    }

    $adminController = new AdminController();
    $response = $adminController->login($email, $password);

    header('Location: /admin.php');
    exit;

} catch (Exception $e) {
    $logger->log($e->getMessage());
    $err_response = array(
        'message' => $e->getMessage(),
        'success' => false
    );

    echo json_encode($err_response, JSON_PRETTY_PRINT);
    exit;
}