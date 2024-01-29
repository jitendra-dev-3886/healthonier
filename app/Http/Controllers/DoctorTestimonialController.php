<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\Doctor;
use App\Providers\NotificationService;

class DoctorTestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AddTestimonial()
    {
        return view('Doctor.Testimonial.add');
    }
    public function SubmitTestimonial(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'review' => 'required',
            'designation' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $did = Doctor::where('user_id', auth()->user()->id)->first();
        $testimonialData = new Testimonial();
        $testimonialData->doctor_id = $did->id;
        $testimonialData->name = $request->input('name');
        $testimonialData->review = $request->input('review');
        $testimonialData->designation = $request->input('designation');

        if ($request->hasFile('profile')) {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('doctordata/testimonial', $imageName, 'public');

            $testimonialData->profile_name = $imageName;
            $testimonialData->profile_path = 'doctordata/testimonial/' . $imageName;
        }
        $testimonialData->save();
        return redirect()->route('list.testimonial')->with('success', 'Testimonial Added successfully!');

    }
    public function ListTestimonial()
    {

        return view('Doctor.Testimonial.list');
    }
    public function ShowTestimonial(Request $request)
    {

        if ($request->ajax()) {
            $item = Testimonial::join('doctors', 'testimonials.doctor_id', '=', 'doctors.id')->
                where('doctors.user_id', auth()->user()->id)->get();
            $counter = 1;

            return datatables::of($item)
                ->addColumn('actions', function ($item) {
                    return '
                     <div class="d-flex">
                        <a href="' . route('edit.testimonial', $item->id) . '" class="icon_btn" data-id="' . $item->id . '"><i class="bi bi-pen"></i></a> 
                        <button class="icon_btn delete" data-id="' . $item->id . '"><i class="bi bi-trash"></i></button>
                        </div>
                    ';
                })
                ->addColumn('status', function ($item) {
                    $checked = $item->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $item->id . '" data-id="' . $item->id . '" ' . $checked . '/>
                            </div>';
                })
                ->addColumn('serial', function () use (&$counter) {
                    return $counter++;
                })

                ->rawColumns(['actions', 'status', 'serial'])
                ->make(true);



        }

        return view('Doctor.Testimonial.list');
    }

    public function EditTestimonial($id)
    {
        $userDoctorId = auth()->user()->doctor->id;
        $doctor = Doctor::findOrFail($userDoctorId);
        $testimonial = Testimonial::where('doctor_id', $doctor->id)->where('id', $id)->first();

        return view('Doctor.Testimonial.edit',compact('testimonial'));
    }
    public function UpdateTestimonial(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'review' => 'required',
            'designation' => 'required',
            'profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $profileName = time() . '.' . $profile->extension();
            $profile->storeAs('doctordata/testimonial/', $profileName, 'public');

            DB::table('testimonials')
                ->where('id', $id)
                ->update([
                    'profile_name' => $profileName,
                    'profile_path' => 'doctordata/testimonial/' . $profileName,
                ]);
        }
        DB::table('testimonials')
            ->where('id', $id)
            ->update(['name' => $request->input('name'), 'review' => $request->input('review'), 'designation' => $request->input('designation')]);
        return redirect()->route('list.testimonial')->with('success', 'Timeslots updated successfully');


    }
    public function UpdateStatusTestimonial(Request $request)
    {
        $testimonialId = $request->input('testimonialId');
        $status = $request->input('status');
        $timeslot = Testimonial::find($testimonialId);
        $timeslot->status = $status;
        $timeslot->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    function TestimonialDelete($id)
    {
        try {

            DB::table('testimonials')->where('id', '=', $id)->delete();

            return response()->json(['message' => 'testimonial deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete speciality'], 500);
        }

    }
}