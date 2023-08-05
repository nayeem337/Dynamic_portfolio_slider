<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $fillable =['image','dataBs'];

    protected static $slider;

    protected  static  $imageFile,$imageName,$imageDirectory,$imageUrl;

    public static function storedSlider($request)
    {
        self::$slider                          = new Slider();
        self::$slider->dataBs                  =$request->dataBs;
        self::$slider ->image                  =self::getImageUrl($request);

        self::$slider->save();
    }


    public static  function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName =time().rand(10,1000).'.'.self::$imageFile->getClientOriginalExtension();
        self::$imageDirectory = 'upload/Sliders-image/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }

    public static function updateSlider($request, $id)
    {
        self::$slider =Slider::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$slider->image))
            {
                unlink(self::$slider->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$slider->image;
        }
        self::$slider->dataBs                  =$request->dataBs;
        self::$slider ->image                  =self::$imageUrl;
        self::$slider->save();

    }
    public static function deleteSlider($id)
    {
        self::$slider = Slider::find($id);

        if(file_exists(self::$slider->image))
        {
            unlink(self::$slider->image);
        }
        self::$slider->delete();
    }


}
