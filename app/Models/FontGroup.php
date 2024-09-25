<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FontGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group_name'];

    public function fonts() {
        return $this->belongsToMany(Font::class);
    }
}
