<?php

namespace App\Http\Controllers;

use App\Page;
use App\Tag;
use Validator;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function newPage()
    {
        $categories = Category::all();
        return view('page_new', compact('categories'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('page/create')
                ->withErrors($validator)
                ->withInput();
        }

        // İçerik doğrulamayı geçerse kayıt işlemi yapıyoruz.

        $createPage = Page::create([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status')
        ]);

        if($createPage) {
            if($request->input('tags') != '') {
                foreach (explode(',', $request->input('tags')) as $tag) {
                    Tag::create([
                        'page_id' => $createPage->id,
                        'name' => $tag
                    ]);
                }
            }

            return redirect('home')->with('statusMsg', 'İşlem Başarılı.');
        }

        return redirect('home')->with('statusMsg', 'Sorun var tekrar dene.');
    }
}
