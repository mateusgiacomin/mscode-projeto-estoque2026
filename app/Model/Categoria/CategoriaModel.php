<?php

namespace App\Model\Categoria;

use App\Database\Query;

class CategoriaModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function cadastrar(string $nome): void
    {
        $dados = [
            'nome' => $nome,
        ];

        $resultado = $this->query->insert('categoria', $dados);

        if (! $resultado) {
            throw new \Exception('Erro ao criar categoria: ' . $nome);
        }
    }

    public function listar(): array
    {
        $resultado = $this->query->select('categoria');

        if ($resultado === false) {
            throw new \Exception('Erro ao listar categorias');
        }

        return $resultado;
    }

    public function buscar(int $id): array
{
    $resultado = $this->query->select('categoria', "id = {$id}");

    if (!$resultado) {
        throw new \Exception('Categoria não encontrada');
    }

    return $resultado[0];
}

public function atualizar(int $id, string $nome): void
{
    $dados = [
        'nome' => $nome,
    ];

    $resultado = $this->query->update('categoria', $dados, "id = {$id}");

    if (!$resultado) {
        throw new \Exception('Erro ao atualizar categoria: ' . $nome);
    }
}