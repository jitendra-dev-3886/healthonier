<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\User;
use App\Models\Testimonial;
use App\Models\Clinic;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer([
            'Profile.Childcare.index',
            'Profile.Dentiest.index',
            'Profile.Eyecare.index',
            'Profile.Physiotherapis.index',
            'Profile.Cardio.index',
            'Profile.Pediatrics.index',
            'Profile.Chiroprator.index',
            'Profile.Maternity.index',
            'Profile.Ent.index',
            'Profile.Massage.index',
            'Profile.Mental.index',
        ], function ($view) {
            $data = User::join('doctors', 'users.id', '=', 'doctors.user_id')
                ->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                ->select('doctors.*', 'specialities.name')
                ->where('users.id', $view->getData()['id'])
                ->where('users.status', 1)
                ->first();

            $test = Testimonial::where('doctor_id', $data->id)
                ->where('status', 1)
                ->get();

            // $clinic = Clinic::join('clinicavailabilities', 'clinics.id', '=', 'clinicavailabilities.clinic_id')
            //     ->join('doctors', 'clinics.doctor_id', '=', 'doctors.id')
            //     ->join('users', 'doctors.user_id', '=', 'users.id')
            //     ->select('users.name as doctor', 'clinicavailabilities.weekday_id', 'clinicavailabilities.timeslot_id', 'clinics.*')
            //     ->where('clinics.doctor_id', '=', $data->id)
            //     ->where('clinics.status', 1)
            //     ->get();
            $clinic = Clinic::where('doctor_id', $data->id)->with(['availabilities', 'doctor.user'])->get();
          
            $recaptchaSiteKey = '6Lem0dMnAAAAALHzaKrIhEG6kKbRmoR3U3YxoUUq';

            $view->with(compact('data', 'test', 'clinic', 'recaptchaSiteKey'));
        });
    }
}