<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TalentCategory;
use Illuminate\Http\Request;
use App\Models\Talent;
use App\Models\Race;
use App\Models\EyeColor;
use App\Models\HairColor;
use App\Models\Talentuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profiles = Talent::with('talent_categories')->get();
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

    public function searchTalent(Request $request)
    {
        $profiles = Talent::with('talent_categories')
        ->where('first_name', $request->talent_search)
        ->get();
        $countTalents = $profiles->count();
        $categories = TalentCategory::get();
        $races = Race::get();
        $eyeColor = EyeColor::get();
        $hairColor = HairColor::get();
       
        return view('talents',[
            'profiles' => $profiles,
            'categories' => $categories,
            'races' => $races,
            'eye_color' => $eyeColor,
            'hair_color' => $hairColor,
            'countTalents' => $countTalents
        ]); 
    }

    public function booker()
    {
        $bookers = User::get();
        $admins = User::where('is_admin', 1)
            ->get()
            ->count(); 
        $users = User::where('is_admin', 0)
            ->get()
            ->count();
        return view('booker',[
            'bookers' => $bookers,
            'admins' => $admins,
            'users' => $users
        ]);
    }
    public function storeBooker(Request $data)
    {  
        //dd($data);
        //dd(asset('/storage/upload/1662828023_20220121_150917.jpg'));
        // $fileName = "";
        // $filePath = "";
        $readOnly = "";
        $readWrite = "";
        $isAdmin = "";
        // if($data->file()) { 
        //     $fileName = time().'_'.$data->attachment->getClientOriginalName();
        //     //$filePath = $data->file('attachment')->store('upload');
        //     $filePath = $data->file('attachment')->storeAs('public/upload', $fileName);
        // }  
        
        if($data->accesstype == "readonly")
        {
            $readOnly = 1;
            $readWrite = 0;
        }
        else if($data->accesstype == "readwrite")
        { 
            $readOnly = 0;
            $readWrite = 1;
        }
        if($data->protocol == "admin")
        {
            $isAdmin = 1;
        }
        else if($data->protocol == "user")
        {
            $isAdmin = 0;
        }
        $createBooker = User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => Hash::make($data->password),
            'password_text' => $data->password,
            'can_read' => $readOnly,
            'can_write' => $readWrite,
            'is_approved' => 1,
            // 'file_name' => $fileName,
            // 'file_path' => $filePath, 
            'is_admin' => $isAdmin
        ]);
        return redirect('booker');
    }
    public function logout(Request $request)
    {   
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function editBooker($userId)
    {
        $user = User::find($userId);
        return response()->json($user);
    }

    public function updateBooker($booker)
    {   
        $booker_name = "";
        $email = "";
        $booker_id = "";
        $protocol = "";
        $access = "";
        foreach (json_decode($booker) as $key) { 
            $booker_name = $key->userName;
            $booker_id = $key->userId;
            $access = $key->access;
            $protocol = $key->protocol;
            $email = $key->email;
        } 
        $editBooker = User::find($booker_id);
        $editBooker->name = $booker_name; 
        $editBooker->email = $email;
        if ($access == "readonly") {
            $editBooker->can_read = 1;
            $editBooker->can_write = 0;
        }
        else if($access == "readwrite"){
            $editBooker->can_read = 1;
            $editBooker->can_write = 1;
        }
        if ($protocol == "admin") {
            $editBooker->is_admin = 1;
        }
        else if ($protocol == "user") {
            $editBooker->is_admin = 0;
        }
        $editBooker->save();
        return response()->json("Booker updated");
    }

    public function deletebooker($userId)
    {
        $deleteUser = User::find($userId)
            ->delete();
        $message = "";
        if ($deleteUser) {
            $message = "User Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
        
    }

}
