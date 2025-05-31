@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">リンクを保存する</h2>

    <form method="POST" action="{{ route('links.store') }}">
        @csrf

        <!-- URL -->
        <div class="mb-4">
            <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
            <input id="url" name="url" type="url" required
                class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                placeholder="https://example.com">
            @error('url')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- タイトル -->
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">タイトル</label>
            <input id="title" name="title" type="text"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">
            @error('title')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- 説明文 -->
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">説明・メモ</label>
            <textarea id="description" name="description" rows="4"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm"></textarea>
            @error('description')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- 公開設定 -->
        <div class="mb-6">
            <label for="is_public" class="block text-sm font-medium text-gray-700">公開範囲</label>
            <select id="is_public" name="is_public"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                <option value="1">公開（誰でも）</option>
                <option value="0">非公開（自分のみ）</option>
            </select>
        </div>

        <!-- タグ選択（仮） -->
        <div class="mb-6">
            <p class="block text-sm font-medium text-gray-700 mb-1">タグを選択（仮）</p>
            <div class="flex flex-wrap gap-2">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="tags[]" value="1">
                    <span>PHP</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="tags[]" value="2">
                    <span>Laravel</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="tags[]" value="3">
                    <span>Docker</span>
                </label>
            </div>
        </div>

        <!-- 投稿ボタン -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                リンクを保存
            </button>
        </div>
    </form>
</div>
@endsection
