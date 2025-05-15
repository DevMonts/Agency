<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agências</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Nome da Agência</h1>
        <form id="formAgencia" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <input type="text" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>
            <div class="md:col-span-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Cadastrar</button>
            </div>
        </form>
        <div>
            <table class="min-w-full bg-white border">
                <tbody id="Agencies" class="text-sm">
                    <?php include('Lists/agencies.php'); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<?php
include 'conect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sql = "INSERT INTO agency (name) VALUES (?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $name);
    if ($stmt->execute()) {
        echo "Cadastrado";
    } else {
        echo "Erro";
    }
    $stmt = null;
    $pdo = null;
}
?>