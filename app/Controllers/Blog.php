<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Controllers\BaseController;

class Blog extends BaseController
{
	public function index()
	{

        $blogUser = new BlogModel();
		
        $data = [
            'user' => $blogUser->asObject()->findAll()
        ];
        
        echo view('blog/index', $data);
	}

    public function new(){
        echo view('blog/new.php');
    }

    public function crear(){
        
        $blogUser = new BlogModel();

        $blogUser->insert([
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('apellido')
        ]);

        return redirect()->to('/blog')->with('message', 'Usuario creado con exito');

    }

    public function edit($id = null){

        $blogUser = new BlogModel();

        if ($blogUser->find($id) == null)
        {
            echo "error";
        }  

        echo view('blog/edit', ['user' => $blogUser->asObject()->find($id)]);

    }

    public function update($id = null){

        $user = new BlogModel();

        if ($user->find($id) == null)
        {
            echo "error";
        }  

        $user->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('apellido')
        ]);

        return redirect()->to('/blog')->with('message', 'Usuario actualizado con exito');

    }

    public function delete($id = null){

        $blogUser = new BlogModel();

        $blogUser->delete($id);

        return redirect()->to('/blog')->with('message', 'borrado con exito');
    }
}
