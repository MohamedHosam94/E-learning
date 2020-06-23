<?php

namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Users extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduleName = $this->getNameFromController();
         $users = User::paginate(10);
        return view('Dashboard.users.index' , compact('users' , 'moduleName') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moduleName = $this->getNameFromController();
        return view('Dashboard.users.create' , compact('moduleName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request->all() );
        
         $validated = request()->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required',
            'group'    => 'required'
        ]);
        
        $validated['password'] = Hash::make($validated['password']) ;
        
        User::create($validated);

        alert()->success('User Created' , 'Done');
        return redirect()->route('users.index');
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
    public function edit( User $user )
    {
        // $row = User::FindOrFail($id);
        // dd($row);
        $moduleName = $this->getNameFromController()
        ;
        return view('Dashboard.users.edit' , compact('user' , 'moduleName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( User $user , Request $request)
    {
        // dd($request);
        $requestArray = request()->validate([

            'name'  => ['required' , 'string'],
            'email' => ['required' , 'email'],
            'group' => ['required' , 'string']
        ]);

        // This is to ensure that the password will stay the same if the user didnt     // enter any password
        // i can use request() helper function since it equals $request->input() opject 
        // dd($requestArray);
        if ($request->has('password') && $request->get('password') != "") {
            
            $requestArray = 
            $requestArray + [ 'password' => Hash::make($request->password)];
        }

         
        $user->update($requestArray);

        alert()->success('User Updated' , 'Done');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('User Deleted' , 'Done');
        return redirect()->back();

    }
}
