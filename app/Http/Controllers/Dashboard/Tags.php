<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use Illuminate\Http\Request;

class Tags extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $moduleName = $this->getNameFromController();
        $tags = Tag::paginate(10);
        return view('Dashboard.tags.index' , 
        compact('tags' , 'moduleName' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.tags.create' , compact( 'moduleName' ));
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
            'name'          => ['required' , 'max:191']
            ]);    
        
        Tag::create($validated);

        alert()->success('Tag is Created' , 'Done');
        return redirect()->route('tags.index');
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
    public function edit(Tag $tag)
    {
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.tags.edit' , compact('tag' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Tag $tag)
    {
        
        $requestArray = request()->validate([

            'name'          => ['required' , 'max:191']
        ]);

        $tag->update($requestArray);

        alert()->success('Tag is Updated' , 'Done');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        alert()->success('Tag id Deleted' , 'Done');
        return redirect()->back();
    }
}
