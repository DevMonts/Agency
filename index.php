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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agência</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans p-6">
    <div class="max-w-4xl mx-auto">
        <a href="View/Auth/login.php" class="inline-block mb-4 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Logoff</a>
        <h1 class="text-3xl font-bold mb-6">Contatos da Agência</h1>
        <table class="table-auto w-full bg-white shadow-md rounded mb-6">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left">ID</th>
                    <th class="px-4 py-2 text-left">Nome</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Contato</th>
                    <th class="px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $row): ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-2"><?= $row["id"] ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($row["name"]) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($row["email"]) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($row["phone"]) ?></td>
                        <td class="px-4 py-2 space-x-2">
                            <form method="POST" class="inline-flex space-x-1">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                <input type="text" name="name" value="<?= htmlspecialchars($row["name"]) ?>" required class="border rounded px-2 py-1">
                                <input type="email" name="email" value="<?= htmlspecialchars($row["email"]) ?>" required class="border rounded px-2 py-1">
                                <input type="text" name="phone" value="<?= htmlspecialchars($row["phone"]) ?>" required class="border rounded px-2 py-1">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Atualizar</button>
                            </form>
                            <a href="?delete=<?= $row["id"] ?>" onclick="return confirm('Certeza?')"
                                class="text-red-500 hover:underline">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST" class="bg-white shadow-md rounded p-4 space-y-4">
            <input type="hidden" name="action" value="create">
            <div class="flex flex-col sm:flex-row gap-4">
                <input type="text" name="name" placeholder="Nome" required class="flex-1 border rounded px-3 py-2">
                <input type="email" name="email" placeholder="Email" required class="flex-1 border rounded px-3 py-2">
                <input type="text" name="phone" placeholder="Contato" required class="flex-1 border rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Adicionar</button>
        </form>
    </div>
</body>

</html>