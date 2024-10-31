<?php

namespace App\Controllers;

use App\Models\ProdutoModel;
use CodeIgniter\Controller;

class ProdutoController extends Controller
{
    protected $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

    public function index()
    {
        $data['produtos'] = $this->produtoModel->paginate(1); // 10 produtos por página
        $data['pager'] = $this->produtoModel->pager; // Obter o objeto de paginação

        return view('produtos/index', $data);
    }



    public function create()
    {
        return view('produtos/create');
    }

    public function store()
    {
        $this->produtoModel->save([
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao'),
            'preco' => $this->request->getPost('preco'),
        ]);
        return redirect()->to('/produtos');
    }


    public function edit($id)
    {
        $data['produto'] = $this->produtoModel->find($id);
        return view('produtos/edit', $data);
    }

    public function update($id)
    {
        $this->produtoModel->update($id, [
            'nome' => $this->request->getPost('nome'),
            'descricao' => $this->request->getPost('descricao'),
            'preco' => $this->request->getPost('preco'),
        ]);
        return redirect()->to('/produtos');
    }

    public function delete($id)
    {
        $this->produtoModel->delete($id);
        return redirect()->to('/produtos');
    }



}
