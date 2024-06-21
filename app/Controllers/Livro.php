<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ObraModel;
use App\Models\LivroModel;

class Livro extends BaseController
{
    private $obraModel;
    private $livroModel;

    public function __construct(){
        $this->obraModel = new ObraModel();
        $this->livroModel = new LivroModel();
    }

    public function index(){
        $obra = $this->obraModel->findAll();
        $livro = $this->livroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('livro/index.php',['listaObra'=>$obra,'listaLivro'=>$livro]);
        echo view('_partials/footer');
    }

    public function editar($id){
        $livro = $this->livroModel->find($id);
        $obra = $this->obraModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('livro/edit',['listaObra' => $obra, 'livro' => $livro]);
        echo view('_partials/footer');
    }


    public function cadastrar(){
        $livro = $this->request->getPost();
        $this->livroModel->save($livro);
        return redirect()->to('Livro/index');
    }

    public function salvar(){
        $livro = $this->request->getPost();
        $this->livroModel->save($livro);
        return redirect()->to('Livro/index');
    }

    public function excluir(){
        $livro = $this->request->getPost();
        $this->livroModel->delete($livro);
        return redirect()->to('Livro/index');
    }
}
