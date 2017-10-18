<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App;
use File;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
//        dd($categories);

       return view('dashboard.category',
           [
               'category' => $categories

           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('category.create',
            [
                'categories' => $categories,
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
        $data = $request->all();

        $this->validate($request, [
            'category' => 'required|max:60',
            'description' => 'required',
            'view' => 'required|mimes:jpeg,png|max:15000'
        ]);

        $file = $request->file('view');
        $path = public_path('img/portfolio');
        $filename = $file->hashName();

        $file->move($path, $filename);

        $data['preview'] = $filename;
        Category::create($data);

        return redirect('/dashboard/category');
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
    public function edit($id)
    {
        $categories = Category::find($id);

        return view('category.edit', [
           'category' => $categories
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
        $data = $request->all();

        $this->validate($request, [
            'category' => 'required|max:60',
            'description' => 'required'
        ]);

        $file = $request->file('preview');

        $category = Category::find($id);

        if(!empty($file)){
            $this->validate($request, [
                'preview' => 'required|mimes:jpeg,png|max:15000'
            ]);

            $path = public_path('img/portfolio/');
            $filename = $file->hashName();

            $oldfile = $path . $category->preview;

            if(File::isFile($oldfile)){
                File::delete($oldfile);
            }

            $file->move($path, $filename);

            $data['preview'] = $filename;
        }


        $category->update($data);

        return redirect('/dashboard/category');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $path = public_path('img/portfolio/');

        $cathegory = Category::find($id);

        $file = $path . $cathegory->preview;

        if(File::isFile($file)){
            File::delete($file);
        }

        $cathegory->delete();

        return redirect('/dashboard/category');
    }
}
