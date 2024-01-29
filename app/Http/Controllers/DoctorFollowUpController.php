<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FollowUp;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
use App\Providers\NotificationService;

class DoctorFollowUpController extends Controller
{
    //
    public function AddFollowUp()
    {
        return view('Doctor.FollowUp.add');

    }
    public function SubmitFollowUp(Request $request)
    {


        $userDoctorId = auth()->user()->doctor->id;

        foreach ($request->input('mindays') as $key => $min_days) {
            $FollowUpData = new FollowUp();
            $FollowUpData->doctor_id = $userDoctorId;
            $FollowUpData->min_days = $request->input('mindays')[$key];
            $FollowUpData->max_days = $request->input('maxdays')[$key];
            $FollowUpData->discount_type = $request->input('discount_type')[$key];
            $FollowUpData->percentage_amount = $request->input('discount')[$key];
            $FollowUpData->save();
        }




        return redirect('/list-follow-up')->with('success', 'Follow Ups created successfully!');
    }
    public function ListFollowUp()
    {
        return view('Doctor.FollowUp.list');

    }
    public function ShowFollowUp(Request $request)
    {
        if ($request->ajax()) {
            $userDoctorId = auth()->user()->doctor->id;

            $items = FollowUp::where('doctor_id', $userDoctorId)->get();



            return datatables::of($items)

                ->addColumn('actions', function ($item) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('edit.followup', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pencil-square"></i></a> 
                        <button class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>  
                    </div>
                    ';
                })
                ->addColumn('discount_type', function ($item) {
                    $type = $item->discount_type == 0 ? 'Flat' : 'Percentage';

                    return $type;
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }
        return view('Doctor.FollowUp.list');

    }
    public function EditFollowUp($id)
    {
        $item = FollowUp::where('id', $id)->first();
        return view('Doctor.FollowUp.edit', compact('item'));

    }
    public function UpdateFollowUp(Request $request, $id)
    {
        $data = $request->validate([
            'min_days' => 'required',
            'max_days' => 'required',
            'discount_type' => 'required',
            'percentage_amount' => 'required'
        ]);
        FollowUp::where('id', $id)->update($data);
        return redirect()->route('list.followup')->with('success', 'Follow Up Updated successfully!');
    }
    function DeleteFollowUp($id)
    {
        FollowUp::where('id', '=', $id)->delete();
    }

    public function UpdateStatusFollowUp(Request $request)
    {

        $id = $request->input('FollowUpId');
        $status = $request->input('status');

        $timeslot = FollowUp::find($id);
        $timeslot->status = $status;
        $timeslot->save();

        NotificationService::createNotification(auth()->user()->id, 'Follow Up Status Changed', 'You have Changed the status tax');

        return response()->json(['message' => 'Status updated successfully']);
    }
}