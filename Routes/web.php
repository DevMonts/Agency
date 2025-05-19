<?php
require_once __DIR__ . '/../Controllers/contactController.php';
$route->get('/contacts', [ContactController::class, 'index']);
$route->get('/contacts/create', function () {
    include __DIR__ . '/../Lists/create_contact.php';
});
$route->post('/contacts/store', [ContactController::class, 'store']);
$route->get('/contacts/edit/{id}', [ContactController::class, 'edit']);
$route->post('/contacts/update/{id}', [ContactController::class, 'update']);
$route->get('/contacts/delete/{id}', [ContactController::class, 'destroy']);
