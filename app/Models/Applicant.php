<?php

namespace Nobre\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    public $table = 'applicants';

    public $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'country',
        'province',
        'position',
        'company',
        'area',
        'text',
    ];

    protected $casts =
    [
        'name' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'country' => 'integer',
        'province' => 'integer',
        'position' => 'string',
        'company' => 'string',
        'area' => 'string',
        'text' => 'string',
    ];

    public static $rules =
    [
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'country' => 'required',
    ];

    public function getFechaCreadoAttribute()
    {
        return date_format($this->created_at,"d/m/Y");
    }

    public function getFechaEditadoAttribute()
    {
        return date_format($this->updated_at,"d/m/Y");
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->lastname;
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'applicants_categories');
    }

}