@extends('main')

@section('content')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">New Complain</h5>
            </div>
            <div class="card-body">
                <form action="insertTicket" method="POST" ENCTYPE="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputEmail4">Request Type</label>
                            <select class="form-select flex-grow-1" name="RequestType">
                                <option>  -- Select Request Type -- </option>
                                <option value="Incident">Incident</option>
                                <option value="Training Request">Training Request</option>
                                <option value="Issue">Issue</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputAddress">Status</label>
                            <select class="form-select flex-grow-1" name="status">
                                <option> -- Select Status -- </option>
                                @foreach($ticketStatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputAddress2">Department</label>
                            <select class="form-select flex-grow-1" id="deptdropdown" name="dept_id">
                                <option> -- Select Department -- </option>
                                @foreach($dept as $depth)
                                    <option value="{{ $depth->id }}">{{ $depth->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">Priority</label>
                            <select class="form-select flex-grow-1" name="priority">
                                <option> -- Select Priority -- </option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputCity">Section</label>
                            <select class="form-select flex-grow-1" id="sectiondropdown" name="section_id">
                                <option> -- Select Section -- </option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4 form-check form-switch py-4">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="urgent">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Urgent ?</label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputState">Subject</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Subject here" name="subject">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" id="inputEmail4"  rows="8"  placeholder="Complain Details..." name="CompainDetails"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label w-100">Attach File</label>
                            <input type="file" name="image[]" class="file-upload-field" multiple>
                        </div>
                    </div>
                        <div class="btn-group float-end">
                            <button type="submit"  class="btn btn-primary btn-block mt-2 me-2">Save</button>
                            <button type="button" class="btn btn-danger btn-block mt-2">Exit</button>
                        </div>
                </form>
            </div>
        </div>

@endsection

