@extends('main')

@section('content')
    <div class="card">
        <div class="card-header bg-light">
            <div class="d-flex justify-content-between" style="align-items: center">
                <h4 class="card-title" style="font-size: large">New Complain
                    @if(isset($tickets))
                        <a href="{{url('showTicketLog/'.$tickets->id)}}"><img src="{{ url('resources/images/info.png') }}"
                                                                              style="width: 20px; height: 20px"> </a>

                    @endif
                </h4>
                <div>
                    @if(isset($tickets))
                        <label class="form-label">Ticket ID</label>
                        {{$tickets->id}}
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(Session::get('success'))
                <div class="alert alert-success" style="width: 500px">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(isset($tickets))
                <form action="{{url('insertComment')}}" method="POST">
                    @else
                        <form action="insertTicket" method="POST" ENCTYPE="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputEmail4">Request Type</label>
                                    <select class="form-select flex-grow-1"
                                            name="RequestType" {{ isset($tickets) ? 'disabled' : '' }}>
                                        <option value=""> -- Select Request Type --</option>
                                        <option
                                            value="Complaint" {{ old('RequestType') == 'Complaint' ? 'selected' : '' }} {{ isset($tickets) ? $tickets->type == 'Complaint' ? 'selected' : '' : '' }}>
                                            Complaint
                                        </option>
                                        <option
                                            value="Incident" {{ old('RequestType') == 'Incident' ? 'selected' : '' }} {{ isset($tickets) ? $tickets->type == 'Incident' ? 'selected' : '' : '' }}>
                                            Incident
                                        </option>
                                        <option
                                            value="Request for Information" {{ old('RequestType') == 'Request for Information' ? 'selected' : '' }} {{ isset($tickets) ? $tickets->type == 'Request for Information' ? 'selected' : '' : '' }}>
                                            Request for Information
                                        </option>
                                        <option
                                            value="Self Assigned Task" {{ old('RequestType') == 'Self Assigned Task' ? 'selected' : '' }} {{ isset($tickets) ? $tickets->type == 'Self Assigned Task' ? 'selected' : '' : '' }}>
                                            Self Assigned Task
                                        </option>
                                        <option
                                            value="Task Assigned by Senior" {{ old('RequestType') == 'Task Assigned by Senior' ? 'selected' : '' }} {{ isset($tickets) ? $tickets->type == 'Task Assigned by Senior' ? 'selected' : '' : '' }}>
                                            Task Assigned by Senior
                                        </option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('RequestType') }}</span>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputAddress">Status</label>
                                    <select class="form-select flex-grow-1" name="status" disabled>
                                        <option value=""> -- Select Status --</option>
                                        @foreach($ticketStatus as $status)
                                            <option
                                                value="{{ $status->id }}" {{ isset($tickets) ? ($tickets->status_id == $status->id ? 'selected' : '') : ($status->id == 1 ? 'selected' : '') }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputAddress2">Related Department</label>
                                    <select class="form-select flex-grow-1" id="deptdropdown" name="department">
                                        <option value=""> -- Select Department --</option>
                                        @foreach($dept as $depth)
                                            <option
                                                value="{{ $depth->id }}" {{ isset($tickets) ? ($tickets->dept_id == $depth->id ? 'selected' : '' ) : '' }}>{{ $depth->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('department') }}</span>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputZip">Priority</label>
                                    <select class="form-select flex-grow-1"
                                            name="priority" {{ isset($tickets) ? 'disabled' : '' }}>
                                        <option value=""> -- Select Priority --</option>
                                        <option
                                            value="Low" {{ old('priority') == 'Low' ? 'selected' : '' }} {{ isset($tickets) ? ($tickets->priority == 'Low' ? 'selected' : '') : '' }}>
                                            Low
                                        </option>
                                        <option
                                            value="Medium" {{ old('priority') == 'Medium' ? 'selected' : '' }} {{ isset($tickets) ? ($tickets->priority == 'Medium' ? 'selected' : '') : '' }}>
                                            Medium
                                        </option>
                                        <option
                                            value="High" {{ old('priority') == 'High' ? 'selected' : '' }} {{ isset($tickets) ? ($tickets->priority == 'High' ? 'selected' : '' ): '' }}>
                                            High
                                        </option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('priority') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="inputCity">Related Section</label>
                                    <select class="form-select flex-grow-1" id="sectiondropdown" name="section">
                                        @if(isset($tickets))
                                            <option value=""> -- Select Section --</option>
                                            @foreach($sections as $section)
                                                <option
                                                    value="{{ $section->id }}" {{ isset($tickets) ? ($tickets->section_id == $section->id ? 'selected' : '' ) : '' }}>{{ $section->name }}</option>
                                            @endforeach
                                        @else
                                            <option value=""> -- Select Section --</option>
                                        @endif
                                    </select>
                                    <span style="color:red">{{ $errors->first('section') }}</span>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="mb-3 col-md-4 ui-widget">
                                    <label class="form-label" for="FAItems">Assets (if any)</label>
                                    <select class="form-select flex-grow-1" id="FAItems" name="FAItems">
                                        @if(isset($tickets))
                                            <option value=""> -- Select Asset(s) --</option>
                                            @foreach($FAitems as $FAitem)
                                                <option
                                                    value="{{ $FAitem->id }}" {{ isset($tickets) ? ($tickets->item_id == $FAitem->id ? 'selected' : '' ) : '' }}>{{ $FAitem->DESCRIPTION }}</option>
                                            @endforeach
                                        @else
                                            <option value=""> -- Select FA Item --</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="complainlocation">Complain Location</label>
                                    <input type="text" class="form-control" id="complainlocation"
                                           placeholder="Complain Location" name="complainlocation"
                                           value="{{isset($tickets) ? $tickets->complainlocation : old('complainlocation')}}" {{isset($tickets) ? 'readonly' : ''}}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="inputState">Subject</label>
                                    <input type="text" class="form-control" id="inputEmail4"
                                           placeholder="Enter Subject here" name="subject"
                                           value="{{isset($tickets) ? $tickets->subject : old('subject')}}" {{isset($tickets) ? 'readonly' : ''}}>
                                    <span style="color:red">{{ $errors->first('subject') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label" for="inputState">Details</label>
                                    <textarea class="form-control" id="editor1"
                                              {{isset($tickets)? 'readonly':'' }} name="ComplainDetails">{!! isset($tickets) ? $tickets->details : '' !!} {{ old('ComplainDetails') }}</textarea>
                                    <span style="color:red">{{ $errors->first('ComplainDetails') }}</span>
                                </div>
                            </div>
                            <br>
                            @if(!isset($tickets))
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label w-100">Attach File</label>
                                        <input type="file" accept=".gif,.jpg,.jpeg,.png" id="fileName" name="image[]"
                                               class="file-upload-field" multiple onchange="validateFileType(this)">
                                    </div>
                                </div>
                            @endif
                            @if (isset($tickets))
                                <h4>Attachments</h4>
                                <div class="row">
                                    @foreach($tickets->attachments as $attachment)
                                        <div class="col-sm-2">
                                            <a href="{!! url('storage/app/public/tickets').'/'.$attachment->file_path !!}"
                                               target="_blank">
                                                <img
                                                    src="{!! url('storage/app/public/tickets').'/'.$attachment->file_path !!}"
                                                    style="width: 200px;height: 200px" alt="Ticket Attachment">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                {{--                        <div class="container-fluid">--}}
                                {{--                            <div class="col sm-12">--}}
                                {{--                                <table class="table table-striped">--}}
                                {{--                                    <thead>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">Comment By</th>--}}
                                {{--                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Comment</th>--}}
                                {{--                                        <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px; text-align: end" aria-label="Position: activate to sort column ascending">Comment Date/Time</th>--}}
                                {{--                                    </tr>--}}
                                {{--                                    </thead>--}}
                                {{--                                    <tbody>--}}
                                {{--                                    @foreach($tickets->comments as $comment)--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td width="10%" style="text-align: left" >{{ $comment->user->name }}</td>--}}
                                {{--                                        <td width="40%">{!! $comment->comment !!}</td>--}}
                                {{--                                        <td width="10%" style="text-align: end">{{ $comment->created_at }}</td>--}}

                                {{--                                    </tr>--}}
                                {{--                                    @endforeach--}}
                                {{--                                    </tbody>--}}

                                {{--                                </table>--}}
                                {{--                            </div>--}}


                                {{--                        </div>--}}
                                <br>
                                <hr>
                                <h4>Log</h4>
                                <div class="row">
                                    <div class="col sm-12">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 500px;" aria-label="Position: activate to sort column ascending">User</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Status</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px;" aria-label="Position: activate to sort column ascending">Comments</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatables-reponsive" rowspan="1" colspan="1" style="width: 50px; text-align: end" aria-label="Position: activate to sort column ascending">Date / Time</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($tickets->comments as $comment)
                                                <tr>
                                                    <td width="10%" style="text-align: left;font-size: 12px;" >{{ $comment->user->name }}</td>
                                                    <td width="8%" style="font-size: 12px;">{{ $comment->statues->name }}</td>
                                                    <td width="57%" style="font-size: 12px;">{{ strip_tags(html_entity_decode($comment->comment)) }}</td>
                                                    <td width="15%" style="text-align: end;font-size: 12px;">{{ date('D d M, Y H:i:s a' , strtotime($comment->created_at)) }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td width="10%" style="text-align: left;font-size: 12px;" >{{ $tickets->user->name }}</td>
                                                <td width="8%" style="font-size: 12px;">Open</td>
                                                <td width="57%" style="font-size: 12px;">Issue Created</td>
                                                <td width="15%" style="text-align: end;font-size: 12px;">{{ date('D d M, Y H:i:s a',strtotime($tickets->created_at)) }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                @if(isset($tickets))
                                    <input type="hidden" value="{{$tickets->id}}" name="ticketid">
                                    @if($tickets->status_id > 2)
                                <div class="row">
                                    <div class="mb-3 col-md-12">

                                        <label class="form-label">Comment</label>
                                        <textarea class="form-control" id="editor2" name="comment"></textarea>
                                        <span style="color:red">{!! $errors->first('comment') !!}</span>
                                    </div>

                                </div>
                                    @endif
                                @endif
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Status</label>
                                    <select class="form-select flex-grow-1" name="status">
                                        <option value=""> -- Select Status --</option>
                                        @foreach($ticketStatus as $status)
                                            <option
                                                value="{{ $status->id }}" {{ isset($tickets) ? ($tickets->status_id == $status->id ? 'selected' : '') : '' }}>{{ $status->name }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('status') }}</span>
                                </div>
                            @endif
                            <div class="btn-group float-end">
                                @if(isset($tickets))
                                    <button type="submit" class="btn btn-warning btn-block mt-2 me-2">Update</button>
                                @else
                                    <button type="submit" class="btn btn-primary btn-block mt-2 me-2">Save</button>
                                @endif
                                <a class="btn btn-danger mt-2 me-2" href="{{ route('showTickets') }}">Exit</a>
                            </div>
                        </form>
        </div>
    </div>

@endsection


