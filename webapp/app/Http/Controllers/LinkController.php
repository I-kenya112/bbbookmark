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
        // バリデーション
        $validated = $request->validate([
            'url' => ['required', 'url'],
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_public' => ['required', 'boolean'],
            'tags' => ['array'], // タグは任意（存在する場合のみ）
            'tags.*' => ['integer'], // タグID配列
        ]);

        // リンクを保存
        $link = new Link();
        $link->user_id = Auth::id();
        $link->url = $validated['url'];
        $link->title = $validated['title'] ?? null;
        $link->description = $validated['description'] ?? null;
        $link->is_public = $validated['is_public'];
        $link->save();

        // タグがあれば同期
        if (!empty($validated['tags'])) {
            $link->tags()->sync($validated['tags']);
        }

        return redirect()->route('links.create')->with('status', 'リンクを保存しました');
    }

    public function index()
    {
        $links = Link::with(['tags.category'])
            ->where('user_id', auth::id())
            ->latest()
            ->get();

        return view('links.index', compact('links'));
    }
}
