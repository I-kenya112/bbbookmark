@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">プロフィール編集</h2>

    @if (session('status') === 'profile-updated')
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            プロフィールを更新しました。
        </div>
    @endif

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- ユーザー名 -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">ユーザー名</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- ニックネーム -->
        <div class="mb-4">
            <label for="nickname" class="block text-sm font-medium text-gray-700">ニックネーム</label>
            <input id="nickname" name="nickname" type="text" class="mt-1 block w-full border-gray-300 rounded shadow-sm"
                value="{{ old('nickname', $user->nickname) }}">
            @error('nickname')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- 自己紹介 -->
        <div class="mb-4">
            <label for="bio" class="block text-sm font-medium text-gray-700">自己紹介（255文字まで）</label>
            <textarea id="bio" name="bio" rows="4" maxlength="255"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">{{ old('bio', $user->bio) }}</textarea>
            @error('bio')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- アイコン -->
        <div class="mb-6">
            <label for="icon" class="block text-sm font-medium text-gray-700">アイコン（未対応）</label>
            <input id="icon" name="icon" type="text" disabled
                class="mt-1 block w-full border-gray-300 bg-gray-100 text-gray-500 rounded shadow-sm"
                value="アイコンの編集は未対応です">
        </div>

        <!-- ボタンを左右に分けるFlex配置 -->
        <div class="mt-6 flex justify-between items-center">
            <!-- 左側：戻るボタン -->
            <a href="{{ route('profile.show') }}"
            class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                ← プロフィールに戻る
            </a>

            <!-- 右側：保存ボタン -->
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                保存する
            </button>
        </div>
    </form>
</div>
@endsection
