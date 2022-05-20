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
                <div class="alert alert-success alert-block py-2 px-2 d-flex justify-content-between" style="width: 500px">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(isset($item))
                    <form action="{{url('update-Item')}}" method="POST">
                        <input type="hidden" value="{{$item->id}}" name="itemID">
            @else
                <form action="{{url('add-Item')}}" method="POST">
            @endif

                @csrf
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputEmail4">Fixed Asset No</label>
                        <input type="text" class="form-control" placeholder=""
                               name="FixedAsset"
                               value="{{old('FixedAsset')}} {{isset($item) ? $item->FA_NO : '' }}" {{isset($item) ? 'readonly' : ''}}>
                        <span style="color:red">{{ $errors->first('FixedAsset') }}</span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputAddress">Major Type</label>
                        <input type="text" class="form-control" placeholder=""
                               name="MajorType"
                               value="{{old('MajorType')}} {{isset($item) ? $item->MAJOR_TYPE : '' }}">
                        <span style="color:red">{{ $errors->first('MajorType') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputAddress2">Item Description</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Description"
                               value="{{old('Description')}} {{isset($item) ? $item->DESCRIPTION : '' }}">
                        <span style="color:red">{{ $errors->first('Description') }} </span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Brand</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Brand"
                               value="{{old('Brand')}} {{isset($item) ? $item->BRAND : '' }}">
                        <span style="color:red">{{ $errors->first('Brand') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Make Year</label>
                        <input type="number" class="form-control" placeholder=""
                               name="MakeYear"
                               value="{{isset($item) ? $item->MAKE_YEAR : '' }}">
                        <span style="color:red">{{ $errors->first('MakeYear') }}</span>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Model</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Model"
                               value="{{old('Model')}} {{isset($item) ? $item->MODEL : '' }}">
                        <span style="color:red">{{ $errors->first('Model') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Serial No</label>
                        <input type="text" class="form-control" placeholder=""
                               name="sno"
                               value="{{old('sno')}} {{isset($item) ? $item->SNO : '' }}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Installation Date</label>
                        <input type="date" class="form-control" name="installDate" value="{{isset($item) ? $item->INSTALL_DATE : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Vendor</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Vendor"
                               value="{{old('Vendor')}}  {{isset($item) ? $item->VENDOR : '' }}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Custodian</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Custodian"
                               value="{{old('Custodian')}} {{isset($item) ? $item->CUSTODIAN : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputCity">Technical Info 1</label>
                        <input type="text" class="form-control" placeholder=""
                               name="TechInfo1"
                               value="{{old('TechInfo1')}} {{isset($item) ? $item->TECH_INFO_1 : '' }}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Technical Info 2</label>
                        <input type="text" class="form-control" name="TechInfo2"
                               value="{{old('TechInfo2')}} {{isset($item) ? $item->TECH_INFO_2 : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Building</label>
                        <select class="form-select flex-grow-1"
                                name="Building">
                            <option value=""> -- Select Request Type --</option>
                            <option
                                value="IPD" {{ old('Building') == 'IPD' ? 'selected' : '' }}  {{ isset($item) ? ($item->BUILDING == 'IPD' ? 'selected' : '' ) : '' }}>
                                IPD
                            </option>
                            <option
                                value="OPD" {{ old('RequestType') == 'OPD' ? 'selected' : '' }} {{ isset($item) ? ($item->BUILDING == 'OPD' ? 'selected' : '' ) : '' }}>
                                OPD
                            </option>
                        </select>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Floor</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Floor"
                               value="{{old('Floor')}} {{isset($item) ? $item->FLOOR : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Room</label>
                        <input type="text" class="form-control" placeholder=""
                               name="Room"
                               value="{{old('Room')}} {{isset($item) ? $item->ROOM : '' }}">
                    </div>
                    <div class="col-md-2"></div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="inputZip">Department</label>
                        <select class="form-select flex-grow-1" id="deptdropdown" name="Department">
                            <option value=""> -- Select Department --</option>
                            @foreach($dept as $depth)
                                <option
                                    value="{{ $depth->id }}" {{ isset($item) ? ($item->DEPT_ID == $depth->id ? 'selected' : '' ) : '' }} >{{ $depth->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="btn-group float-end">

                    @if(isset($item))
                        <button type="submit" class="btn btn-warning btn-block mt-2 me-2">Update</button>
                    @else
                        <button type="submit" class="btn btn-primary btn-block mt-2 me-2">Save</button>
                    @endif
                    <a class="btn btn-danger mt-2 me-2" href="{{ url('item-List') }}">Exit</a>
                </div>
            </form>
        </div>
    </div>
@endsection

