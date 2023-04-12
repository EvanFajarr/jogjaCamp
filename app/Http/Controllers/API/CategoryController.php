<?php

namespace App\Http\Controllers\Api;

use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
       $category = category::all();

       if($category->count()>0){
        return response()->json([
            'status' => 200,
            'category' => $category
           ],200);
       }else {
        return response()->json([
            'status' => 404,
            'message' => gagal
           ],404);
       }

       
       
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'erors' => $validator->messages(),
            ],422);
        }else{
            $category = category::create([
                'name' => $request->name,
                'is_publish' => $request->is_publish == 'on' ? 1 : 0,
            ]);
            
            if($category){
                return response()->json([
                    'status' => 200,
                    'message' => 'category berhasil ditambakan'
                ],200);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'ada yang salah'
                ],500);
            }
        }

    }

    public function show($id){
        $category = category::find($id);
        if($category){
            return response()->json([
                'status' => 200,
                'category' => $category
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'tidak adaa data'
            ],404); 
        }
    }



    public function edit($id){
        $category = category::find($id);
        if($category){
            return response()->json([
                'status' => 200,
                'category' => $category
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'tidak adaa data'
            ],404); 
        }
    }

    public function update(Request $request, int $id){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'erors' => $validator->messages(),
            ],422);
        }else{

            $category = category::find($id);

            if($category){
                $category->update([
                    'name' => $request->name,
                    'is_publish' => $request->is_publish == 'on' ? 1 : 0,
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'category berhasil update'
                ],200);
            }else{
                return response()->json([
                    'status' => 404,
                    'message' => 'tidak ada data'
                ],404);
            }
        }
    }

    public function destroy($id){
        $category = category::find($id);
        if ($category){
            $category->delete();
        }else{
         return response()->json([
                'status' => '404',
                'message' => 'tidak ada data'
            ],404);
        }
    }
}
