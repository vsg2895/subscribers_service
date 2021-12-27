<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSites extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','created_at','updated_at'
    ];
    public function subscribers()
    {
        return $this->hasMany(Subscribers::class, 'site_id', 'id');
    }
    public function site_articles()
    {
        return $this->hasMany(Articles::class, 'site_id', 'id');
    }
}
