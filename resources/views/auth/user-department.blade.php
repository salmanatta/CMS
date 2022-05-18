@extends('main')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">User Department Association</h5>
                    </div>
                    <div class="card-body">
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-block py-2 px-2 d-flex justify-content-between" style="width: 500px">
                                <strong>{{ Session::get('success') }}</strong>
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <form action="{{ url('user-department') }}" method="POST">
                                <input type="hidden" name="userId" value="{{ $user->id }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Use Email</label>
                                    <input type="text" class="form-control" placeholder="User Email" name="email" disabled value="{{isset($user) ? $user->email : old('email')}}">
                                    <span style="color:red">@error('email') {{ $message }} @enderror</span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Department Name</label>
                                    <select class="form-select flex-grow-1" id="deptdropdown" name="department">
                                        <option value=""> -- Select Department --</option>
                                        @foreach($dept as $depth)
                                            <option
                                                value="{{ $depth->id }}">{{ $depth->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">@error('department') {{ $message }} @enderror</span>
                                </div>
                                <div class="float-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-danger" href="{{ url('user-list') }}">Exit</a>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection


