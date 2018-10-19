<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
class UsersController extends Controller
{

    private $rules = [
        'name'     => 'required',
        'email'    => 'required|unique:users',
        'password' => 'required|confirmed',
        'type'     => 'required|in:user,admin',
        'image'     => 'required|image',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.users.index', [
            'title' => "Show All Users",
            'index' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create', [
            'title' => "Create Users",
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
        $data = $this->validate($request, $this->rules);

        $data['image'] = UploadImages('users', $request->file('image'));

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        session()->flash('success', "Created Successfully");
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
        $user = User::findOrFail($id);
        return view('backend.users.show', [
            'title' => "Show User " . ' : ' . $user->name,
            'show'  => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', [
            'title' => "Edit User" . ' : ' . $user->name,
            'edit'  => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->rules['email'] = 'required|unique:users,id,'.$id;
        $this->rules['password'] = 'sometimes|nullable||confirmed';
        $this->rules['image'] = 'sometimes|nullable||image';
        $data = $this->validate($request, $this->rules);

        $user = User::find($id);

        $user->name = $request->name;

        $user->email = $request->email;

        if ($request->has('password') && !empty($request->password) && !is_null($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->type = $request->type;

        if ($request->hasFile('image')) {
            $user->image = UpdateImages($user->image, 'users', $request->file('image'));
        }

        $user->save();

        session()->flash('success', "Updated Successfully");
        return redirect()->route('users.show', [$user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  bool  $redirect
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (file_exists(public_path('uploads/' . $user->image))) {
            @unlink(public_path('uploads/' . $user->image));
        }
        $user->delete();

        session()->flash('success', "User Deleted Successfully");
        return redirect()->route('users.index');
    }
}
