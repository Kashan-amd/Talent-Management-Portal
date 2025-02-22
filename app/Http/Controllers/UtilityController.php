<?php

namespace App\Http\Controllers;

use App\Models\Race;
use App\Models\EyeColor;
use App\Models\HairColor;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function index()
    {
        
        $races = Race::get();
        $countRaces = $races->count();
        $eyes = EyeColor::get();
        $countEyes = $eyes->count();
        $hairs = HairColor::get();
        $countHairs = $hairs->count();
        return view('utility',[
            'races' => $races,
            'totalRaces' => $countRaces,
            'eyes' => $eyes,
            'totalEyes' => $countEyes,
            'hairs' => $hairs,
            'totalHairs' => $countHairs
            
        ]);
    }

    public function storeRace(Request $request)
    {
        //dd($request);
        $createRace = Race::create([
            'race' => $request->race
        ]);
        return redirect('utility');
    }

    public function destroyRace($race)
    {
        $deleteRace = Race::find($race)
            ->delete();
        $message = "";
        if ($deleteRace) {
            $message = "Race Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }

    public function storeEyes(Request $request)
    {
        //dd($request);
        $createEyesColour = EyeColor::create([
            'eye_color' => $request->eye_color
        ]);
        return redirect('utility');
    }

    public function destroyEyes($eyes)
    {
        $deleteEyes = EyeColor::find($eyes)
            ->delete();
        $message = "";
        if ($deleteEyes) {
            $message = "Race Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }

    public function storeHair(Request $request)
    {
        //dd($request);
        $createHairColour = HairColor::create([
            'hair_color' => $request->hair_color
        ]);
        return redirect('utility');
    }

    public function destroyHair($hair)
    {
        $deleteHair = HairColor::find($hair)
            ->delete();
        $message = "";
        if ($deleteHair) {
            $message = "Race Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }
}
