<?php

namespace Nobre\Http\Controllers;

use Nobre\Http\Requests\CreateImageRequest;
use Nobre\Http\Requests\UpdateImageRequest;
use Nobre\Repositories\ImageRepository;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Nobre\Models\Image;
use Intervention\Image\Facades\Image as Intervention;

class ImageController extends AppBaseController
{
    private $imageRepository;

    public function __construct(ImageRepository $imageRepo)
    {
        $this->imageRepository = $imageRepo;
    }

    public function index()
    {
        //$data['images'] = $this->imageRepository->all();
        $images = $this->imageRepository->all();

        $data['images_big'] = $images->filter(function ($query) {
            return !starts_with($query->path, 'thumb');
        });
        $data['images_thumb'] = $images->filter(function ($query) {
            return starts_with($query->path, 'thumb');
        });


        return view('images.index')->with($data);
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(CreateImageRequest $request)
    {
        //dd($request->all());

        $img = Intervention::make($request->file('img'));

        dd($img);

       /* $input = $request->all();
        $image = $this->imageRepository->create($input);

        return redirect(route('images.index'))->with('ok', 'Imagen creada con éxito');*/
        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 2M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);

        }
        return redirect()->route('images.index')->with('ok', 'Imagen subida con éxito');

    }

    /**
     * Display the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        return view('images.show')->with('image', $image);
    }

    /**
     * Show the form for editing the specified Image.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        return view('images.edit')->with('image', $image);
    }

    /**
     * Update the specified Image in storage.
     *
     * @param  int              $id
     * @param UpdateImageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImageRequest $request)
    {
        $image = $this->imageRepository->findWithoutFail($id);

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        $image = $this->imageRepository->update($request->all(), $id);

        return redirect(route('images.index'))->with('ok', 'Imagen actualizada con éxito');
    }

    /**
     * Remove the specified Image from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->findWithoutFail($id);
        $image_big = Image::where('thumbnail_id', $id)->first();

        if (empty($image))
            return redirect(route('images.index'))->withErrors('Imagen no encontrada');

        $image->forceDelete();
        $image_big->forceDelete();

        File::delete(public_path("imagenes/".$image->path));
        File::delete(public_path("imagenes/".$image_big->path));

        return redirect()->back()->with('ok', 'Imagen eliminada con éxito');
    }

    public function verImage($file)
    {
        $ruta = storage_path("imagenes\\".$file);

        return response()->make(File::get($ruta),200)
            ->header('Content-Type', 'image/jpg');
    }

    public function storeImage(Request $request, $id, $class)
    {
        dd($request->all());
        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        $class = 'Nobre\Models\\'.$class;
        $model = $class::find($id);
        //dd($request->file('img'));

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 2M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);
            $model->images()->save($imagen);

        }
        return redirect()->back()->with('ok', 'Imagen subida con éxito');
    }

    public function changeFileNameIfExists($file)
    {
        $nombre = $file->getClientOriginalName();
        $extension = $file->guessExtension();

//        if (file_exists( public_path("imagenes/".$nombre)))
//            $nombre = preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre) . '-' . str_random(12) . '.' . $extension;

        $nombre = preg_replace('/\\.[^.\\s]{3,4}$/', '', $nombre) . '-' . str_random(18) . '.' . $extension;

        return $nombre;
    }

    public function makeThumb($img, $name, $model = null, $type = null, $year = null)
    {
        $img->save(public_path('/imagenes/'). 'thumb-'.$name);
        $image_thumb = Image::create(['path' => 'thumb-'.$name, 'main' => 0, 'type' => $type, 'year' => $year ]);

        if($model)
            $model->images()->save($image_thumb);

        return $image_thumb;
    }

    public function principalImage($id, $class, $image)
    {
        $imagen = Image::find($image);
        $imagen_thumb = Image::find($imagen->thumbnail_id);

        $class = 'Nobre\Models\\'.$class;
        $model = $class::find($id);

        foreach($model->images as $img){
            $img->main = 0;
            $img->save();
        }

        $imagen->main = 1;
        $imagen_thumb->main = 1;

        $imagen->save();
        $imagen_thumb->save();


        return redirect()->back();
    }

    // Croppie

    public function saveJqueryImageUpload(Request $request, $id, $class)
    {
        $validator = Validator::make($request->all(), ['img' => 'required|image|max:1024000']);

        if ($validator->fails())
            return $validator->errors();

        $status = "";

        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        // Resize to image thumbnail. Different size if Slider image.
        if($class == 'Slider') {
            $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.SLIDER_WIDTH_THUMB'), config('sistema.imagenes.SLIDER_HEIGHT_THUMB'));
        } else {
            $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));
        }

        $class = 'Nobre\Models\\'.$class;
        $model = $class::find($id);

        // Redirección si supera el máximo de fotos permitido
        if($model->images->count() >= config('sistema.imagenes.MAX_NUMBER_IMAGES'))
            return redirect()->back()->withErrors('El número máximo de fotos permitido es '.config('sistema.imagenes.MAX_NUMBER_IMAGES').'. Elimine una foto y vuelva a intentarlo');

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 5M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);

            $model->images()->save($imagen);

            $image_thumb = $this->makeThumb($img_thumb, $nombre, $model, null);
            $imagen->thumbnail_id = $image_thumb->id;
            $imagen->save();

            $status = "uploaded";

        }

        return response($status,200);
    }

    public function saveWithoutModel(Request $request, $type, $year)
    {
        $validator = Validator::make($request->all(), ['img' => 'required|image|max:1024000']);

        if ($validator->fails())
            return $validator->errors();

        $status = "";

        if(!$request->hasFile('img'))
            return redirect()->back()->withErrors('No ha seleccionado ningún archivo');

        $type = ($type == 'past')? 0 : 1;

        // Resize to image thumbnail
        $img_thumb = Intervention::make($request->file('img'))->resize(config('sistema.imagenes.WIDTH_THUMB'), config('sistema.imagenes.HEIGHT_THUMB'));

        if($request->file('img')){

            $file = $request->file('img');

            // Redirección si excede el máximo tamaño de imagen permitido
            if($file->getClientSize() > config('sistema.imagenes.MAX_SIZE_IMAGE'))
                return redirect()->back()->withErrors('La foto es demasiado grande (Debe ser menor a 5M)');

            // Confirma que el archivo no exista en el destino
            $nombre = $this->changeFileNameIfExists($file);

            $imagen = Image::create(['path' => $nombre, 'main' => 0, 'type' => $type, 'year' => $year]);
            $imagen->title = ($request->title)? $request->title : '';
            $file->move(public_path('imagenes'), $nombre);

            $image_thumb = $this->makeThumb($img_thumb, $nombre, null, $type, $year);
            $imagen->thumbnail_id = $image_thumb->id;

            $imagen->save();

            $status = "uploaded";

        }

        return response($status,200);
    }

}
