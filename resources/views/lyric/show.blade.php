@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('lyrics.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $lyric->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">标题</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $lyric->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="writer" class="form-label">词作</label>
                                <input type="text" class="form-control" id="writer" name="writer">
                            </div>
                            <div class="mb-3">
                                <label for="singer" class="form-label">歌手</label>
                                <input type="text" class="form-control" id="singer" name="singer" value="{{ $lyric->singer }}">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">内容</label>
                                <textarea class="form-control" id="content"  name="content" rows="25">{!! $lyric->lyric !!}</textarea>
                            </div>
                            <button class="btn btn-primary" type="submit">保存</button>
                            <a class="btn btn-info" href="{{ route('lyrics.show', $id + 1) }}">下一首</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
