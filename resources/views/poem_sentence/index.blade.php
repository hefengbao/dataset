@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('poem_sentence.store', $sentence->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="content" class="form-label">内容</label>
                                <textarea class="form-control" id="content"  name="content" rows="3">{{ $sentence->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="from" class="form-label">出处</label>
                                <input type="text" class="form-control" id="from" name="from" value="{{ $sentence->from }}">
                            </div>
                            <button class="btn btn-primary" type="submit">保存</button>
                            <a class="btn btn-info" href="{{ route('poem_sentence.index') }}?id={{ $sentence->id + 1 }}">下一首</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
