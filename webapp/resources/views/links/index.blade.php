@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h2 class="text-2xl font-semibold mb-6">リンク一覧</h2>

    @if (session('status'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    @forelse ($links as $link)
        <div class="bg-white rounded shadow p-4 mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-semibold">
                        <a href="{{ $link->url }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $link->title ?? '(タイトルなし)' }}
                        </a>
                    </h3>
                    <p class="text-sm text-gray-500 break-words">{{ $link->url }}</p>
                </div>
                <span class="text-xs px-2 py-1 rounded bg-{{ $link->is_public ? 'green' : 'gray' }}-100 text-{{ $link->is_public ? 'green' : 'gray' }}-800">
                    {{ $link->is_public ? '公開' : '非公開' }}
                </span>
            </div>

            @if ($link->description)
                <p class="mt-2 text-gray-700">{{ $link->description }}</p>
            @endif

            <!-- タグの表示 -->
            @if ($link->tags->isNotEmpty())
                <div class="mt-3 flex flex-wrap gap-2 text-sm">
                    @foreach ($link->tags as $tag)
                        <span class="inline-block bg-gray-100 text-gray-700 px-2 py-1 rounded">
                            {{ $tag->name }}
                            @if ($tag->category)
                                <span class="text-xs text-gray-500">({{ $tag->category->name }})</span>
                            @endif
                        </span>
                    @endforeach
                </div>
            @endif

            <p class="mt-2 text-sm text-gray-400">
                投稿日: {{ $link->created_at->format('Y年n月j日 H:i') }}
            </p>
        </div>
    @empty
        <p>リンクがまだありません。</p>
    @endforelse
</div>
@endsection
