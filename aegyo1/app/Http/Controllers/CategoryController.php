<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Category::all();
        return response()->json($data);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name'      =>'required',
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save = Category::create([
            'name'      =>$req->name,
        ]);
        if ($save) {
            return Response()->json(['status'=>'Berhasil']);
        }else{
            return Response()->json(['status'=>'Gagal']);
        }    
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
        $validator = Validator::make($request->all(),[
            'name' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $category = Category::where('id', '=', $id)->first();
        $category->name = $request->name;

        $category->save();

        return response()->json([
            'success' => true,
            'massage' => 'Data berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Category::where('id', '=', $id)->delete();

        if($delete){
            return response()->json([
                'success' => true,
                'massage' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'massage' => 'Data gagal dihapus'
            ]);
        }
    }
}
