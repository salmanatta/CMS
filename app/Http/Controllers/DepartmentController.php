<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentFormRequest;
use App\Models\department;
use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deptData = department::all();
        return view('department-List',compact('deptData'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFormRequest $request)
    {
        department::create(['code' => $request->code , 'name' => $request->name]);
        return redirect('department/create')->with('success','Record Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        $data = department::find($department->id);
        return view('department' , compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentFormRequest $request, department $department)
    {
        $data = department::find($department->id);
        $data->code = $request->code;
        $data->name = $request->name;
        $data->save();
        return redirect('department/create')->with('success','Record Updated Successfully');
//        return redirect('department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(department $department)
    {
        //
    }
    public function search(Request $request)
    {
        $deptData = department::where('name','like','%'.$request->get('query').'%')->orWhere('code','like','%'.$request->get('query').'%')->get();
        return view('department-List',compact('deptData'));
    }
    public function showSection()
    {
        $section = Section::all();
        return view('section-list',compact('section'));
    }
    public function createSection()
    {
        $dept = department::all();
        return view("section", compact('dept'));
    }
    public function insertSection(Request $request)
    {
        $request->validate(
        [
            'dept_id'=>'required',
            'name'=>'required'
        ],
        [
            'dept_id.required'=>'Department field is required',
            'name.required'=>'Section Name field is required'
            ]
        );
        Section::create(['dept_id'=> $request->dept_id,
                        'name'=> $request->name,
                        'status'=> $request->status]);
        return redirect('addSection')->with('success','Record Added Successfully');
    }
    public function editSection(Section $section)
    {
        $dept = department::all();
        return view('section',compact('section','dept'));
    }
    public function updateSection(Section $section)
    {
        return $section;
    }

}
