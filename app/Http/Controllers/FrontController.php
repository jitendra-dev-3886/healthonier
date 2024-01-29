<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Session;
use Razorpay\Api\Api;
use App\Models\Plan;
use App\Models\Doctor;
use App\Models\RazorpayOrder;
use App\Models\MembershipUser;
use Illuminate\Support\Str;
use App\Mail\DoctorAdded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    function index()
    {
        $data = User::with(['doctor.speciality'])
            ->where('status', 1)
            ->get();

        if (auth()->check()) {
            if (auth()->user()->type == 'super-admin') {
                return redirect()->route('super.admin.dashboard');
            } else if (auth()->user()->type == 'doctor') {
                return redirect()->route('doctor.dashboard');
            } else if (auth()->user()->type == 'patient') {
                return redirect()->route('patient.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            // return view('auth.login');
            return view('Healthonier.index');
        }




    }
    public function ClinicApp()
    {
        return view('Healthonier.clinic.index');

    }
    public function ClinicSignup()
    {
        $speciality = Speciality::where('status', 1)->get();
        $plans = Plan::all();
        //dd($membershipTypes);
        return view('Healthonier.signup.index', compact('speciality', 'plans'));

    }
    public function handleStep1(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [

            // 'first_name' => 'required|string|max:255',
            // 'last_name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:users,email',

        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        } else {
            $membershipTypeId = $request->input('selected_plan');
            $amount = $request->input('amount');

            // Create Razorpay Order
            $api = new Api('rzp_test_xgQxpWz8ZSR9Hd', 'A6miUp6kBZpPLUme90lDB8mQ');
            $order = $api->order->create([
                'receipt' => 'order_receipt',
                'amount' => $amount * 100,
                'currency' => 'INR',
            ]);
            $orderId = $order->id;

            // Create User
            $user = new User();
            $user->name = $request->input('fname') . ' ' . $request->input('lname');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->type = 1;
            $user->save();
            session(['user_id' => $user->id]);

            // Create Doctor
            $doctor = new Doctor();
            $doctor->user_id = $user->id;
            $doctor->available_status = 1;
            $doctor->speciality_id = $request->input('speciality');
            $doctor->doctor_name = $user->name;
            $doctor->slug = Str::slug($user->name);
            $doctor->save();

            // Update Doctor with Logo
            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $imageName = time() . '.' . $image->extension();
                $image->storeAs('doctordata/logo', $imageName, 'public');
                DB::table('doctors')
                    ->where('user_id', $user->id)
                    ->update([
                        'logo_name' => $imageName,
                        'logo_path' => 'doctordata/logo/' . $imageName,
                    ]);

            }

            // Create Razorpay Order Record
            $razorpayOrder = new RazorpayOrder();
            $razorpayOrder->user_id = $user->id;
            $razorpayOrder->order_id = $orderId;
            $razorpayOrder->amount = $amount;
            $razorpayOrder->status = 'pending';
            $razorpayOrder->save();

            $selectedPlan = Plan::find($membershipTypeId);
            if ($selectedPlan->monthly_price !== null && $selectedPlan->yearly_price !== null) {
                $billingInterval = ($amount == $selectedPlan->yearly_price) ? 'yearly' : 'monthly';
            } else {
                $billingInterval = 'monthly';
            }
            $membership = new MembershipUser();
            $membership->user_id = $user->id;
            $membership->plan_id = $membershipTypeId;
            $membership->expire_date = now()->addMonths(1);
            if ($billingInterval === 'yearly') {
                $membership->expire_date = now()->addYear();
            }
            $membership->save();

            // Send email to the user
            Mail::to($user->email)->send(new DoctorAdded($user->email, $request->input('password')));

            return response()->json(['success' => true, 'orderId' => $orderId]);

        }

    }
    public function handlePayment(Request $request)
    {
        $success = true;

        if ($success) {
            $userId = session('user_id');
            $membership = RazorpayOrder::where('user_id', $userId)->first();

            if ($membership) {
                $membership->update(['paid' => true]);
            }
        }

        return response()->json(['success' => $success]);
    }
    public function speciality()
    {
        return view('Healthonier.speciality.index');
    }
    public function demo()
    {
        return view('Healthonier.demo.index');

    }
    public function price()
    {
        return view('Healthonier.price.index');
    }
    public function contact()
    {
        return view('Healthonier.contact.index');
    }
    public function change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return redirect()->back();
    }
}