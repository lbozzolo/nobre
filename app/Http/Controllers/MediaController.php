<?php

namespace Nobre\Http\Controllers;

use Illuminate\Http\Request;
use Nobre\Http\Requests\CreateMediaRequest;
use Nobre\Http\Requests\UpdateMediaRequest;
use Nobre\Repositories\MediaRepository;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;
use Nobre\Models\Image;

class MediaController extends AppBaseController
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

    public function __construct(MediaRepository $repository)
    {
        $this->repo = $repository;
        $this->model = 'medias';
        $this->modelPlural = 'medias';
        $this->modelSpanish = 'medias';
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
        $data['items'] = Image::where('thumbnail_id', '!=', null)->get();

        return view($this->modelPlural.'.index')->with($data);
    }

    public function create()
    {
        $data['present_big'] = Image::where('type', 1)->where('thumbnail_id', '!=', null)->orderByDesc('id')->paginate(100);
        $data['present_thumb'] = Image::where('type', 1)->where('thumbnail_id', '=', null)->orderByDesc('id')->paginate(100);

        return view($this->modelPlural.'.create')->with($data);
    }

    public function createPast()
    {
        $data['past_big'] = Image::where('type', 0)->where('thumbnail_id', '!=', null)->orderByDesc('id')->paginate(100);
        $data['past_thumb'] = Image::where('type', 0)->where('thumbnail_id', '=', null)->orderByDesc('id')->paginate(100);

        return view($this->modelPlural.'.create-past')->with($data);
    }

    public function store(CreateMediaRequest $request)
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

    public function update($id, UpdateMediaRequest $request)
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
