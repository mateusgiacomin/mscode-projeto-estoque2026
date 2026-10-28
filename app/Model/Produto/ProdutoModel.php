<?php

namespace App\Model\Produto;

use App\Database\Query;

class ProdutoModel
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function cadastrar(string $nome, string $descricao, int $categoriaId, int $quantidade, float $valor): void
    {
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoriaId,
            'quantidade_inicial' => $quantidade,
            'quantidade_disponivel' => $quantidade,
            'valor' => $valor,
        ];

        $resultado = $this->query->insert('produto', $dados);

        if (! $resultado) {
            throw new \Exception('Erro ao cadastrar produto: ' . $nome);
        }
    }

    public function listar(): array
    {
        $resultado = $this->query->select('produto');

        if ($resultado === false) {
            throw new \Exception('Erro ao listar produtos');
        }

        return $resultado;
    }

    public function buscar(int $id): array
    {
        $resultado = $this->query->select('produto', "id = {$id}");

        if (!$resultado) {
            throw new \Exception('Produto não encontrado');
        }

        return $resultado[0];
    }

    public function atualizar(int $id, string $nome, string $descricao, int $categoriaId, float $valor): void
    {
        $dados = [
            'nome' => $nome,
            'descricao' => $descricao,
            'categoria_id' => $categoriaId,
            'valor' => $valor,
        ];

        $resultado = $this->query->update('produto', $dados, "id = {$id}");

        if (!$resultado) {
            throw new \Exception('Erro ao atualizar produto: ' . $nome);
        }
    }

    public function excluir(int $id): void
    {
        $resultado = $this->query->delete('produto', "id = {$id}");

        if (!$resultado) {
            throw new \Exception('Erro ao excluir produto');
        }
    }
}