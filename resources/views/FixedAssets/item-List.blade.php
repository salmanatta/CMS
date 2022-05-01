@extends('main')

@section('content')

    <div class="py-4">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4>Item List
                        <a href="{{ url('add-Item') }}" class="btn btn-primary float-end">Add Item</a>
                    </h4>
                </div>

            </div>
        </div>
    </div>


@endsection
