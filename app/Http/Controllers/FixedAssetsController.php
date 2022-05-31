<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemFormRequest;
use App\Models\department;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FixedAssetsController extends Controller
{
    public function itemList()
    {
        $items = Items::all();
        return view('FixedAssets.item-List' , compact('items'));
    }
    public function addItem()
    {
        $dept = department::all();
        return view('FixedAssets.add-Item',compact('dept'));
    }
    public function insertItem(AddItemFormRequest $request)
    {
        Items::create([
            'FA_NO'         =>$request->FixedAsset,
            'DESCRIPTION'   =>$request->Description,
            'MAJOR_TYPE'    =>$request->MajorType,
            'BRAND'         =>$request->Brand,
            'MODEL'         =>$request->Model,
            'MAKE_YEAR'     =>$request->MakeYear,
            'TECH_INFO_1'   =>$request->TechInfo1,
            'TECH_INFO_2'   =>$request->TechInfo2,
            'SNO'           =>$request->sno,
            'INSTALL_DATE'  =>$request->installDate,
            'VENDOR'        =>$request->Vendor,
            'BUILDING'      =>$request->Building,
            'FLOOR'         =>$request->Floor,
            'ROOM'          =>$request->Room,
            'DEPT_ID'       =>$request->Department,
            'CUSTODIAN'     =>$request->Custodian,
            'CREATED_BY'    =>Auth::user()->id,
        ]);
        return redirect('item-List')->with('success','Record Added Successfully');
    }
    public function getFAItem(Request $request)
    {
        $fAitem = Items::where('DEPT_ID',$request->id)->get();
        return $fAitem;
    }
    public function editItem($id)
    {
        $item = Items::find($id);
        $dept = department::all();
        return view('FixedAssets.add-Item',compact('item','dept'));
    }
    public function updateItem(AddItemFormRequest $request)
    {
        $item = Items::find($request->itemID);
        $item->DESCRIPTION = $request->Description;
        $item->MAJOR_TYPE = $request->MajorType;
        $item->BRAND = $request->Brand;
        $item->MODEL = $request->Model;
        $item->MAKE_YEAR = $request->MakeYear;
        $item->TECH_INFO_1 = $request->TechInfo1;
        $item->TECH_INFO_2 = $request->TechInfo2;
        $item->SNO = $request->sno;
        $item->INSTALL_DATE = $request->installDate;
        $item->VENDOR = $request->Vendor;
        $item->BUILDING = $request->Building;
        $item->FLOOR = $request->Floor;
        $item->ROOM = $request->Room;
        $item->DEPT_ID = $request->Department;
        $item->CUSTODIAN = $request->Custodian;
        $item->update();
        return redirect('item-List')->with('success','Item Updated Successfully.');

    }
}
