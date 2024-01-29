<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use App\Models\Speciality;
use App\Models\Doctor;
use Illuminate\Support\Facades\Mail;
use App\Mail\DoctorAdded;
use Illuminate\Support\Facades\DB;
use App\Models\Theme;
use App\Models\Notification;
use App\Models\Clinic;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function superAdminDashboard()
    {

        $countdoctor = User::where('type', '=', 1)->count();
        $clinic = Clinic::with('availabilities')->where('clinics.status', 1)->count();
        $speciality = Speciality::where('status', 1)->count();
        return view('Admin.index', compact('countdoctor', 'clinic', 'speciality'));
    }
    public function AddDoctor()
    {
        $speciality = Speciality::where('status', 1)->get();
        return view('Admin.doctors.index', compact('speciality'));
    }
    public function SubmitDoctor(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'speciality' => 'required',
        ]);
        $email = User::where('email', $request->input('email'))->count();
        if ($email > 0) {
            return redirect()->route('add.doctor')->with('success', 'This Email Is Already Exist!');

        } else {
            $formData = new User();
            $formData->name = $request->input('name');
            $formData->email = $request->input('email');
            $formData->password = $request->input('password');
            $formData->type = 1;
            $formData->save();
            if ($formData->id) {
                $requestedSlug = Str::slug($request->input('name'));
                $originalSlug = $requestedSlug;
                $counter = 1;

                while (Doctor::where('slug', $requestedSlug)->exists()) {
                    $requestedSlug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $doctor = new Doctor();
                $doctor->user_id = $formData->id;
                $doctor->available_status = 1;
                $doctor->speciality_id = $request->input('speciality');
                $doctor->doctor_name = $request->input('name');
                $doctor->slug = $requestedSlug;
                $doctor->save();

            }
            Mail::to($formData->email)->send(new DoctorAdded($formData->email, $request->input('password')));
            $notificationData = new Notification();
            $notificationData->user_id = auth()->user()->id;
            $notificationData->type = "New Doctor Added";
            $notificationData->message = 'Admin added ' . $request->input('name') . ' as a Doctor ';
            $notificationData->read = 0;
            $notificationData->save();


            return redirect()->route('list.doctor')->with('success', 'Doctor Added successfully!');
        }

    }
    public function ShowDoctor(Request $request)
    {
        if ($request->ajax()) {
            $items = User::join('doctors', 'users.id', '=', 'doctors.user_id')
                ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                ->select('users.*', 'specialities.name as dname', 'doctors.doctor_name', 'doctors.user_id')
                ->where('type', '=', 1)->orderBy('doctors.id','desc')->get();
            $counter = 1;

            return datatables::of($items)
                ->addColumn('actions', function ($item) {
                    return '
                     <div class="d-flex">
                    
                        <a href="' . route('admin.doctorprofile', $item->user_id) . '" class="icon_btn" data-id="' . $item->user_id . '" title="Edit Profile"><i class="bi bi-pencil-square"></i></a>  
                        <button class="icon_btn delete" data-id="' . $item->user_id . '"><i class="bi bi-trash"></i></button>
                        </div>
                    ';
                })
                ->addColumn('status', function ($items) {
                    $checked = $items->status ? 'checked' : '';

                    return '<div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_' . $items->user_id . '" data-id="' . $items->user_id . '" ' . $checked . '/>
                            </div>';
                })

                ->addColumn('serial', function () use (&$counter) {
                    return $counter++;
                })

                ->rawColumns(['actions', 'status', 'serial'])
                ->make(true);
        }

        return view('Admin.doctors.list');



    }
    public function ListDoctor()
    {

        return view('Admin.doctors.list');
    }


    public function DeleteDoctor($id)
    {
        try {
            $data = user::where('id', $id)->first();
            $notificationData = new Notification();
            $notificationData->user_id = auth()->user()->id;
            $notificationData->type = 'Doctor Deleted';
            $notificationData->message = 'Admin deleted ' . $data->name . ' in a Doctor ';
            $notificationData->read = 0;
            $notificationData->save();
            $doctor = User::findOrFail($id);
            $doctor->delete();
            // DB::table('doctors')->where('doctor_id', '=', $id)->delete();
            return response()->json(['message' => 'Speciality deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete speciality'], 500);
        }

    }

    public function EditDoctor($id)
    {
        $item = User::findOrFail($id);
        $speciality = Speciality::where('status', 1)->get();

        return view('Admin.doctors.edit', compact('item', 'speciality'));
    }
    public function UpdateStatusDoctor(Request $request)
    {

        $timeslotId = $request->input('doctorId');
        $status = $request->input('status');
        $timeslot = User::find($timeslotId);
        $timeslot->status = $status;
        $timeslot->save();
        $notificationData = new Notification();
        $notificationData->user_id = auth()->user()->id;
        $notificationData->type = 'Doctor Updated';
        $notificationData->message = 'Admin change the status of ' . $timeslot->name . ' in a Doctor ';
        $notificationData->read = 0;
        $notificationData->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    function EditDoctorProfile($id)
    {
        $data = Doctor::join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
            ->join('images', 'specialities.theme_id', '=', 'images.id')
            ->select('doctors.*', 'images.id as themeid', 'images.thumb_path', 'images.image_path as themepath', 'images.theme_name', 'specialities.name')
            ->where('doctors.user_id', $id)->first();

        $speciality = Speciality::where('status', 1)->get();


        return view('Admin.doctors.Profile.edit', compact('data', 'speciality'));
    }
    public function UpdateDoctorProfile(Request $request, $id)
    {
        // dd($request->all());


        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bannerimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bgimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'qrcode' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'fevicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //
        $data = Doctor::where('user_id', $id)->first();
        // dd($data);
        if ($data) {

            DB::table('doctors')
                ->where('user_id', $id)
                ->update([
                    'doctor_name' => $request->input('fullName'),
                    'speciality_id' => $request->input('speciality'),
                    'degree' => $request->input('degree'),
                    'experience' => $request->input('experience'),
                    'about' => $request->input('about'),
                    'email' => $request->input('email'),
                    'mobile' => $request->input('phone'),
                    'twitter' => $request->input('twitter'),
                    'facebook' => $request->input('facebook'),
                    'instagram' => $request->input('instagram'),
                    'linkedin' => $request->input('linkedin'),
                    'short_desc' => $request->input('shordesc'),
                    'theme_id' => $request->input('theme'),
                    'sub_heading' => $request->input('sub_heading'),
                    'working_hour_content' => $request->input('workinghour'),
                    'footer_content' => $request->input('footer'),
                ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->storeAs('doctordata/doctorprofile', $imageName, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'image_name' => $imageName,
                        'image_path' => 'doctordata/doctorprofile/' . $imageName,
                    ]);
            }
            if ($request->hasFile('bannerimage')) {
                $bannerImage = $request->file('bannerimage');
                $bannerImageName = time() . '.' . $bannerImage->extension();
                $bannerImage->storeAs('doctordata/banner', $bannerImageName, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'doctor_banner_name' => $bannerImageName,
                        'doctor_banner_path' => 'doctordata/banner/' . $bannerImageName,
                    ]);
            }
            if ($request->hasFile('logo')) {
                $logoimage = $request->file('logo');
                $logoimageName = time() . '.' . $logoimage->extension();
                $logoimage->storeAs('doctordata/logo/', $logoimageName, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'logo_name' => $logoimageName,
                        'logo_path' => 'doctordata/logo/' . $logoimageName,
                    ]);
            }
            if ($request->hasFile('bgimg')) {
                $bgimg = $request->file('bgimg');
                $bgimgname = time() . '.' . $bgimg->extension();
                $bgimg->storeAs('doctordata/bgbanner/', $bgimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'doctor_background_banner_name' => $bgimgname,
                        'doctor_background_banner_path' => 'doctordata/bgbanner/' . $bgimgname,
                    ]);
            }
            if ($request->hasFile('qrcode')) {
                $qrcodeimg = $request->file('qrcode');
                $qrcodeimgname = time() . '.' . $qrcodeimg->extension();
                $qrcodeimg->storeAs('doctordata/qrcode/', $qrcodeimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'qrcode_name' => $qrcodeimgname,
                        'qrcode_path' => 'doctordata/qrcode/' . $qrcodeimgname,
                    ]);
            }
            if ($request->hasFile('fevicon')) {
                $feviconimg = $request->file('fevicon');
                $feviconimgname = time() . '.' . $feviconimg->extension();
                $feviconimg->storeAs('doctordata/fevicon/', $feviconimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'fevicon_name' => $feviconimgname,
                        'fevicon_path' => 'doctordata/fevicon/' . $feviconimgname,
                    ]);
            }
            // DB::table('users')
            // ->where('id', $id)
            // ->update([
            //     'name' => $request->input('username')]);
            $notificationData = new Notification();
            $notificationData->user_id = auth()->user()->id;
            $notificationData->type = 'Doctor Profile Updated';
            $notificationData->message = 'Admin updated profile of ' . $data->doctor_name . ' in a doctor ';
            $notificationData->read = 0;
            $notificationData->save();
            return redirect()->back()->with('success', 'Profile updated successfully');


        } else {
            // Save image details to the database
            $imageData = new Doctor();
            $imageData->user_id = auth()->user()->id;
            $imageData->doctor_name = $request->input('fullName');
            $imageData->speciality_id = $request->input('speciality');
            $imageData->degree = $request->input('degree');
            $imageData->experience = $request->input('experience');
            $imageData->about = $request->input('about');
            $imageData->email = $request->input('email');
            $imageData->mobile = $request->input('phone');
            $imageData->twitter = $request->input('twitter');
            $imageData->facebook = $request->input('facebook');
            $imageData->instagram = $request->input('instagram');
            $imageData->linkedin = $request->input('linkedin');
            $imageData->short_desc = $request->input('shordesc');
            $imageData->theme_id = $request->input('theme');
            $imageData->working_hour_content = $request->input('sub_heading');
            $imageData->footer_content = $request->input('workinghour');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->storeAs('doctordata/doctorprofile', $imageName, 'public');

                $imageData->image_name = $imageName;
                $imageData->image_path = 'doctordata/doctorprofile' . $imageName;
            }

            if ($request->hasFile('bannerimage')) {
                $bannerImage = $request->file('bannerimage');
                $bannerimageName = time() . '.' . $bannerImage->extension();
                $bannerImage->storeAs('profile/assets/images/banner', $bannerimageName, 'public');

                $imageData->image_name = $bannerimageName;
                $imageData->image_path = 'profile/assets/images/banner/' . $bannerimageName;
            }
            if ($request->hasFile('logo')) {
                $bannerImage = $request->file('logo');
                $bannerImageName = time() . '.' . $bannerImage->extension();
                $bannerImage->storeAs('profile/assets/images/logo/', $bannerImageName, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'logo_name' => $bannerImageName,
                        'logo_path' => 'doctordata/logo/' . $bannerImageName,
                    ]);
            }
            if ($request->hasFile('bgimg')) {
                $bgimg = $request->file('bgimg');
                $bgimgname = time() . '.' . $bgimg->extension();
                $bgimg->storeAs('doctordata/bgbanner/', $bgimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'doctor_background_banner_name' => $bgimgname,
                        'doctor_background_banner_path' => 'doctordata/bgbanner/' . $bgimgname,
                    ]);
            }
            if ($request->hasFile('qrcode')) {
                $qrcodeimg = $request->file('qrcode');
                $qrcodeimgname = time() . '.' . $qrcodeimg->extension();
                $qrcodeimg->storeAs('doctordata/qrcode/', $qrcodeimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'qrcode_name' => $qrcodeimgname,
                        'qrcode_path' => 'doctordata/qrcode/' . $qrcodeimgname,
                    ]);
            }
            if ($request->hasFile('fevicon')) {
                $feviconimg = $request->file('fevicon');
                $feviconimgname = time() . '.' . $feviconimg->extension();
                $feviconimg->storeAs('doctordata/fevicon/', $feviconimgname, 'public');

                DB::table('doctors')
                    ->where('user_id', $id)
                    ->update([
                        'fevicon_name' => $feviconimgname,
                        'fevicon_path' => 'doctordata/fevicon/' . $feviconimgname,
                    ]);
            }

            $imageData->save();

            $notificationData = new Notification();
            $notificationData->user_id = auth()->user()->id;
            $notificationData->type = 'Doctor Profile Updated';
            $notificationData->message = 'Admin updated profile of ' . $data->doctor_name . ' in a doctor ';
            $notificationData->read = 0;
            $notificationData->save();
            return redirect()->back()->with('success', 'Doctor Profile Added successfully');


        }
    }

    public function markAsRead($id)
    {
        DB::table('notifications')
            ->where('id', $id)
            ->update(['read' => 1]);

        return redirect()->back();
    }
    public function AllMarkAsRead($id)
    {
        DB::table('notifications')
            ->where('user_id', $id)
            ->update(['read' => 1]);
        $now = Carbon::now();
        $twentyFourHoursAgo = $now->subHours(24);
        DB::table('notifications')->where('user_id', '=', $id)->where('created_at', '>=', $twentyFourHoursAgo)->delete();

        return redirect()->back();
    }
}