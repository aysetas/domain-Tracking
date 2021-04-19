<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory , InteractsWithMedia;
    protected $table='settings';
    protected $fillable=['site_title','site_desc','site_email'];
    protected $appends = ['site_logo'];


    public function getSiteLogoAttribute()
    {
        return $this->getMedia('document')->last();
    }
}
