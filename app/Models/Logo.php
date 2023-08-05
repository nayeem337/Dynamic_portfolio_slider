<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;
    protected $fillable =['image'];

    protected static $logo;

    protected  static  $imageFile,$imageName,$imageDirectory,$imageUrl;

    public static function storedLogo($request)
    {
        self::$logo                          = new Logo();
        self::$logo ->image                  =self::getImageUrl($request);

        self::$logo->save();
    }


    public static  function getImageUrl($request)
    {
        self::$imageFile = $request->file('image');
        self::$imageName =time().rand(10,1000).'.'.self::$imageFile->getClientOriginalExtension();
        self::$imageDirectory = 'upload/logos-image/';
        self::$imageFile->move(self::$imageDirectory,self::$imageName);
        self::$imageUrl=self::$imageDirectory.self::$imageName;
        return self::$imageUrl;
    }

    public static function updateLogo($request, $id)
    {
        self::$logo =Logo::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$logo->image))
            {
                unlink(self::$logo->image);
            }
            self::$imageUrl=self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl=self::$logo->image;
        }

        self::$logo ->image                  =self::$imageUrl;
        self::$logo->save();

    }
    public static function deleteLogo($id)
    {
        self::$logo = Logo::find($id);

        if(file_exists(self::$logo->image))
        {
            unlink(self::$logo->image);
        }
        self::$logo->delete();
    }


}
