<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductosModel;
use App\Models\ProvedoresModel;

class Productos extends BaseController
{

    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $productosModel = new ProductosModel();
        $data['productos']=$productosModel-> productosProvedor();
        return View('productos/index',$data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $provedoresModel = new ProvedoresModel();
        $data['provedores']=$provedoresModel->findAll();
        return view('productos/nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $reglas=[
            'clave'=>'required|min_length[5]|max_length[10]|is_unique[productos.clave]',
            'nombre'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'fecha_caducidad'=>'required',
            'provedor'=>'required|is_not_unique[provedores.id]'
        ];

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }

        $post=$this->request->getPost(['clave','nombre','categoria','descripcion','fecha_caducidad','provedor']);

        $productosModel = new ProductosModel();
        $productosModel->insert([
            'clave'=>trim($post['clave']),
            'nombre'=>trim($post['nombre']),
            'categoria'=>$post['categoria'],
            'descripcion'=>$post['descripcion'],
            'fecha_caducidad'=>$post['fecha_caducidad'],
            'id_provedor'=>$post['provedor'],
        ]);

        return redirect()->to('productos');
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        if($id==null){
            return redirect()->route('productos');
        }
        $productosModel= new ProductosModel();
        $provedoresModel = new ProvedoresModel();
        $data['provedores']=$provedoresModel->findAll();
        $data['producto']= $productosModel->find($id);
        return view('productos/editar', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $reglas=[
            'clave'=>"required|min_length[5]|max_length[10]|is_unique[productos.clave, id,{$id}]",
            'nombre'=>'required',
            'categoria'=>'required',
            'descripcion'=>'required',
            'fecha_caducidad'=>'required',
            'provedor'=>'required|is_not_unique[provedores.id]'
        ];

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('error',$this->validator->listErrors());
        }

        $post=$this->request->getPost(['clave','nombre','categoria','descripcion','fecha_caducidad','provedor']);

        $productosModel = new ProductosModel();
        $productosModel->update($id,[
            'clave'=>trim($post['clave']),
            'nombre'=>trim($post['nombre']),
            'categoria'=>$post['categoria'],
            'descripcion'=>$post['descripcion'],
            'fecha_caducidad'=>$post['fecha_caducidad'],
            'id_provedor'=>$post['provedor'],
        ]);

        return redirect()->to('productos');
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if(!$this->request->is('delete') || $id==null){
            return redirect()->route('productos');
        }

        $productosModel= new ProductosModel();
        $productosModel->delete($id);

        return redirect()->to('productos');
    }
}
