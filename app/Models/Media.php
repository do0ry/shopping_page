<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * MEDIA ATTRIBUTES
     * $this->attributes['id'] - int - contains the media primary key (id)
     * $this->attributes['path'] - string - contains the media path
     * $this->attributes['handle'] - enum - contains the media type (video or image)
     */
    use HasFactory;

    public function getId(){
        return $this->attributes['id'];
    }

    public function setId($id){
        $this->attributes['id'] = $id;
    }

    public function getPath(){
        return $this->attributes['path'];
    }

    public function setPath($path){
        $this->attributes['path'] = $path;
    }

    public function getHandle(){
        return $this->attributes['handle'];
    }

    public function setHandel($handle){
        $this->attributes['handle'] = $handle;
    }

    public function mediable(){
        return $this->morphTo();
    }
}
