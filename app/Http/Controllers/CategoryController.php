<?php

namespace Nobre\Http\Controllers;

use Nobre\Http\Requests\CreateCategoryRequest;
use Nobre\Http\Requests\UpdateCategoryRequest;
use Nobre\Repositories\CategoryRepository;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;

class CategoryController extends AppBaseController
{
    private $repo;
    private $model;
    private $modelSpanish;
    private $modelSpanishPlural;
    private $modelPlural;
    private $store_success_message;
    private $store_failure_message;
    private $show_failure_message;
    private $update_success_message;
    private $update_failure_message;
    private $destroy_success_message;
    private $destroy_failure_message;

    public function __construct(CategoryRepository $repository)
    {
        $this->repo = $repository;
        $this->model = 'category';
        $this->modelPlural = 'categories';
        $this->modelSpanish = 'categoría';
        $this->modelSpanishPlural = 'categorías';
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
        $items = $this->repo->all();
        return view($this->modelPlural.'.index')->with($this->modelPlural, $items);
    }

    public function create()
    {
        $data['countries'] = config('sistema.countries');
        $data['provinces'] = config('sistema.provinces');
        $data['interest_areas'] = collect(config('sistema.interest-areas'));

        return view($this->modelPlural.'.create')->with($data);
    }

    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $input['slug'] = str_slug($input['name'], '.');

        $item = $this->repo->create($input);

        if (!$item)
            return redirect()->back()->withErrors($this->store_failure_message);

        return redirect(route($this->modelPlural.'.index'))->with('ok', $this->store_success_message);
    }

    public function edit($id)
    {
        $item = $this->repo->findWithoutFail($id);

        if (empty($item))
            return redirect()->back()->withErrors($this->show_failure_message);

        return view($this->modelPlural.'.edit')->with($this->model, $item);
    }

    public function update($id, UpdateCategoryRequest $request)
    {
        $item = $this->repo->findWithoutFail($id);

        if (!$item)
            return redirect()->back()->withErrors($this->update_failure_message);

        $input = $request->all();
        $input['slug'] = str_slug($input['name'], '.');

        $this->repo->update($input, $id);

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
