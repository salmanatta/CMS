@extends('main')

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Department {{ isset($data) ? 'Updation' : 'Creation' }}</h5>
                </div>
                <div class="card-body">
                    @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                    @if(isset($data))
                            <form action="{{ route('department.update',$data->id) }}" method="POST">
                                @method('PATCH')
                                <input type="hidden" name="department_id" value="{{ $data->id }}">
                        @else
                            <form action="{{ url('department') }}" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Department Code</label>
                            <input type="text" class="form-control" placeholder="Department Code" name="code"  value="{{isset($data) ? $data->code : old('code')}}">
                            <span style="color:red">@error('code') {{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Department Name</label>
                            <input type="text" class="form-control" placeholder="Department Name" name="name" value="{{isset($data) ? $data->name : old('name') }}">
                            <span style="color:red">@error('name') {{ $message }} @enderror</span>
                        </div>
                        <div class="float-end">
                            <button type="button" class="btn btn-danger ">Exit</button>
                            <button type="submit" class="btn btn-primary">{{isset($data) ? 'Update' : 'Save'}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
