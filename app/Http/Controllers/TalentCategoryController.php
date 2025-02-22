<?php

namespace App\Http\Controllers;

use App\Models\TalentCategory;
use Illuminate\Http\Request;

class TalentCategoryController extends Controller
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
        $categories = TalentCategory::get();
        $countCategories = $categories->count();
        return view('category',[
            'categories' => $categories,
            'totalCategories' => $countCategories
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
        $createCategory = TalentCategory::create([
            'category_name' => $request->category_name
        ]);
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TalentCategory  $talentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TalentCategory $talentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TalentCategory  $talentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($talentCategory)
    {
        $category = TalentCategory::find($talentCategory);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TalentCategory  $talentCategory
     * @return \Illuminate\Http\Response
     */
    public function update($name, $id)
    {
        $updateCategory = TalentCategory::where('id', $id)->first();
        $updateCategory->category_name = $name;
        $updateCategory->save();
        return response()->json($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TalentCategory  $talentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($talentCategory)
    {
        $deleteCategory = TalentCategory::find($talentCategory)
            ->delete();
        $message = "";
        if ($deleteCategory) {
            $message = "User Deleted";
        }
        else{
            $message = "Some error occured";
        }
        return response()->json($message);
    }
}
