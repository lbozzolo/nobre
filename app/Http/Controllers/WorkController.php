<?php

namespace Nobre\Http\Controllers;

use Nobre\Http\Requests\CreateWorkRequest;
use Nobre\Http\Requests\UpdateWorkRequest;
use Nobre\Repositories\WorkRepository;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

class WorkController extends AppBaseController
{
    private $repo;
    private $model;
    private $modelSpanish;
    private $modelPlural;
    private $store_success_message;
    private $store_failure_message;
    private $show_failure_message;
    private $update_success_message;
    private $update_failure_message;
    private $destroy_success_message;
    private $destroy_failure_message;

    public function __construct(WorkRepository $repository)
    {
        $this->repo = $repository;
        $this->model = 'work';
        $this->modelPlural = 'works';
        $this->modelSpanish = 'trabajo';
        $this->store_success_message = ucfirst($this->modelSpanish).' creado con éxito';
        $this->store_failure_message = 'Ocurrió un error. No se pudo crear el'.ucfirst($this->modelSpanish);
        $this->show_failure_message = 'No se encontró el'.ucfirst($this->modelSpanish.' especificado');
        $this->update_success_message = ucfirst($this->modelSpanish).' actualizado con éxito';
        $this->update_failure_message = 'Ocurrió un error. No se pudo actualizar el'.ucfirst($this->modelSpanish).' especificado';
        $this->destroy_success_message = ucfirst($this->modelSpanish).' eliminado con éxito';
        $this->destroy_failure_message = 'Ocurrió un error. No se pudo eliminar el'.ucfirst($this->modelSpanish).' especificado';

    }

    public function index()
    {
        $data['works'] = $this->repo->all();
        return view($this->modelPlural.'.index')->with($data);
    }

    public function create()
    {
        return view($this->modelPlural.'.create');
    }

    public function store(CreateWorkRequest $request)
    {
        $input = $request->all();
        $item = $this->repo->create($input);

        if (!$item)
            return redirect()->back()->withErrors($this->store_failure_message);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->store_success_message);
    }

    public function show($id)
    {
        $item = $this->repo->findWithoutFail($id);

        if (!$item)
            return redirect()->back()->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.show')->with($this->model, $item);
    }

    public function edit($id)
    {
        $data['item'] = $this->repo->findWithoutFail($id);

        if (empty($data['item']))
            return redirect()->back()->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.edit')->with($data);
    }

    public function update($id, UpdateWorkRequest $request)
    {
        $item = $this->repo->findWithoutFail($id);
        //$items = $this->repo->all();

        $inputs = $request->all();

        if($request['active'] == 0)
            $request['active'] = 1;

        if (!$item)
            return redirect()->back()->withErrors($this->update_failure_message);

        $item = $this->repo->update($inputs, $id);

//        if($item->active == 1){
//            foreach($items as $far){
//                $far->active = null;
//                $far->save();
//            }
//            $item->active = 1;
//            $item->save();
//        }

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->update_success_message);
    }

    public function destroy($id)
    {
        $item = $this->repo->findWithoutFail($id);

        if (empty($item))
            return redirect()->back()->withErrors($this->destroy_failure_message);

        $this->repo->delete($id);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->destroy_success_message);
    }

}
