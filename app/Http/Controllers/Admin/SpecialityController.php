<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Speciality;
use DataTables;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\Theme;

use Illuminate\Http\Request;

class SpecialityController extends Controller
{

    public function AddSpeciality()
    {

        $theme = Theme::where('status', 1)->get();
        return view('Admin.Speciality.add', compact('theme'));

    }
    public function SubmitSpeciality(Request $request)
    {
        $validatedData = $request->validate([
            'speciality' => 'required',
            'theme' => 'required'
        ]);
        $formData = new Speciality();
        $formData->name = $request->input('speciality');
        $formData->theme_id = $request->input('theme');
        $formData->save();

        return redirect()->route('list.speciality')->with('success', 'speciality Added successfully!');

    }
    public function ListSpeciality()
    {
        return view('Admin.Speciality.list');
    }

    public function ShowSpeciality(Request $request)
    {
        if ($request->ajax()) {
            $speciality = Speciality::get();

            return datatables::of($speciality)
                ->addColumn('actions', function ($speciality) {
                    return '
                     <div class="d-flex">
                        <a href="' . route('edit.speciality', $speciality->id) . '" class="icon_btn" data-id="' . $speciality->id . '"><i class="bi bi-pen"></i></a> 
                        <button style="display:none"  class="icon_btn delete" data-id="' . $speciality->id . '"><i class="bi bi-trash"></i></button>
                        </div>
                    ';
                })
                ->addColumn('status', function ($speciality) {
                    $checked = $speciality->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $speciality->id . '" data-id="' . $speciality->id . '" ' . $checked . '/>
                            </div>';
                })
                ->rawColumns(['actions', 'status'])
                ->make(true);
        }

        return view('Admin.Speciality.list');



    }

    public function EditSpeciality($speciality)
    {
        $speciality = Speciality::findOrFail($speciality);
        $theme = Theme::where('status', 1)->get();
        return view('Admin.Speciality.edit', compact('speciality', 'theme'));

    }
    public function UpdateSpeciality(Request $request, $id)
    {
        $request->validate([
            'speciality' => 'required',
        ]);
        DB::table('specialities')
            ->where('id', $id)
            ->update(['name' => $request->input('speciality'), 'theme_id' => $request->input('theme')]);
        return redirect()->route('list.speciality')->with('success', 'speciality Updated successfully!');

    }

    public function UpdateStatusSpeciality(Request $request)
    {

        $timeslotId = $request->input('specialitytId');
        $status = $request->input('status');
        $timeslot = Speciality::find($timeslotId);
        $timeslot->status = $status;
        $timeslot->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

}