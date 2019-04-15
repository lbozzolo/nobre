<?php

namespace Nobre\Http\Controllers;

use Nobre\Http\Requests\CreateApplicantRequest;
use Nobre\Http\Requests\UpdateApplicantRequest;
use Nobre\Models\Category;
use Nobre\Repositories\ApplicantRepository;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

class ApplicantController extends AppBaseController
{
    private $repo;
    private $model;
    private $modelSpanish;
    private $modelPlural;
    private $modelSpanishPlural;
    private $store_success_message;
    private $store_failure_message;
    private $show_failure_message;
    private $update_success_message;
    private $update_failure_message;
    private $destroy_success_message;
    private $destroy_failure_message;

    public function __construct(ApplicantRepository $repository)
    {
        $this->repo = $repository;
        $this->model = 'applicant';
        $this->modelPlural = 'applicants';
        $this->modelSpanish = 'aspirante';
        $this->modelSpanishPlural = 'aspirantes';
        $this->store_success_message = ucfirst($this->modelSpanish).' creado con éxito';
        $this->store_failure_message = 'Ocurrió un error. No se pudo crear el'.ucfirst($this->modelSpanish);
        $this->show_failure_message = 'No se encontró el'.ucfirst($this->modelSpanish.' especificado');
        $this->update_success_message = ucfirst($this->modelSpanish).' actualizado con éxito';
        $this->update_failure_message = 'Ocurrió un error. No se pudo actualizar el'.ucfirst($this->modelSpanish).' especificado';
        $this->destroy_success_message = ucfirst($this->modelSpanish).' eliminado con éxito';
        $this->destroy_failure_message = 'Ocurrió un error. No se pudo eliminar el'.ucfirst($this->modelSpanish).' especificado';
    }

    public function index(Request $request)
    {
        $this->repo->pushCriteria(new RequestCriteria($request));
        $items = $this->repo->all();

        return view($this->modelPlural.'.index')->with($this->modelPlural, $items);
    }

    public function create()
    {
        $data['countries'] = config('sistema.countries');
        $data['provinces'] = config('sistema.provinces');
        $data['interest_areas'] = Category::pluck('name', 'id');

        return view($this->modelPlural.'.create')->with($data);
    }

    public function store(CreateApplicantRequest $request)
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
        $data[$this->model] = $this->repo->findWithoutFail($id);

        if (empty($data[$this->model]))
            return redirect()->back()->withErrors($this->show_failure_message);

        $data['countries'] = config('sistema.countries');
        $data['provinces'] = config('sistema.provinces');
        $data['interest_areas'] = Category::pluck('name', 'id');

        return view($this->modelPlural.'.edit')->with($data);
    }

    public function update($id, UpdateApplicantRequest $request)
    {
        $item = $this->repo->findWithoutFail($id);
        $items = $this->repo->all();

        if($request['active'] == 0)
            $request['active'] = 1;

        if (!$item)
            return redirect()->back()->withErrors($this->update_failure_message);

        $item = $this->repo->update($request->all(), $id);


        if($item->active == 1){
            foreach($items as $far){
                $far->active = null;
                $far->save();
            }
            $item->active = 1;
            $item->save();
        }

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
