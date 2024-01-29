<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use DataTables;
use Carbon\Carbon;
class DoctorNotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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
        return redirect()->back();
    }
    public function ListNotification()
    {
        return view('Doctor.Notification.list');
    }
    public function ShowNotification(Request $request)
    {

        if ($request->ajax()) {
            $item = Notification::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
            $counter = 1;

            return datatables::of($item)
            ->addColumn('serial', function () use (&$counter) {
                return $counter++;
            })
            ->addColumn('message', function ($item) {
                $readClass = $item->read ? 'read' : 'unread';
                $backgroundColor = $item->read ? 'white' : 'lightcoral';
        
                return '<div class="' . $readClass . '" style="background-color: ' . $backgroundColor . ';">' . $item->message . '</div>';
            })
            ->addColumn('action', function ($item) {
                return $item->read ? '':'<a href="' . route('doctor.notifications.markAsRead', $item->id) . '" class="mark-as-read" data-id="'.$item->id.'">Mark as Read</a>';
              
            })
        
                
                ->rawColumns(['serial','action','message'])
                ->make(true);



        }

        return view('Doctor.Notification.list');
    }
}