<?php

namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class Pages extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduleName = $this->getNameFromController();
        $pages = Page::paginate(10);
        return view('Dashboard.pages.index' , 
        compact('pages' , 'moduleName' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.pages.create' , compact( 'moduleName' ));
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
            'des'           => ['required' , 'min:10'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191']
            ]);    
        
        Page::create($validated);

        alert()->success('Page is Created' , 'Done');
        return redirect()->route('pages.index');
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
    public function edit(Page $page)
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.pages.edit' , compact('page' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page)
    {
        
        $requestArray = request()->validate([

            'name'          => ['required' , 'max:191'] ,
            'des'           => ['required' , 'min:10'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191']
        ]);

        $page->update($requestArray);

        alert()->success('Page is Updated' , 'Done');
        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        
        $page->delete();

        alert()->success('Page is Deleted' , 'Done');
        return redirect()->back();
    }
}
