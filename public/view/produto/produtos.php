<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MS Code - Projeto Estoque 2025</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="/assets/css/styles.css" rel="stylesheet">
</head>

<body>
  <main>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

    <div class="container py-5">
      <div class="mb-4 d-flex flex-row justify-content-between">
        <h1>Produtos</h1>
        <div>
          <a href="/novo_produto" class="btn btn-primary"><i class="bi bi-plus"></i>Novo produto</a>
        </div>
      </div>

      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Categoria Id</th>
            <th scope="col">Valor</th>
            <th scope="col">Qtd. Disponível</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($data['produtos'] as $produto) { ?>
            <tr>
              <th scope="row"><?= $produto['id'] ?></th>
              <td><?= htmlspecialchars($produto['nome']) ?></td>
              <td><?= htmlspecialchars($produto['descricao'] ?? '') ?></td>
              <td><?= $produto['categoria_id'] ?></td>
              <td>R$ <?= number_format($produto['valor'], 2, ',', '.') ?></td>
              <td><?= $produto['quantidade_disponivel'] ?></td>
              <td class="d-flex gap-1">
                <a href="/editar_produto?id=<?= $produto['id'] ?>" class="btn btn-secondary btn-sm" title="Editar">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="/excluir_produto" method="POST" class="d-inline"
                  onsubmit="return confirm('Excluir este produto?');">
                  <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                  <button type="submit" class="btn btn-danger btn-sm" title="Excluir">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>