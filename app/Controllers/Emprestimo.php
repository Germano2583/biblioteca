<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\EmprestimoModel;
use App\Models\LivroModel;
use App\Models\AlunoModel;
use App\Models\UsuarioModel;
use App\Models\ObraModel;

class Emprestimo extends BaseController
{
    private $EmprestimoModel;
    private $livroModel;
    private $alunoModel;
    private $usuarioModel;
    private $obraModel;
    
    public function __construct(){
        $this->EmprestimoModel = new EmprestimoModel();
        $this->livroModel = new LivroModel();
        $this->alunoModel = new AlunoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->obraModel = new ObraModel();
    }
    
    public function index(){
        $emprestimo = $this->EmprestimoModel->findAll();
        $livro = $this->livroModel->findAll();
        $dadosobra = $this->obraModel->findAll();
        $aluno = $this->alunoModel->findAll();
        $usuario = $this->usuarioModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/index.php',['listaEmprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaAluno'=> $aluno,'listaUsuario'=>$usuario,'listaObra' => $dadosobra]);
        echo view('_partials/footer');
    }

    public function cadastrar()
    {
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 0]);
        return redirect()->to('emprestimo/index');
    }
    public function editar($id)
    {
        $dados = $this->EmprestimoModel->find($id);
        if($dados['data_fim'] == 0){
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 1]);};
        $dadosaluno = $this->alunoModel->findAll();
        $dadosobra = $this->obraModel->findAll();
        $dadosusuario = $this->usuarioModel->findAll();
        $dadoslivro = $this->livroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('emprestimo/edit',['emprestimo' => $dados,'listaAluno' => $dadosaluno,'listaLivro' => $dadoslivro,'listaUsuario' => $dadosusuario,'listaObra' => $dadosobra]);
        echo view('_partials/footer');
    }
    public function salvar(){
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 0]);
        return redirect()->to('emprestimo/index');
    }
    public function salvardev(){
        $dados = $this->request->getPost();
        $this->EmprestimoModel->save($dados);
        $this->livroModel->update($dados['id_livro'], ['disponivel' => 1]);
        return redirect()->to('emprestimo/index');
    }
    public function excluir(){
        $dados = $this->request->getPost();
        $this->EmprestimoModel->delete($dados);
        return redirect()->to('emprestimo/index');
    }

    public function devolucao($id){
        $emprestimo = $this->EmprestimoModel->find($id);
        $dadosobra = $this->obraModel->findAll();
        $livro = $this->livroModel->findAll();
        echo view('_partials/header');
        echo view('_partials/navbar');
        echo view('devolução/index.php',['emprestimo'=>$emprestimo,'listaLivro'=>$livro,'listaObra' => $dadosobra]);
        echo view('_partials/footer');
    }
}
