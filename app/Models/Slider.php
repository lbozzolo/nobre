<?php

namespace Nobre\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package Nobre\Models
 * @version September 6, 2018, 11:58 am UTC
 *
 * @property string name
 */
class Slider extends Model
{
    use SoftDeletes;

    public $table = 'sliders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'text', 'secondary_text', 'active', 'text_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function mainImage()
    {
        return $this->images()->where('main', 1)->first();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function imagesThumb()
    {
        return $this->morphMany(Image::class, 'imageable')->where('thumbnail_id', null);
    }

    public function imagesBig()
    {
        return $this->morphMany(Image::class, 'imageable')->where('thumbnail_id', '!=', null);
    }

}
