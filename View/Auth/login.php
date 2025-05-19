<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Faça login na sua conta</h2>
        <?php
        session_start();
        if (!empty($_SESSION['error'])): ?>
            <p class="text-red-500 text-sm text-center mb-4"><?= $_SESSION['error'] ?></p>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <form method="POST" action="/login" class="space-y-4">
            <div>
                <label class="block text-gray-700 mb-1">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 mb-1">Senha</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-200">
                Entrar
            </button>
        </form>
        <p class="text-center text-sm text-gray-600 mt-4">
            Ainda não tem uma conta? <a href="/cadastro" class="text-blue-500 hover:underline">Criar conta</a>
        </p>
    </div>
</body>

</html>