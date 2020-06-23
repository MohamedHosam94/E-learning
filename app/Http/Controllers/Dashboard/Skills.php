<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Skill;
use Illuminate\Http\Request;

class Skills extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $moduleName = $this->getNameFromController();
        $skills = Skill::paginate(10);
        return view('Dashboard.skills.index' , 
        compact('skills' , 'moduleName' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.skills.create' , compact( 'moduleName' ));
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
            'name' => ['required' , 'max:191']
            ]);    
        
        Skill::create($validated);

        alert()->success('Skill Created' , 'Done');
        return redirect()->route('skills.index');
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
    public function edit(Skill $skill)
    {
        
        $moduleName = $this->getNameFromController() ;
        return view('Dashboard.skills.edit' , compact('skill' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Skill $skill)
    {
        
        $requestArray = request()->validate([

            'name'          => ['required' , 'max:191']
        ]);

        $skill->update($requestArray);

        alert()->success('Skill Updated' , 'Done');
        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        
        $skill->delete();

        alert()->success('Skill Deleted' , 'Done');
        return redirect()->back();
    }
}
