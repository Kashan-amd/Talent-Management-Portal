<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function talents()
    {
        return $this->hasMany(Talent::class, 'category_id');
    }
}
