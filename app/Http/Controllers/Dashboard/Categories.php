<?php

namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
// use Highlight\Mode;
// use Illuminate\Support\Str;


class Categories extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $moduleName = $this->getNameFromController();
        $categories = Category::paginate(10);
        return view('Dashboard.categories.index' , 
        compact('categories' , 'moduleName' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.categories.create' , compact( 'moduleName' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name'          => ['required' , 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191'],
        ]);    
        
        Category::create($validated);

        alert()->success('Category Created' , 'Done');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.categories.edit' , compact('category' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category , Request $request)
    {
        $requestArray = request()->validate([

            'name'          => ['required' , 'max:191'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191'],
        ]);

        $category->update($requestArray);

        alert()->success('Category is Updated' , 'Done');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        alert()->success('Category Deleted' , 'Done');
        return redirect()->back();
    }
}
