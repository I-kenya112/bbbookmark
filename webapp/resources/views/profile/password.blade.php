@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">パスワード変更</h2>

    @if (session('status') === 'password-updated')
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            パスワードを変更しました。
        </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        @method('PUT')

        <!-- 現在のパスワード -->
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-gray-700">
                現在のパスワード
            </label>
            <input id="current_password" name="current_password" type="password" required autocomplete="current-password"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">
            @error('current_password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- 新しいパスワード -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">
                新しいパスワード
            </label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">
            @error('password')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- パスワード確認 -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                新しいパスワード（確認）
            </label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                class="mt-1 block w-full border-gray-300 rounded shadow-sm">
        </div>

        <!-- アクションボタン -->
        <div class="flex justify-between items-center">
            <a href="{{ route('profile.show') }}"
                class="inline-block px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">
                ← プロフィールに戻る
            </a>

            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                パスワードを更新
            </button>
        </div>
    </form>
</div>
@endsection
