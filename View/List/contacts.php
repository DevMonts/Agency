<h2>Lista de Contatos</h2>
<a href="/contacts/create">Novo Contato</a>
<table border="1" cellpadding="5">
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Email</th>
    <th>Telefone</th>
    <th>Ações</th>
  </tr>
  <?php foreach ($contacts as $c): ?>
    <tr>
      <td><?= $c['id'] ?></td>
      <td><?= $c['name'] ?></td>
      <td><?= $c['email'] ?></td>
      <td><?= $c['telefone'] ?></td>
      <td>
        <a href="/contacts/edit/<?= $c['id'] ?>">Editar</a> |
        <a href="/contacts/delete/<?= $c['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>