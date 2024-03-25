<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index',compact('news'));
    }
    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable'
        ]);

        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == true ? 1:0
        ]);

        return redirect('/news')->with('status','News Created Successfully');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit',compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'nullable'
        ]);

        $news->update([
           'title' => $request->title,
           'description' => $request->description,
           'status' => $request->status == true ? 1:0
        ]);

        return redirect('/News')->with('status','News updated Successfully');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/news')->with('status','News deleted Successfully');
    }
}
