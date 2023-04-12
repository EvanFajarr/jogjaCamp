<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Models\category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $Request)
    {
        $katakunci = $Request->katakunci;
        $baris = 10;
        if(strlen($katakunci)){
        $category = category::where('name','like',"%$katakunci%")
        ->paginate($baris);
        }else {
            $category = category::orderBy ('id','desc')->paginate($baris);
        }
      
        return view('category.index')->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Session::flash('name', $request->name);

        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => ' Nama Category wajib diisi',
        ]); 


        $category = [
            'name' => $request->input('name'),
            'is_publish' => $request->is_publish == 'on' ? 1 : 0
        ];

        category::create($category);
        return redirect()->to('category')->with('success', 'Berhasil menambahkan category');
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
        $category = category::where('id', $id)->first();
        return view('category.edit')->with('category', $category);
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
        $request->validate([
            'name' => 'required',
           

        ], [
            'name.required' => 'name category wajib diisi',
         
        ]);
        $category = [
            'name' => $request->name,
            'is_publish' => $request->is_publish == 'on' ? 1 : 0
        ];

        
        category::where('id', $id)->update($category);
        return redirect()->to('category')->with('success', 'Berhasil mengubah category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        category::where('id', $id)->delete();
        return redirect()->to('category')->with('success', 'Berhasil menghapus  data');
    }
}
