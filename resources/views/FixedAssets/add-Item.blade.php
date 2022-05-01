@extends('main')
@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <div class="d-flex" style="align-items: center">
                <h4 class="card-title" style="font-size: large">Item Definition</h4>
            </div>
        </div>
        <div class="card-body">
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <form action="{{url('add-Item')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputEmail4">Fixed Asset No</label>
                        <input type="text" class="form-control" placeholder=""
                               name="FixedAsset"
                               value="{{old('FixedAsset')}}">
                        <span style="color:red">{{ $errors->first('FixedAsset') }}</span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputAddress">Major Type</label>
                        <input type="text" class="form-control" placeholder=""
                               name="MajorType"
                               value="{{old('MajorType')}}">
                        <span style="color:red">{{ $errors->first('FixedAsset') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputAddress2">Item Description</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Description"
                               value="{{old('Description')}}">
                        <span style="color:red">{{ $errors->first('Description') }}</span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Brand</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Brand"
                               value="{{old('Brand')}}">
                        <span style="color:red">{{ $errors->first('Brand') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Make Year</label>
                        <input type="number" class="form-control" placeholder=""
                               name="MakeYear"
                               value="{{old('Brand')}}">
                        <span style="color:red">{{ $errors->first('MakeYear') }}</span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Model</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Model"
                               value="{{old('Model')}}">
                        <span style="color:red">{{ $errors->first('Model') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Serial No</label>
                        <input type="text" class="form-control" placeholder=""
                               name="sno"
                               value="{{old('sno')}}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Installation Date</label>
                        <input type="date" class="form-control" name="installDate">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Vendor</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Vendor"
                               value="{{old('Vendor')}}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Custodian</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Custodian"
                               value="{{old('Custodian')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Technical Info 1</label>
                        <input type="text" class="form-control" placeholder=""
                               name="TechInfo1"
                               value="{{old('TechInfo1')}}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Technical Info 2</label>
                        <input type="text" class="form-control" name="TechInfo2"
                               value="{{old('TechInfo2')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Building</label>
                        <select class="form-select flex-grow-1"
                                name="Building">
                            <option value=""> -- Select Request Type --</option>
                            <option
                                value="IPD" {{ old('Building') == 'IPD' ? 'selected' : '' }}>
                                IPD
                            </option>
                            <option
                                value="OPD" {{ old('RequestType') == 'OPD' ? 'selected' : '' }}>
                                OPD
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Floor</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Floor"
                               value="{{old('Floor')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Room</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Room"
                               value="{{old('Room')}}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Department</label>
                        <select class="form-select flex-grow-1" id="deptdropdown" name="Department">
                            <option value=""> -- Select Department --</option>
                            @foreach($dept as $depth)
                                <option
                                    value="{{ $depth->id }}" {{ isset($tickets) ? ($tickets->dept_id == $depth->id ? 'selected' : '' ) : '' }}>{{ $depth->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="btn-group float-end">
                    <button type="submit" class="btn btn-primary btn-block mt-2 me-2">Save</button>
                    <a class="btn btn-danger mt-2 me-2" href="{{ url('item-List') }}">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection

