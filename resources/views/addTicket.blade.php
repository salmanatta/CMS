@extends('main')

@section('content')
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">New Complain</h5>
            </div>
            <div class="card-body">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <form action="insertTicket" method="POST" ENCTYPE="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputEmail4">Request Type</label>
                            <select class="form-select flex-grow-1" name="RequestType" {{ isset($tickets) ? 'disabled' : '' }}>
                                <option value="">  -- Select Request Type -- </option>
                                <option value="Incident" {{ isset($tickets) ? $tickets->type == 'Incident' ? 'selected' : '' : '' }}>Incident</option>
                                <option value="Training Request" {{ isset($tickets) ? $tickets->type == 'Training Request' ? 'selected' : '' : '' }}>Training Request</option>
                                <option value="Issue" {{ isset($tickets) ? $tickets->type == 'Issue' ? 'selected' : '' : '' }}>Issue</option>
                            </select>
                            <span style="color:red">{{ $errors->first('RequestType') }}</span>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputAddress">Status</label>
                            <select class="form-select flex-grow-1" name="status" {{ isset($tickets) ? 'disabled' : '' }}>
                                <option value=""> -- Select Status -- </option>
                                @foreach($ticketStatus as $status)
                                    <option value="{{ $status->id }}" {{ isset($tickets) ? ($tickets->status_id == $status->id ? 'selected' : '') : '' }}>{{ $status->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputAddress2">Department</label>
                            <select class="form-select flex-grow-1" id="deptdropdown" name="department" {{ isset($tickets) ? 'disabled' : '' }}>
                                <option value=""> -- Select Department -- </option>
                                @foreach($dept as $depth)
                                    <option value="{{ $depth->id }}" {{ isset($tickets) ? ($tickets->dept_id == $depth->id ? 'selected' : '' ) : '' }}>{{ $depth->name }}</option>
                                @endforeach
                            </select>
                            <span style="color:red">{{ $errors->first('department') }}</span>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputZip">Priority</label>
                                <select class="form-select flex-grow-1" name="priority" {{ isset($tickets) ? 'disabled' : '' }}>
                                    <option value=""> -- Select Priority -- </option>
                                    <option value="Low" {{ isset($tickets) ? $tickets->priority == 'Low' ? 'selected' : '' : '' }}>Low</option>
                                    <option value="Medium" {{ isset($tickets) ? $tickets->priority == 'Medium' ? 'selected' : '' : '' }}>Medium</option>
                                    <option value="High" {{ isset($tickets) ? $tickets->priority == 'High' ? 'selected' : '' : '' }}>High</option>
                                </select>
                                <span style="color:red">{{ $errors->first('priority') }}</span>

                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="inputCity">Section</label>
                            <select class="form-select flex-grow-1" id="sectiondropdown" name="section" {{isset($tickets)? 'disabled' : ''}} >
                                @if(isset($tickets))
                                    <option value="{{$tickets->section_id}}"> {{$tickets->section->name}} </option>
                                @else
                                    <option value=""> -- Select Section -- </option>
                                @endif
                            </select>
                            <span style="color:red">{{ $errors->first('section') }}</span>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="mb-3 col-md-4 form-check form-switch py-4">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="urgent" {{ isset($tickets) ? ($tickets->urgent == 1 ? 'checked' : "") : ''  }} {{ isset($tickets) ? 'disabled' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckDefault">Urgent ?</label>
                        </div>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="inputState">Subject</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Subject here" name="subject" value="{{isset($tickets) ? $tickets->subject : old('subject')}}" {{isset($tickets) ? 'readonly' : ''}}>
                        <span style="color:red">{{ $errors->first('subject') }}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" id="inputEmail4"  rows="8"  placeholder="Complain Details..." name="ComplainDetails">{!! isset($tickets) ? $tickets->details : '' !!}</textarea>
                            <span style="color:red">{{ $errors->first('ComplainDetails') }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label w-100">Attach File</label>
                            <input type="file" name="image[]" class="file-upload-field" multiple>
                        </div>
                    </div>
                    @if (isset($tickets))
                        <div class="row">
                            @foreach($tickets->attachments as $attachment)
                                <div class="mb-3">
                                    <a href="{!! url('storage/app/public/tickets').'/'.$attachment->file_path !!}">Ticket Attachment</a>
                                </div>
                            @endforeach
                        </div>
                    @endif


                        <div class="btn-group float-end">
                            <button type="submit"  class="btn btn-primary btn-block mt-2 me-2">Save</button>
                            <a class="btn btn-danger mt-2 me-2" href="{{ route('showTickets') }}">Exit</a>
                        </div>
                </form>
            </div>
        </div>

@endsection

