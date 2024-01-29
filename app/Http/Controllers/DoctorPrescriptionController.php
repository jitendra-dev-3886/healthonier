<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\PrescribedTest;
use App\Models\Booking;
use DB;

class DoctorPrescriptionController extends Controller
{


    public function DoctorPrescriptionSubmit(Request $request)
    {
        // dd($request->all());
        // Start a database transaction
        DB::beginTransaction();

        try {

            // Validate the request data if needed
            // ...
            // $request->validate([
            //     'diagnostic_summary' => 'required',
            //     'medicine.*' => 'required',
            //     'composition.*' => 'required',
            //     'time.*' => 'required',
            //     'timing.*' => 'required',
            //     'remark.*' => 'required',
            //     'test.*' => 'required',
            // ]);
            // Create a new prescription
            $prescription = new Prescription();
            $prescription->booking_id = $request->input('bookingid');
            $prescription->next_booking_date = $request->input('date');
            $prescription->diagnostic_summary = $request->input('diagnostic_summary');
            $prescription->save();

            // Save medicines, compositions, morning, afternoon, evening, doses, and remarks
            $medicines = $request->input('medicine');
            $compositions = $request->input('composition');
            $mornings = $request->input('morning');
            $afternoons = $request->input('afternoon');
            $evenings = $request->input('evening');
            $doses = $request->input('dose');
            $remarks = $request->input('remark');
            $tests = $request->input('test');
            $timing = $request->input('timing');

            if ($prescription->id) {
                // Prepare an array for medicines
                $medicinesData = [];
                foreach ($medicines as $key => $medicine) {
                    $medicinesData[] = [
                        'prescription_id' => $prescription->id,
                        'medicine_name' => $medicine,
                        'timing' => $timing[$key],
                        'composition' => $compositions[$key],
                        'morning' => isset($mornings[$key]) ? 1 : 0,
                        'afternoon' => isset($afternoons[$key]) ? 1 : 0,
                        'evening' => isset($evenings[$key]) ? 1 : 0,
                        'dose_repetition' => $doses[$key],
                        'remark' => $remarks[$key],
                    ];
                }

                // Insert medicines into the database
                Medicine::insert($medicinesData);

                // Prepare an array for prescribed tests
                $testsData = [];
                foreach ($tests as $test) {
                    $testsData[] = [
                        'prescription_id' => $prescription->id,
                        'test_name' => $test,
                    ];
                }

                // Insert prescribed tests into the database
                PrescribedTest::insert($testsData);
            }

            // If everything is successful, commit the transaction
            DB::commit();

            return redirect()->route('doctor.list.clinic.booking')->with('success', 'Prescription saved successfully!');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();

            // Handle the exception (e.g., log it, return an error message)
            return back()->with('error', 'An error occurred while saving the prescription.');
        }
    }

    public function DoctorPrescriptionEdit(Request $request, $id)
    {
        $prescription = Prescription::where('booking_id', $id)->with('medicines', 'prescribedTests')->first();
        // dd($prescription);
        return view('Doctor.Bookings.editprescription', compact('prescription'));

    }


    public function DoctorPrescriptionUpdate(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            // Uncomment and customize validation rules as needed
            // $request->validate([
            //     'diagnostic_summary' => 'required',
            //     'medicine.*' => 'required',
            //     'composition.*' => 'required',
            //     'time.*' => 'required',
            //     'timing.*' => 'required',
            //     'dose.*' => 'required',
            //     'remark.*' => 'required',
            //     'test.*' => 'required',
            // ]);

            $prescription = Prescription::findOrFail($id);

            // Delete old data
            $prescription->medicines()->delete();
            $prescription->prescribedTests()->delete();

            // Save new diagnostic summary
            $prescription->diagnostic_summary = $request->input('diagnostic_summary');
            $prescription->save();

            // Save medicines, compositions, times, timings, doses, and remarks
            $medicines = $request->input('medicine');
            $compositions = $request->input('composition');
            $mornings = $request->input('morning');
            $afternoons = $request->input('afternoon');
            $evenings = $request->input('evening');
            $timings = $request->input('timing');
            $doses = $request->input('dose');
            $remarks = $request->input('remark');
            $tests = $request->input('test');
            $times = $request->input('time');
            if ($prescription->id) {
                // Prepare an array for medicines
                $medicinesData = [];
                foreach ($medicines as $key => $medicine) {
                    $medicinesData[] = [
                        'prescription_id' => $prescription->id,
                        'medicine_name' => $medicine,
                        'composition' => $compositions[$key],
                        'morning' => isset($mornings[$key]) ? 1 : 0,
                        'afternoon' => isset($afternoons[$key]) ? 1 : 0,
                        'evening' => isset($evenings[$key]) ? 1 : 0,
                        'timing' => $timings[$key],
                        'dose_repetition' => $doses[$key],
                        'remark' => $remarks[$key],
                    ];
                }

                // Insert medicines into the database
                Medicine::insert($medicinesData);

                // Prepare an array for prescribed tests
                $testsData = [];
                foreach ($tests as $test) {
                    $testsData[] = [
                        'prescription_id' => $prescription->id,
                        'test_name' => $test,
                    ];
                }

                // Insert prescribed tests into the database
                PrescribedTest::insert($testsData);
            }

            // If everything is successful, commit the transaction
            DB::commit();

            return redirect()->route('doctor.list.clinic.booking')->with('success', 'Prescription updated successfully!');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollback();

            // Handle the exception (e.g., log it, return an error message)
            return back()->with('error', 'An error occurred while updating the prescription.');
        }
    }
    public function DoctorPrescriptionView(Request $request, $id)
    {
        $booking = Booking::where('id', $id)->with(['clinic', 'patient.user', 'payment', 'patient.feeConcessions'])
            ->first();
        $prescription = Prescription::where('booking_id', $id)->with('medicines', 'prescribedTests')->first();
        return view('Doctor.Bookings.viewprescription', compact('booking', 'prescription'));
    }

}