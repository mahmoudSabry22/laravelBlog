<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Tag;

class TagsController extends Controller
{
    private $rules = [
        'name'     => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tags.index', [
            'title' => "Show All Tags",
            'index' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create', [
            'title' => "Create Tags",
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


        $tag = Tag::create($data);

        session()->flash('success', "Created Successfully");
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
        $tag = Tag::find($id);
        if ($tag) {
            return view('backend.tags.show', [
                'title' => "Show Tag " . ' : ' . $tag->name,
                'show'  => $tag,
            ]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            return view('backend.tags.edit', [
                'title' => "Edit Tag" . ' : ' . $tag->name,
                'edit'  => $tag,
            ]);
        }
        return back();
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
        $tag = Tag::find($id);

        $data = $this->validate($request, $this->rules);

        $tag->update($data); // true, false

        session()->flash('success', "Updated Successfully");
        return redirect()->route('tags.show', [$id]);
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
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
            session()->flash('success', "Tag Deleted Successfully");
            return redirect()->route('tags.index');
        }
    }


}
