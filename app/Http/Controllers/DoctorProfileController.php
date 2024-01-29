<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Profile;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use App\Providers\NotificationService;
use Illuminate\Http\Request;
use App\Models\Notification;


class DoctorProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    function DoctorProfile()
    {
        
        $data = Doctor::join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
            ->join('images', 'specialities.theme_id', '=', 'images.id')
            ->select('doctors.*','images.id as themeid','images.thumb_path','images.image_path as themepath','images.theme_name','specialities.name')
            ->where('doctors.user_id',  auth()->user()->id)->first();
           
           
        $speciality = Speciality::where('status', 1)->get();
        return view('Doctor.profile.profile', compact('data', 'speciality'));
    }
    public function UpdateDoctorProfile(Request $request, $id)
    {
        


        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bannerimage' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bgimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'qrcode' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'fevicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
            NotificationService::createNotification(auth()->user()->id, 'Profile Updated', 'You have updated your profile details.');

    
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
            return redirect()->back()->with('success', 'Doctor Profile Added successfully');


        }
    }
}