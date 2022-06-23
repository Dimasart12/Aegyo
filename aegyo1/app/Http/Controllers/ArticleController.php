<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Article::all();
        return response()->json($data);      
    }

    public function getById($id)
    {
        $data = Article::where('id', '=', $id)->first();        
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
        $validator = Validator::make($req->all(), [
            'id_category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors());
        }

        $article = new Article();
        $article->id_category = $req->id_category;
        $article->title = $req->title;
        $article->description = $req->description;
        $article->content = $req->content;

        $article->save();

        $data = Article::where('id', '=', $article->id)->first();

        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => 'Data berhasil ditambahkan', 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $validator = Validator::make($req->all(),[
            'id_category' => 'required',
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $article = Article::where('id', '=', $id)->first();
        $article->id_category = $req->id_category;
        $article->title = $req->title;
        $article->description = $req->description;
        $article->content = $req->content;
        
        $article->save();

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
        $delete = Article::where('id', '=', $id)->delete();

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
