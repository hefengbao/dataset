@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('test.poem_store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $poem->id }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">标题</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $poem->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="dynasty" class="form-label">朝代</label>
                                <input type="text" class="form-control" id="dynasty" name="dynasty" value="{{ $poem->dynasty }}">
                            </div>
                            <div class="mb-3">
                                <label for="writer" class="form-label">作者</label>
                                <input type="text" class="form-control" id="writer" name="writer" value="{{ $poem->writer }}">
                            </div>
                            <div class="mb-3">
                                <pre>{{ $poem->type }}</pre>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">内容</label>
                                <textarea class="form-control" id="content"  name="content" rows="3">{{ $poem->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="remark" class="form-label">注释</label>
                                <textarea class="form-control" id="remark"  name="remark" rows="3">{{ $poem->remark }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="translation" class="form-label">译文</label>
                                <textarea class="form-control" id="translation"  name="translation" rows="3">{{ $poem->translation }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="shangxi" class="form-label">赏析</label>
                                <textarea class="form-control" id="shangxi"  name="shangxi" rows="3">{{ $poem->shangxi }}</textarea>
                            </div>
                            <div class="mb-3">{{ $poem->id }}</div>
                            <button type="submit">下一首</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
