@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4">リンクを登録する</h2>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('links.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" value="{{ old('url') }}" class="form-control" required>
            @error('url') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="description">説明</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="form-group mb-3">
            <label for="is_public">公開設定</label>
            <select name="is_public" id="is_public" class="form-control" required>
                <option value="0" {{ old('is_public') == '0' ? 'selected' : '' }}>非公開</option>
                <option value="1" {{ old('is_public') == '1' ? 'selected' : '' }}>公開</option>
            </select>
            @error('is_public') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">登録する</button>
    </form>
</div>
@endsection
