<?php
require_once "conect.php";
function createContact($pdo, $name, $email, $phone)
{
    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $phone]);
}
function updateContact($pdo, $id, $name, $email, $phone)
{
    $stmt = $pdo->prepare("UPDATE contacts SET name=?, email=?, phone=? WHERE id=?");
    $stmt->execute([$name, $email, $phone, $id]);
}
function deleteContact($pdo, $id)
{
    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id=?");
    $stmt->execute([$id]);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["action"])) {
        if ($_POST["action"] === "create") {
            createContact($pdo, $_POST["name"], $_POST["email"], $_POST["phone"]);
        } elseif ($_POST["action"] === "update") {
            updateContact($pdo, $_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"]);
        }
    }
} elseif (isset($_GET["delete"])) {
    deleteContact($pdo, $_GET["delete"]);
}
$stmt = $pdo->query("SELECT * FROM contacts ORDER BY id DESC");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Contacts CRUD</title>
</head>

<body>
    <h1>Contact List</h1>
    <table border="1" cellpadding="6">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contacts as $row): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><?= htmlspecialchars($row["email"]) ?></td>
                <td><?= htmlspecialchars($row["phone"]) ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $row["id"] ?>">
                        <input type="text" name="name" value="<?= htmlspecialchars($row["name"]) ?>" required>
                        <input type="email" name="email" value="<?= htmlspecialchars($row["email"]) ?>" required>
                        <input type="text" name="phone" value="<?= htmlspecialchars($row["phone"]) ?>" required>
                        <button type="submit">Update</button>
                    </form>
                    <a href="?delete=<?= $row["id"] ?>" onclick="return confirm('Delete this contact?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Add New Contact</h2>
    <form method="POST">
        <input type="hidden" name="action" value="create">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <button type="submit">Add</button>
    </form>
</body>

</html>