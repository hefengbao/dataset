@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ $data->title }}</h3>
                        <div class="contson">
                            山一程，水一程，身向榆关那畔行，夜深千帐灯。\r\n 风一更，雪一更，聒碎乡心梦不成，故园无此声。
                        </div>
                        <p>{{ $data->dynasty }} {{ $data->author }}</p>
                        <p>{!! $data->content !!}</p>
                        <pre>
                            {!! $data->sons !!}
                        </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
