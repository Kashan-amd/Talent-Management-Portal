<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function talent_categories()
    {
        return $this->belongsTo(TalentCategory::class, 'category_id');
    }
    public function galleries()
    {
        return $this->hasMany(TalentGallery::class, 'talent_id');
    }
    public function races()
    {
        return $this->belongsTo(Race::class, 'race_id');
    }
    public function eye_colors()
    {
        return $this->belongsTo(EyeColor::class, 'eye_color_id');
    }
    public function hair_colors()
    {
        return $this->belongsTo(HairColor::class, 'hair_color_id');
    }
}
