<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','description','site_id'
    ];

    public function article_site()
    {
        return $this->belongsTo(WebSites::class, 'site_id');
    }
}
