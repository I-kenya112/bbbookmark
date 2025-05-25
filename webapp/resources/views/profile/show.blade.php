@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">プロフィール</h2>

    <div class="bg-white shadow rounded-lg p-6 space-y-4">
        <!-- アイコン（仮） -->
        <div class="flex items-center space-x-4">
            <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center text-white text-sm">
                アイコンの予定
            </div>
            <div>
                <p class="text-lg font-bold">{{ $user->nickname ?? '（ニックネーム未設定）' }}</p>
                <p class="text-sm text-gray-500">ユーザーID: {{ $user->user_id }}</p>
            </div>
        </div>

        <!-- プロフィール情報 -->
        <dl class="divide-y divide-gray-200">
            <div class="py-3">
                <dt class="text-sm font-medium text-gray-500">登録名</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $user->name }}</dd>
            </div>
            <div class="py-3">
                <dt class="text-sm font-medium text-gray-500">メールアドレス</dt>
                <dd class="mt-1 text-sm text-gray-900">{{ $user->email ?? '（未登録）' }}</dd>
            </div>
            <div class="py-3">
                <dt class="text-sm font-medium text-gray-500">自己紹介</dt>
                <dd class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $user->bio ?? '（未記入）' }}</dd>
            </div>
            <div class="py-3">
                <dt class="text-sm font-medium text-gray-500">権限</dt>
                <dd class="mt-1 text-sm text-gray-900">
                    @if ($user->is_admin)
                        <span class="text-red-600 font-semibold">管理者</span>
                    @else
                        一般ユーザー
                    @endif
                </dd>
            </div>
        </dl>

        <!-- アクション -->
        <div class="flex gap-3 pt-4">
            <a href="{{ route('profile.edit') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">プロフィール編集</a>
            <a href="{{ route('profile.password') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">パスワード変更</a>

            <form method="POST" action="{{ route('profile.destroy') }}"
                  onsubmit="return confirm('本当にアカウントを削除しますか？');">
                @csrf
                @method('delete')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">アカウント削除</button>
            </form>
        </div>
    </div>
</div>
@endsection
