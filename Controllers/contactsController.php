<?php
require_once __DIR__ . '/../Models/contact.php';
require_once __DIR__ . '/../Core/db.php';
class ContactController
{
    public function index()
    {
        global $conn;
        $contact = new Contact($conn);
        $contacts = $contact->all();
        include __DIR__ . '/../Lists/contacts.php';
    }
    public function store()
    {
        global $conn;
        $contact = new Contact($conn);
        $contact->create($_POST);
        header("Location: /contacts");
    }
    public function edit($id)
    {
        global $conn;
        $contact = new Contact($conn);
        $item = $contact->find($id);
        include __DIR__ . '/../Lists/edit_contact.php';
    }
    public function update($id)
    {
        global $conn;
        $contact = new Contact($conn);
        $contact->update($id, $_POST);
        header("Location: /contacts");
    }
    public function destroy($id)
    {
        global $conn;
        $contact = new Contact($conn);
        $contact->delete($id);
        header("Location: /contacts");
    }
}
