<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StaffController;
//admin
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminClinicController;
use App\Http\Controllers\Admin\AdminRazorPayController;
use App\Http\Controllers\Admin\AdminTaxController;
use App\Http\Controllers\Admin\AdminFeeController;
use App\Http\Controllers\Admin\AdminFeeConcessionController;
use App\Http\Controllers\Admin\AdminFollowUpController;
use App\Http\Controllers\Admin\AdminPatientController;
use App\Http\Controllers\Admin\AdminBookingController;
//doctor

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\DoctorLandingPageController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorTestimonialController;
use App\Http\Controllers\DoctorNotificationController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeeConcessionController;
use App\Http\Controllers\DoctorFollowUpController;
use App\Http\Controllers\DoctorPatientController;
use App\Http\Controllers\ClinicBookingController;
//patient
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorPrescriptionController;



Route::get('/{themename}/{id}/booking', [DoctorLandingPageController::class, 'index'])->name('data');
Route::get('/', [FrontController::class, 'index'])->name('doctor.user.info');
Route::get('/clinic_app', [FrontController::class, 'ClinicApp'])->name('clinic.app');
Route::get('/clinic_signup', [FrontController::class, 'ClinicSignup'])->name('clinic.signup');

Route::post('/handleStep1', [FrontController::class, 'handleStep1'])->name('handleStep1');

Route::post('/handlePayment', [FrontController::class, 'handlePayment'])->name('handlePayment');
Route::get('/speciality', [FrontController::class, 'speciality'])->name('speciality');
Route::get('/demo', [FrontController::class, 'demo'])->name('demo');
Route::get('/price', [FrontController::class, 'price'])->name('price');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

Route::get('lang/change', [FrontController::class, 'change'])->name('changeLang');

Route::put('book-appoitment/{id}', [DoctorLandingPageController::class, 'BookAppoitment'])->name('book.appointment');
Route::get('/get-clinic', [DoctorLandingPageController::class, 'GetClinicData'])->name('get.clinic.data');
Route::get('/get-onlinedata', [DoctorLandingPageController::class, 'GetOnlineData'])->name('get.online.data');
Route::get('/clinic-booking', [DoctorLandingPageController::class, 'clinicBooking'])->name('clinic.booking');
Route::get('/clinic-unpaid', [DoctorLandingPageController::class, 'UnpaidBooking'])->name('unpaid.booking.view');


Route::post('update-booking', [DoctorLandingPageController::class, 'UpdateBooking'])->name('update.booking');
Route::post('/order-id', [DoctorLandingPageController::class, 'orderId'])->name('order.id');
Route::post('save-payment', [DoctorLandingPageController::class, 'SavePayment'])->name('save.payment');
Route::post('offline-payment', [DoctorLandingPageController::class, 'OfflinePayment'])->name('offline.payment');
Route::get('/invoice/{payment_id}', [DoctorLandingPageController::class, 'InvoiceDownload'])->name('invoice.download');
Route::get('/invoice-data/{payment_id}', [DoctorLandingPageController::class, 'InvoiceDownloadData'])->name('invoice.data.download');
Route::post('contact-form', [ContactController::class, 'ContactForm'])->name('contact.form');

Route::post('/processToken', [DoctorLandingPageController::class, 'processToken'])->name('track.token.show');

Auth::routes();

