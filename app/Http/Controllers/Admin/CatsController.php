<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;

class CatsController extends Controller
{
    private $rules = [
        'title'     => 'required',
        'image'     => 'required|image',
    ];

    private $rulesUpdate = [
        'title'     => 'required',
        'image'     => 'sometimes|nullable|image',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.cats.index', [
            'title' => "Show All Categories",
            'index' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.cats.create', [
            'title' => "Create Categories",
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

        $data['image'] = UploadImages('cats', $request->file('image'));

        $data = array_merge($request->except('_token'), $data);

        $cat = Category::create($data);

        return redirect()->route('cats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::find($id);
        if ($cat) {
            return view('backend.cats.show', [
                'title' => "Show Category " . ' : ' . $cat->name,
                'show'  => $cat,
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
        $cat = Category::find($id);
        if ($cat) {
            return view('backend.cats.edit', [
                'title' => "Edit Category" . ' : ' . $cat->name,
                'edit'  => $cat,
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
        $category = Category::find($id);

        $data = $this->validate($request, $this->rulesUpdate);


        if ($request->hasFile('image')) {
            $data['image'] = UpdateImages($category->image, 'cats', $request->file('image'));
        }

        $data = array_merge($request->except('_token', '_method'), $data);

        $category->update($data); // true, false

        session()->flash('success', "Updated Successfully");
        return redirect()->route('cats.show', [$id]);
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
        $cat = Category::find($id);

        if ($cat) {
            if (file_exists(public_path('uploads/' . $cat->image))) {
                @unlink(public_path('uploads/' . $cat->image));
            }

            $cat->delete();

            session()->flash('success', "Category Deleted Successfully");
            return redirect()->route('cats.index');
        }
    }


}
