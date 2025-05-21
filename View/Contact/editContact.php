<h2>Editar Contato</h2>
<form method="POST" action="/contacts/update/<?= $item['id'] ?>">
    <label>Nome: <input type="text" name="name" value="<?= $item['name'] ?>"></label><br>
    <label>Email: <input type="email" name="email" value="<?= $item['email'] ?>"></label><br>
    <label>Telefone: <input type="text" name="telefone" value="<?= $item['telefone'] ?>"></label><br>
    <button type="submit">Salvar</button>
</form>