<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HairColor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function talents()
    {
        return $this->HasMany(Talent::class, 'hair_color_id');
    }
}
