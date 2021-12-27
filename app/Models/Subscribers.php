<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'email', 'created_at', 'updated_at'
    ];
    public function web_site()
    {
        return $this->belongsTo(WebSites::class, 'site_id');

    }
}
