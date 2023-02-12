<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PDF;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sqlWhere = [];

        if(!empty($request->data)){
            array_push($sqlWhere,['date', '=', $request->data]);
        }
        if(!empty($request->class)){
            array_push($sqlWhere,['class', '=', $request->class]);
        }
        if(!empty($request->dateFrom)){
            array_push($sqlWhere,['date', '>=', $request->dateFrom]);
        }
        if(!empty($request->dateTo)){
            array_push($sqlWhere,['date', '<=', $request->dateTo]);
        }
        if(!empty($request->hability)){
            array_push($sqlWhere,['hability', '=', $request->hability]);
        }

        $posts = Post::query()
                ->where($sqlWhere)
                ->orderBy('date','desc')
                ->orderBy('time_to','desc')
                ->paginate(100);
        $messageSuccess = $request->session()->get('message.success');

        return view('posts.index')
            ->with('posts', $posts)
            ->with('messageSuccess', $messageSuccess);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $messageSuccess = $request->session()->get('message.success');
        return view('posts.create')
            ->with('messageSuccess', $messageSuccess);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = Post::create($request->all());
        return redirect()->route('posts.create')
                        ->with('message.success',"Aula registrada com sucesso" ); // melhor pratica!

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit')->with('post', $post);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, Request $request)
    {
        $post->fill($request->all());
        $post->save();

        return redirect()
                ->route('posts.index')
                ->with('message.success', "Registro [{$post->title}] atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
                ->with('message.success',"Registro [".date('d/m/Y', strtotime($post->date))." || {$post->time_from} - {$post->time_to}] excluído com sucesso");
    }

    /**
     * Display the register ro Print.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $post = Post::find($id);
        //return view('posts.print')->with('post', $post);

        $pdf = PDF::loadView('posts.print',compact('post'));
        $filename = "[".date('d/m/Y', strtotime($post->date))."][{$post->time_from} - {$post->time_to}].pdf";
        return $pdf->stream($filename);


    }
}
