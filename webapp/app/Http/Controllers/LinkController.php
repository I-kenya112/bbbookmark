<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    // フォーム表示
    public function create()
    {
        return view('links.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url|max:1000',
            'description' => 'nullable|max:1000',
            'is_public' => 'required|boolean',
        ]);

        $validated['user_id'] = Auth::id();

        Link::create($validated);

        return redirect()->route('links.create')->with('status', 'リンクを登録しました！');
    }
}
