<?php

namespace Nobre\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Nobre\Http\Controllers\AppBaseController as AppBaseController;
use Nobre\Http\Requests\ContactRequest;
use Nobre\Http\Requests\CreateApplicantRequest;
use Nobre\Models\Category;
use Illuminate\Support\Facades\Mail;
use Nobre\Models\Image;
use Nobre\Models\Slider;
use Nobre\Models\Work;
use Nobre\Repositories\ApplicantRepository as ApplicantRepo;

class WebController extends AppBaseController
{
    public function index()
    {
        $data['slider'] = Slider::where('active', '1')->first();
        $data['images'] = ($data['slider'])? $data['slider']->images->sortByDesc('main') : '';
        $data['countries'] = config('sistema.countries');
        $data['provinces'] = config('sistema.provinces');
        $data['interest_areas'] = Category::pluck('name', 'id');
        $data['slider'] = Slider::where('active', '!=', null)->first();

        return view('web.home')->with($data);
    }

    public function past()
    {
        $data['past_big'] = Image::where('type', 0)->where('thumbnail_id', '!=', null)->paginate(30);
        //$data['past_thumb'] = Image::where('type', 0)->where('thumbnail_id', '=', null)->get();

        return view('web.past')->with($data);
    }

    public function present()
    {
        $data['present_big'] = Image::where('type', 1)->where('thumbnail_id', '!=', null)->paginate(30);
        //$data['present_thumb'] = Image::where('type', 1)->where('thumbnail_id', '=', null)->get();

        return view('web.present')->with($data);
    }

    public function works($year = null)
    {
        $year = ($year)? $year : Carbon::now()->year;
        $data['works'] = Work::with('images')->active()->where('year', '=', $year)->paginate(30);

        return view('web.works')->with($data);
    }

    public function sendDataApplicant(CreateApplicantRequest $request, ApplicantRepo $applicantRepo)
    {
        $input = $request->all();
        $item = $applicantRepo->create($input);

        if (!$item)
            return redirect()->back()->withErrors('Ocurrió un error. No se pudieron enviar los datos');

        return Redirect::to(URL::previous() . "#contact")->with('ok', 'Se han enviado los datos con éxito');
    }

    public function postContacto(ContactRequest $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->msg,
            'subject' => 'Contacto de cliente'
        );


        Mail::send('emails.contacto', ['data' => $data], function($message) use ($data){
            $message->to(config('mail.username'));
            $message->subject($data['subject']);
            $message->from($data['email']);
        });

        return redirect()->back()->with('ok', 'Su correo se ha enviado con éxito.');

    }


}
