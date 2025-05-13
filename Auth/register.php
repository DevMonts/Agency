<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Crie sua conta para registrar uma agência</h2>
        <form action="#" method="POST">
            <div class="mb-4">
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                <input type="text" id="nome" name="nome" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="senha" class="block text-sm font-medium text-gray-700">Senha</label>
                <input type="password" id="senha" name="senha" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="confirmar_senha" class="block text-sm font-medium text-gray-700">Confirmar Senha</label>
                <input type="password" id="confirmar_senha" name="confirmar_senha" class="w-full p-3 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex items-center justify-between mb-4">
            </div>
            <div class="mb-6">
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md font-semibold text-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Criar Conta
                </button>
            </div>
            <div class="text-center">
                <p class="text-sm text-gray-600">Já tem uma conta? <a href="#" class="text-blue-500 hover:underline">Fazer login</a></p>
            </div>
        </form>
    </div>
</body>

</html>