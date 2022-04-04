@extends('main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Section {{ isset($section) ? 'Updation' : 'Creation' }}</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::get('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(isset($section))
                            <form action="{{ url('updateSection/'.$section->id) }}" method="POST">
                                @method('PATCH')
                                <input type="hidden" name="section_id" value="{{ $section->id }}">
                                @else
                                    <form action="{{ url('insertSection') }}" method="POST">
                                        @endif
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label" for="inputEmail4">Department</label>
                                            <select class="form-select flex-grow-1" name="dept_id">
                                                @foreach($dept as $dep)
                                                    <option value="{{ $dep->id }}" {{ isset($section) ? ($section->dept_id == $dep->id ? "selected" : "") : "" }}> {{ $dep->name }} </option>
                                                @endforeach
                                            </select>
                                            <span style="color:red">{{ $errors->first('dept_id') }}</span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Section Name</label>
                                            <input type="text" class="form-control" placeholder="Section Name" name="name" value="{{isset($section) ? $section->name : old('name') }}">
                                            <span style="color:red"> {{ $errors->first('name') }}</span>
                                        </div>
                                        <div class="float-end">
                                            <button type="submit" class="btn btn-primary">{{isset($section) ? 'Update' : 'Save'}}</button>
                                            <a class="btn btn-danger" href="{{ route('section') }}">Exit</a>
                                        </div>
                                        <input type="hidden" name="status" value="1">
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
