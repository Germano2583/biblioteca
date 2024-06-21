<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AlunoModel;

class Aluno extends BaseController{   
    private $alunoModel;
    
    public function __construct(){
        $this->alunoModel = new AlunoModel();
    }
    
    public function index(){
        $dados = $this->alunoModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/index.php',['listaAlunos' => $dados]);
        echo view('_partials/footer');
    }

    public function cadastrar(){
        $aluno = $this->request->getPost();
        $aluno['senha']= md5("senhaforte");
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function editar($id){
        $dados = $this->alunoModel->find($id);
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('aluno/edit',['aluno' => $dados]);
        echo view('_partials/footer');
    }

    public function salvar(){
        $aluno = $this->request->getPost();
        $this->alunoModel->save($aluno);
        return redirect()->to('Aluno/index');
    }

    public function excluir(){
        $aluno = $this->request->getPost();
        $this->alunoModel->delete($aluno);
        return redirect()->to('Aluno/index');
    }

}
