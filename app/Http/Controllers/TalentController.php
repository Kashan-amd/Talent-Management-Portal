<?php

namespace App\Http\Controllers;

use App\Models\TalentCategory;
use App\Models\Race;
use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Talent;
use App\Models\TalentGallery;
use Illuminate\Http\Request;
use Storage;
use Carbon;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = Talent::get();
        $categories = TalentCategory::get();
        $races = Race::get();
        $eyeColor = EyeColor::get();
        $hairColor = HairColor::get();
        return view('talent',[
            'categories' => $categories,
            'profile' => $profile,
            'races' => $races,
            'eye_color' => $eyeColor,
            'hair_color' => $hairColor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        

        $fileName = ""; $filePath = "";
        $gallery_name =""; $gallery_path = ""; 
        $x=15; 
        if($request->file("profile") != "") { 
            $file = $request->file("profile");
            $fileName = time().'_'.$file->getClientOriginalName();
            $img = \Image::make(file_get_contents($file));  
            $img->save(\storage_path('app/public/upload/profile/'.$fileName), $x); 
        } 

        $dateOfBirth = $request->dob;
        //dd($dateOfBirth);
        $age = \Carbon\Carbon::parse($dateOfBirth)->age;
        
        $saveTalent = Talent::Create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'race_id' => $request->race,
            'country' => $request->country,
            'gender' => $request->gender,
            'artistic_name' => $request->artistic_name,
            'tutor_name' => $request->tutor,
            'dob' => $request->dob,
            'age' => $age,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'instagram' => $request->instagram,
            'height' => $request->height,
            'bust' => $request->bust,
            'waist' => $request->waist,
            'hips' => $request->hips,
            'weight' => $request->weight,
            'eye_color_id' => $request->eye_color,
            'hair_color_id' => $request->hair_color,
            'shoulders' => $request->shoulders,
            'number_of_shoes' => $request->number_of_shoes,
            'cpf' => $request->cpf,
            'rg' => $request->rg,
            'drt' => $request->drt,
            'pix' => $request->pix,
            'bank' => $request->bank,
            'agency' => $request->agency,
            'accountnumber' => $request->accountnumber,
            'file_name' => $fileName, 
            'category_id' => $request->category
        ]);

        $talentId = Talent::latest()->first()->id; 
        if($request->file('gallery')) { 
            foreach ($request->file('gallery') as $img) { 
                $gallery_img_name = time().'_'.$img->getClientOriginalName();
                $gallery_img = \Image::make(file_get_contents($img));  
                $gallery_img->save(\storage_path('app/public/upload/gallery/'.$gallery_img_name), $x);   
                TalentGallery::create([
                    'talent_id' => $talentId,
                    'file_name' => $gallery_img_name, 
                ]);
            } 
        }
        return redirect('talent')->with("success", "Profile saved");
    }
    public function talentinfo($talentid)
    {
        $profile = Talent::with('talent_categories', 'galleries', 'races', 'eye_colors', 'hair_colors')
            ->find($talentid);  
        //dd($profile);
        $categories = TalentCategory::get(); 
        $races = Race::get();
        $eyeColor = EyeColor::get();
        $hairColor = HairColor::get();
        return view('talentinfo',[
            'talent' => $profile,
            'categories' => $categories,
            'races' => $races,
            'eye_color' => $eyeColor,
            'hair_color' => $hairColor
        ]); 
    }
    public function filterTalent(Request $request)
    {   

        $height_min = $request->input('height_min');
        $height_max = $request->input('height_max');

        $weight_min = $request->input('weight_min');
        $weight_max = $request->input('weight_max');

        $bust_min = $request->input('bust_max');
        $bust_max = $request->input('bust_min');

        $hips_min = $request->input('hips_min');
        $hips_max = $request->input('hips_max');
        
        $age_min = $request->input('age_min');
        $age_max = $request->input('age_max');

        $country = $request->input('country');
        $ethnicity = $request->input('ethnicity');

        $category = $request->input('category');
        $race = $request->input('race');
        $eye_color = $request->input('eye_color');
        $hair_color = $request->input('hair_color');
        $gender = $request->input('gender');
        
        //measurments...
        $profiles = Talent::when($height_min, function ($query, $height_min){
            return $query->where('height', '>=', (int)$height_min);
        })
        ->when($height_max, function ($query, $height_max){
            return $query->where('height', '<=', (int)$height_max);
        })

        ->when($weight_min, function ($query, $weight_min){
            return $query->where('weight', '>=', (int)$weight_min);
        })
        ->when($weight_max, function ($query, $weight_max){
            return $query->where('weight','<=',  (int)$weight_max);
        })

        ->when($bust_min, function ($query, $bust_min){
            return $query->where('bust', '>=', (int)$bust_min);
        })
        ->when($bust_max, function ($query, $bust_max){
            return $query->where('bust','<=',  (int)$bust_max);
        })

        ->when($hips_min, function($query, $hips_min){
            return $query->where('hips', '>=',  (int)$hips_min);
        })
        ->when($hips_max, function($query, $hips_max){
            return $query->where('hips','<=',  (int)$hips_max);
        })

        ->when($age_min, function ($query, $age_min){
            return $query->where('age', '>=', (int)$age_min);
        })
        ->when($age_max, function ($query, $age_max){
            return $query->where('age','<=',  (int)$age_max);
        })

        //others..
        ->when($country, function($query, $country){
            return $query->where('country', $country);
        })
        ->when($ethnicity, function($query, $ethnicity){
            return $query->where('ethnicity', $ethnicity);
        })
        ->when($category, function($query, $category){
            return $query->where('category_id', $category);
        })
        ->when($race, function($query, $race){
            return $query->where('race_id', $race);
        })
        ->when($eye_color, function($query, $eye_color){
            return $query->where('eye_color_id', $eye_color);
        })
        ->when($hair_color, function($query, $hair_color){
            return $query->where('hair_color_id', $hair_color);
        })
        ->when($gender, function($query, $gender){
            return $query->where('gender', $gender);
        })
        ->get();
        //$filter = Talent::where($request->height, $request->height)->get();
        $categories = TalentCategory::get();
        $races = Race::get();
        $eyeColor = EyeColor::get();
        $hairColor = HairColor::get();
        $countTalents = $profiles->count();
        return view('talents',[
            'profiles' => $profiles,
            'categories' => $categories,
            'races' => $races,
            'eye_color' => $eyeColor,
            'hair_color' => $hairColor,
            'countTalents' => $countTalents
        ]); 
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 
        $x = 15;
        $fileName = ""; $filePath = "";
        $gallery_name =""; $gallery_path = "";
        $updateTalent = Talent::find($request->talentid); 
        if($request->file('profile')) {
            if(Storage::exists('public/upload/profile/'.$updateTalent->file_name)){
                Storage::delete('public/upload/profile/'. $updateTalent->file_name);
            } 
            $file = $request->file("profile");
            $fileName = time().'_'.$file->getClientOriginalName();
            $img = \Image::make(file_get_contents($file));  
            $img->save(\storage_path('app/public/upload/profile/'.$fileName), $x); 
            
            $updateTalent->file_name = $fileName;
            //$updateTalent->file_path = $filePath;
        } 
        
        $updateTalent->first_name = $request ->first_name;
        $updateTalent->last_name = $request ->last_name;
        $updateTalent->race_id = $request ->race;
        $updateTalent->country = $request ->country;
        $updateTalent->gender = $request ->gender;
        $updateTalent->address = $request->address;
        $updateTalent->artistic_name = $request ->artistic_name;
        $updateTalent->tutor_name = $request ->tutor;
        $updateTalent->dob = $request ->dob;
        $updateTalent->phone = $request ->phone;
        $updateTalent->email = $request ->email;
        $updateTalent->instagram = $request ->instagram;
        $updateTalent->height = $request ->height;
        $updateTalent->bust = $request ->bust;
        $updateTalent->waist = $request ->waist;
        $updateTalent->hips = $request ->hips;
        $updateTalent->weight = $request ->weight;
        $updateTalent->eye_color_id = $request ->eye_color;
        $updateTalent->hair_color_id = $request ->hair_color;
        $updateTalent->shoulders = $request ->shoulders;
        $updateTalent->number_of_shoes = $request ->number_of_shoes;
        $updateTalent->category_id = $request->talent_category;
        $updateTalent->cpf = $request ->cpf;
        $updateTalent->rg = $request ->rg;
        $updateTalent->drt = $request ->drt;
        $updateTalent->pix = $request ->pix;
        $updateTalent->bank = $request ->bank;
        $updateTalent->agency = $request ->agency;
        $updateTalent->accountnumber = $request ->accountnumber;
        if($request->file('gallery')) {
            foreach ($request->file('gallery') as $img) { 
                $gallery_img_name = time().'_'.$img->getClientOriginalName();
                $gallery_img = \Image::make(file_get_contents($img));  
                $gallery_img->save(\storage_path('app/public/upload/gallery/'.$gallery_img_name), $x);   
                TalentGallery::create([
                    'talent_id' => $talentId,
                    'file_name' => $gallery_img_name, 
                ]);
            } 
        }
 
        $updateTalent->save();
        return back()->with('success', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Talent  $talent
     * @return \Illuminate\Http\Response
     */
    public function destroy($talents)
    {   
        $file_name = "";  
        foreach(json_decode($talents,true) as $key=>$value){
            $talent = Talent::where('id',$value['talentId'])->first();
            $file_name = $talent->file_name;
            $talent_id = $talent->id;
            if(Storage::exists('public/upload/profile/'.$file_name)){
                Storage::delete('public/upload/profile/'. $file_name);
            } 
            $gallery_imgs = TalentGallery::where('talent_id', $talent_id)->get();
            //dd($gallery_imgs);
            foreach ($gallery_imgs as $key) {
                if(Storage::exists('public/upload/gallery/'.$key->file_name)){
                    Storage::delete('public/upload/gallery/'. $key->file_name);
                } 
            }
            $deleteTalent = Talent::find($value['talentId'])
                ->delete(); 
            $deleteTalentGallery = TalentGallery::where('talent_id', $talent_id)
                ->delete();
        } 
        
        $message = "";
        if ($deleteTalent) {
            $message = "User Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }
}
