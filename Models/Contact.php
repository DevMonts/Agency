<?php
class Contact
{
    private $db;
    public function __construct($conn)
    {
        $this->db = $conn;
    }
    public function all()
    {
        $stmt = $this->db->query("SELECT * FROM contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO contacts (name, email, telefone) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $data['telefone']]);
    }
    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE contacts SET name = ?, email = ?, telefone = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $data['telefone'], $id]);
    }
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contacts WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
