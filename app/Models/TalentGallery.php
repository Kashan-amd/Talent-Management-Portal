<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentGallery extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function talents()
    {
        return $this->belongsTo(Talent::class, 'talent_id');
    }
}
