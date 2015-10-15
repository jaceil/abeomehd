<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
    protected $table = 'plate_photos';
    protected $baseDir = 'plate-photos';

    protected $fillable = ['name', 'path', 'thumbnail_path'];

    public static function named($name)
    {
        return (new static)->saveAs($name);
    }
    public function plate()
    {
        return $this->belongsTo('App\Plate');
    }

    /**
     * @param UploadedFile $file
     */
    public function move(UploadedFile $file)
    {
        $file->move($this->baseDir, $this->name);

        Image::make($this->path)->fit(200)->save($this->thumbnail_path);

        return $this;
    }
    protected function saveAs($name)
    {
        $this->name = sprintf("%s-%s", time(), $name);
        $this->path = sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;
    }
}