Route::middleware(['auth', 'user-access:doctor'])->group(function () {

    Route::get('/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
    Route::post('/update-appointment', [DoctorController::class, 'UpdateAppointment'])->name('update.appointment');
    Route::post('/booking-status/{token}', [DoctorController::class, 'changeStatus'])->name('booking.update');
    Route::post('/doctor-status', [DoctorController::class, 'DoctorStatusChange'])->name('doctor.status.change');
    Route::post('/update-serial-numbers', [DoctorController::class, 'updateSerialNumbers'])->name('doctor.serial.wise');
    Route::get('/change-password', [DoctorController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update-password', [DoctorController::class, 'UpdatePassword'])->name('update.password');



    // <-------------------- clinic --->
    Route::get('/add-clinic', [ClinicController::class, 'AddClinic'])->name('add.clinic');
    Route::post('/submit-clinic', [ClinicController::class, 'SubmitClinic'])->name('submit.clinic');
    Route::get('/list-clinic', [ClinicController::class, 'ListClinic'])->name('list.clinic');
    Route::get('/show-clinic', [ClinicController::class, 'ShowClinic'])->name('show.clinic');
    Route::get('edit-clinic/{clinic}/edit', [ClinicController::class, 'EditClinic'])->name('edit.clinic');
    Route::put('edit-clinic/{clinic}', [ClinicController::class, 'UpdateClinic'])->name('update.clinic');
    Route::post('/update-status-clinic', [ClinicController::class, 'UpdateStatusClinic'])->name('update.status.clinic');

    //slots


    // <-------------------- doctorprofile --->
    Route::get('/doctor-profile', [DoctorProfileController::class, 'DoctorProfile'])->name('doctor.doctorprofile');
    Route::put('update-profile/{id}', [DoctorProfileController::class, 'UpdateDoctorProfile'])->name('update.doctorprofile');

    Route::get('/list-testimonial', [DoctorTestimonialController::class, 'ListTestimonial'])->name('list.testimonial');
    Route::get('/show-testimonial', [DoctorTestimonialController::class, 'ShowTestimonial'])->name('show.testimonial');
    Route::get('/add-testimonial', [DoctorTestimonialController::class, 'AddTestimonial'])->name('add.testimonial');
    Route::post('/submit-testimonial', [DoctorTestimonialController::class, 'SubmitTestimonial'])->name('submit.testimonial');
    Route::get('edit-testimonial/{testimonial}/edit', [DoctorTestimonialController::class, 'EditTestimonial'])->name('edit.testimonial');
    Route::put('edit-testimonial/{testimonial}', [DoctorTestimonialController::class, 'UpdateTestimonial'])->name('update.testimonial');
    Route::post('/update-status-testimonial', [DoctorTestimonialController::class, 'UpdateStatusTestimonial'])->name('update.status.testimonial');
    Route::delete('/delete-testimonial/{testimonial}', [DoctorTestimonialController::class, 'TestimonialDelete'])->name('delete.testimonial');


    Route::get('notifications/{id}/mark-as-read', [DoctorNotificationController::class, 'markAsRead'])->name('doctor.notifications.markAsRead');
    Route::get('notifications-all/{id}/mark-as-read', [DoctorNotificationController::class, 'AllMarkAsRead'])->name('doctor.all.notifications.markAsRead');
    Route::get('notifications-all', [DoctorNotificationController::class, 'ListNotification'])->name('list.notifications');
    Route::get('/show-notification', [DoctorNotificationController::class, 'ShowNotification'])->name('show.notification');

    // Fee add

    Route::get('/add-fee', [FeeController::class, 'AddFee'])->name('add.fee');
    Route::post('/submit-fee', [FeeController::class, 'SubmitFee'])->name('submit.fee');
    Route::get('/list-fee', [FeeController::class, 'ListFee'])->name('list.fee');
    Route::get('/show-fee', [FeeController::class, 'ShowFee'])->name('show.fee');
    Route::delete('/delete-fee/{id}', [FeeController::class, 'DeleteFee'])->name('delete.fee');
    Route::get('edit-fee/{id}', [FeeController::class, 'EditFee'])->name('edit.fee');
    Route::put('edit-fee/{id}', [FeeController::class, 'UpdateFee'])->name('update.fee');
    Route::post('/update-status-fee', [FeeController::class, 'UpdateStatusfee'])->name('update.status.fee');
    Route::get('/check-fee-association/{id}', [FeeController::class, 'checkFeeAssociation']);

    // Fee Concession

    Route::get('/add-fee-concession', [FeeConcessionController::class, 'AddFeeConcession'])->name('add.fee.concession');
    Route::post('/submit-fee-concession', [FeeConcessionController::class, 'SubmitFeeConcession'])->name('submit.fee.concession');
    Route::get('/list-fee-concession', [FeeConcessionController::class, 'ListFeeConcession'])->name('list.fee.concession');
    Route::get('/show-fee-concession', [FeeConcessionController::class, 'ShowFeeConcession'])->name('show.fee.concession');
    Route::delete('/delete-fee-concession/{id}', [FeeConcessionController::class, 'DeleteFeeConcession'])->name('delete.fee.concession');
    Route::get('edit-fee-concession/{id}', [FeeConcessionController::class, 'EditFeeConcession'])->name('edit.fee.concession');
    Route::put('edit-fee-concession/{id}', [FeeConcessionController::class, 'UpdateFeeConcession'])->name('update.fee.concession');
    Route::get('/check-fee-concession-association/{id}', [FeeConcessionController::class, 'checkFeeConcessionAssociation']);

    //add tax
    Route::get('/add-tax', [TaxController::class, 'AddTax'])->name('add.tax');
    Route::Post('/submit-tax', [TaxController::class, 'SubmitTax'])->name('submit.tax');
    Route::get('/list-tax', [TaxController::class, 'ListTax'])->name('list.tax');
    Route::get('/show-tax', [TaxController::class, 'ShowTax'])->name('show.tax');
    Route::delete('/delete-tax/{id}', [TaxController::class, 'DeleteTax'])->name('delete.tax');
    Route::get('/edit-tax/{id}', [TaxController::class, 'EdittTax'])->name('edit.tax');
    Route::post('/update-status-tax', [TaxController::class, 'UpdateStatusTax'])->name('update.status.tax');
    Route::put('update-tax/{id}', [TaxController::class, 'UpdateTax'])->name('update.tax');
    Route::get('/check-tax-association/{id}', [TaxController::class, 'checkTaxAssociation']);



    //followup
    Route::get('/add-follow-up', [DoctorFollowUpController::class, 'AddFollowUp'])->name('add.followup');
    Route::Post('/submit-follow-up', [DoctorFollowUpController::class, 'SubmitFollowUp'])->name('submit.followup');
    Route::get('/list-follow-up', [DoctorFollowUpController::class, 'ListFollowUp'])->name('list.followup');
    Route::get('/show-follow-up', [DoctorFollowUpController::class, 'ShowFollowUp'])->name('show.followup');
    Route::delete('/delete-follow-up/{id}', [DoctorFollowUpController::class, 'DeleteFollowUp'])->name('delete.followup');
    Route::get('/edit-follow-up/{id}', [DoctorFollowUpController::class, 'EditFollowUp'])->name('edit.followup');
    Route::post('/update-status-follow-up', [DoctorFollowUpController::class, 'UpdateStatusFollowUp'])->name('update.status.followup');
    Route::put('update-follow-up/{id}', [DoctorFollowUpController::class, 'UpdateFollowUp'])->name('update.followup');

    Route::get('/doctor-add-patient', [DoctorPatientController::class, 'DoctorAddPatient'])->name('doctor.add.patient');
    Route::Post('/doctor-submit-patient', [DoctorPatientController::class, 'DoctorSubmitPatient'])->name('doctor.patient.submit');
    Route::get('/doctor-list-patient', [DoctorPatientController::class, 'DoctorPatientList'])->name('doctor.list.patient');
    Route::get('/doctor-edit-patient/{id}', [DoctorPatientController::class, 'DoctorEditPatient'])->name('doctor.edit.patient');
    Route::put('/doctor-update-patient/{id}', [DoctorPatientController::class, 'DoctorUpdatePatient'])->name('doctor.update.patient');
    Route::get('/doctor-show-patient', [DoctorPatientController::class, 'DoctorPatientShow'])->name('doctor.show.patient');
    Route::delete('/doctor-delete-patient/{id}', [DoctorPatientController::class, 'DoctorDeletePatient'])->name('doctor.delete.patient');
    Route::post('/doctor-status-update-patient', [DoctorPatientController::class, 'DoctorUpdateStatusPatient'])->name('doctor.status.update.patient');
    Route::get('/doctor-dashboard-patient/{id}', [DoctorPatientController::class, 'DoctorDashboardPatient'])->name('doctor.dashboard.patient');
    Route::get('/doctor-dashboard-patient-booking-history/{id}', [DoctorPatientController::class, 'DoctorDashboardPatientBookingHistory'])->name('doctor.dashboard.patient.booking.history');

    //pres
    Route::get('/doctor-patient-booking-prescription/{id}', [DoctorPatientController::class, 'DoctorPatientBookingPrescription'])->name('doctor.patient.booking.prescription');
    Route::post('/doctor-submit-prescription', [DoctorPrescriptionController::class, 'DoctorPrescriptionSubmit'])->name('doctor.prescription.submit');
    Route::get('/doctor-submit-prescription-edit/{id}', [DoctorPrescriptionController::class, 'DoctorPrescriptionEdit'])->name('doctor.prescription.edit');
    Route::put('/doctor-update-prescription/{id}', [DoctorPrescriptionController::class, 'DoctorPrescriptionUpdate'])->name('doctor.prescription.update');
    Route::get('/doctor-patient-booking-prescription-view/{id}', [DoctorPrescriptionController::class, 'DoctorPrescriptionView'])->name('doctor.patient.booking.prescription.view');



    Route::get('/doctor-list-clinic-booking', [ClinicBookingController::class, 'ListClinicBooking'])->name('doctor.list.clinic.booking');
    Route::get('/doctor-search-clinic-booking', [ClinicBookingController::class, 'SearchPatient'])->name('doctor.search.clinic.booking');
    Route::get('/doctor-get-clinic', [ClinicBookingController::class, 'getClinicData'])->name('doctor.get.clinic');
    Route::post('/doctor-patient-book-timeslot', [ClinicBookingController::class, 'DoctorPatientBooking'])->name('doctor.patient.book.timeslot');
    Route::get('/doctor-patient-book-invoice/{id}', [ClinicBookingController::class, 'DoctorPatientBookingInvoice'])->name('doctor.patient.book.invoice');
    Route::post('/doctor-confirm-booking/{id}', [ClinicBookingController::class, 'DoctorConfirmBooking'])->name('doctor.confirm.booking');
    Route::get('/show-doctor-confirm-booking', [ClinicBookingController::class, 'ShowClinicBooking'])->name('show.doctor.confirm.booking');
    Route::post('/payment-submit', [ClinicBookingController::class, 'paymentAppointment'])->name('payment.appointment');
    Route::get('/get_followup_data', [ClinicBookingController::class, 'getFollowupData'])->name('get.followup.data');
    Route::get('/confirm-booking-invoice-print/{id}', [ClinicBookingController::class, 'confirmBookingInvoice'])->name('confirm.booking.invoice.print');
    Route::get('/fee-collection-add/{id}', [ClinicBookingController::class, 'FeeCollectionEdit'])->name('fee.collection.edit');
    Route::get('/check-booking-limit', [ClinicBookingController::class, 'checkBookingLimit'])->name('check.booking.limit');
    Route::get('/track-token', [ClinicBookingController::class, 'TokenTrackingShow'])->name('doctor.track.token');

});

// Super Admin Routes

Route::middleware(['auth', 'user-access:super-admin'])->group(function () {

    Route::get('/super-admin/dashboard', [AdminController::class, 'superAdminDashboard'])->name('super.admin.dashboard');
    // <-------------------- doctor --->
    Route::get('/add-doctor', [AdminController::class, 'AddDoctor'])->name('add.doctor');
    Route::post('/submit-doctor', [AdminController::class, 'SubmitDoctor'])->name('submit.doctor');
    Route::get('/show-doctor', [AdminController::class, 'ShowDoctor'])->name('show.doctor');
    Route::get('/list-doctor', [AdminController::class, 'ListDoctor'])->name('list.doctor');
    Route::get('edit-doctor/{doctor}/edit', [AdminController::class, 'EditDoctor'])->name('edit.doctor');
    Route::put('edit-doctor/{doctor}', [AdminController::class, 'UpdateDoctor'])->name('update.doctor');
    Route::delete('/delete-doctor/{doctor}', [AdminController::class, 'DeleteDoctor'])->name('delete.doctor');
    Route::post('/update-status-doctor', [AdminController::class, 'UpdateStatusDoctor'])->name('update.status.doctor');
    // <-------------------- speciality  --->
    Route::get('/add-speciality', [SpecialityController::class, 'AddSpeciality'])->name('add.speciality');
    Route::post('/submit-speciality', [SpecialityController::class, 'SubmitSpeciality'])->name('submit.speciality');
    Route::get('/show-speciality', [SpecialityController::class, 'ShowSpeciality'])->name('show.speciality');
    Route::get('/list-speciality', [SpecialityController::class, 'ListSpeciality'])->name('list.speciality');
    Route::get('edit-speciality/{speciality}/edit', [SpecialityController::class, 'EditSpeciality'])->name('edit.speciality');
    Route::put('edit-speciality/{speciality}', [SpecialityController::class, 'UpdateSpeciality'])->name('update.speciality');
    Route::delete('/delete-speciality/{speciality}', [SpecialityController::class, 'DeleteSpeciality'])->name('delete.speciality');
    Route::post('/update-status-speciality', [SpecialityController::class, 'UpdateStatusSpeciality'])->name('update.status.speciality');
    Route::get('/edit-doctor-profile/{id}', [AdminController::class, 'EditDoctorProfile'])->name('admin.doctorprofile');
    Route::put('update-doctor-profile/{id}', [AdminController::class, 'UpdateDoctorProfile'])->name('admin.update.doctorprofile');


    // clinic add

    Route::get('/admin-add-clinic/{id}', [AdminClinicController::class, 'AddClinic'])->name('admin.add.clinic');
    Route::post('/admin-submit-clinic', [AdminClinicController::class, 'SubmitClinic'])->name('admin.submit.clinic');
    Route::get('/admin-list-clinic', [AdminClinicController::class, 'ListClinic'])->name('admin.list.clinic');
    Route::get('/admin-show-clinic', [AdminClinicController::class, 'ShowClinic'])->name('adminshow.clinic');
    Route::get('admin-edit-clinic/{clinic}/edit', [AdminClinicController::class, 'EditClinic'])->name('admin.edit.clinic');
    Route::put('admin-edit-clinic/{clinic}', [AdminClinicController::class, 'UpdateClinic'])->name('admin.update.clinic');

    //razorpay
    Route::get('/admin-add-doctor-razorpay', [AdminRazorPayController::class, 'ListRazorPay'])->name('admin.list.doctorrazorpay');
    Route::get('/admin-show-doctor-razorpay', [AdminRazorPayController::class, 'ShowRazorPay'])->name('admin.show.doctorrazorpay');
    Route::get('/admin-add-doctor-razorpay/{doctorid}', [AdminRazorPayController::class, 'AddRazorPay'])->name('admin.add.doctorrazorpay');
    Route::post('/admin-submit-doctor-razorpay', [AdminRazorPayController::class, 'SubmitRazorPay'])->name('admin.submit.doctorrazorpay');
    Route::get('/admin-edit-doctor-razorpay/{doctorid}', [AdminRazorPayController::class, 'EditRazorPay'])->name('admin.edit.doctorrazorpay');
    Route::post('/admin-update-doctor-razorpay', [AdminRazorPayController::class, 'UpdateRazorPay'])->name('admin.update.doctorrazorpay');
    //tax
    Route::get('/admin-doctor-tax-list', [AdminTaxController::class, 'DoctorTaxList'])->name('admin.doctor.tax.list');
    Route::get('/admin-doctor-tax-Show', [AdminTaxController::class, 'DoctorTaxShow'])->name('admin.doctor.tax.show');
    //fee
    Route::get('/admin-doctor-fee-list', [AdminFeeController::class, 'DoctorFeeList'])->name('admin.doctor.fee.list');
    Route::get('/admin-doctor-fee-Show', [AdminFeeController::class, 'DoctorFeeShow'])->name('admin.doctor.fee.show');
    //fee concession
    Route::get('/admin-doctor-fee-concession-list', [AdminFeeConcessionController::class, 'DoctorFeeConcessionList'])->name('admin.doctor.fee.concession.list');
    Route::get('/admin-doctor-fee-concession-Show', [AdminFeeConcessionController::class, 'DoctorFeeConcessionShow'])->name('admin.doctor.fee.concession.show');
    //follow up
    Route::get('/admin-doctor-follow-up-list', [AdminFollowUpController::class, 'DoctorFollowUpList'])->name('admin.doctor.follow.up.list');
    Route::get('/admin-doctor-follow-up-Show', [AdminFollowUpController::class, 'DoctorFollowUpShow'])->name('admin.doctor.follow.up.show');

    //patient
    Route::get('/admin-doctor-patient-list', [AdminPatientController::class, 'DoctorPatientList'])->name('admin.doctor.patient.list');
    Route::get('/admin-doctor-patient-Show', [AdminPatientController::class, 'DoctorPatientShow'])->name('admin.doctor.patient.show');
    //booking
    Route::get('/admin-doctor-booking-list', [AdminBookingController::class, 'DoctorBookingList'])->name('admin.doctor.booking.list');
    Route::get('/admin-doctor-booking-Show', [AdminBookingController::class, 'DoctorBookingShow'])->name('admin.doctor.booking.show');
    Route::get('/admin-doctor-booking-invoice/{id}', [AdminBookingController::class, 'DoctorBookingInvoice'])->name('admin.doctor.booking.invoice');
    Route::get('/admin-doctor-booking-prescription/{id}', [AdminBookingController::class, 'DoctorBookingPrescription'])->name('admin.doctor.booking.prescription');

});
Route::middleware(['auth', 'user-access:patient'])->group(function () {

    Route::get('/patient/dashboard', [PatientController::class, 'index'])->name('patient.dashboard');
    Route::get('/patient/meeting', [PatientController::class, 'PatientMeeting'])->name('patient.meeting');
    Route::get('/patient/show-meeting', [PatientController::class, 'ShowPatientMeeting'])->name('patient.show.meeting');
    Route::get('/patient/clinic-visit-invoice/{id}', [PatientController::class, 'ClinicVisitInvoice'])->name('patient.clinic.visit.invoice');
    Route::get('/patient/clinic-visit-prescription/{id}', [PatientController::class, 'ClinicVisitPrescription'])->name('patient.clinic.visit.prescription');
    Route::put('/patient/profile-update', [PatientController::class, 'PatientUpdateProfile'])->name('patient.update.profile');
    Route::get('/patient/profile-view', [PatientController::class, 'PatientProfileView'])->name('patient.profile.view');

    //notification
    Route::get('/patient/notifications/{id}/mark-as-read', [PatientController::class, 'markAsRead'])->name('patient.notifications.markAsRead');
    Route::get('patient/notifications-all/{id}/mark-as-read', [PatientController::class, 'AllMarkAsRead'])->name('patient.all.notifications.markAsRead');
    Route::get('/patient/notifications-all', [PatientController::class, 'ListNotification'])->name('patient.list.notifications');
    Route::get('/patient/show-notification', [PatientController::class, 'ShowNotification'])->name('patient.show.notification');
    Route::get('/patient-change-password', [PatientController::class, 'ChangePassword'])->name('patient.change.password');
    Route::post('/patient-update-password', [PatientController::class, 'UpdatePassword'])->name('patient.update.password');

});