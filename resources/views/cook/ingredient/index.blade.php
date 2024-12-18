@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($ingredients as $key =>$group)
                <div class="col-md-12 mb-2">
                    <div class="card">
                        <div class="card-header">
                            {{ $key }}
                        </div>
                        @php $group2 = $group->groupBy('category2') @endphp
                        <div class="card-body">
                            @foreach($group2 as $key2 => $items)
                                <h3>{{ $key2 }}（{{ count($items) }}）</h3>
                                <div class="row mb-2">
                                    @foreach($items as $item)
                                        <div class="col-2"><a href="{{ $item->id }}">{{ $item->name }}</a></div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
