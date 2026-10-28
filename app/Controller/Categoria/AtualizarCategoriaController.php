<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class AtualizarCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            if (empty($requestData['nome'])) {
                throw new \Exception('Informe o nome da categoria!');
            }

            $this->model->atualizar((int) ($requestData['id'] ?? 0), $requestData['nome']);
            $this->redirect('/categorias');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}