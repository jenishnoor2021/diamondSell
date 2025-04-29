<?php

namespace App\Http\Controllers;

use App\Models\Diamond;
use App\Models\Party;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login(Request $req)
    {
        // return $req->input();
        $user = User::where(['username' => $req->username])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect()->back()->with('alert', 'Username or password is not matched');
            // return "Username or password is not matched";
        } else {
            Auth::loginUsingId($user->id);
            $req->session()->put('user', $user);
            return redirect('/admin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $totaldiamond = Diamond::count();
        $pendingdiamond = Diamond::where('status', 'Pending')->count();
        $donediamond = Diamond::where('status', 'Done')->count();

        $total = Diamond::sum('amount');
        $pending = Diamond::where('status', 'Pending')->sum('amount');
        $done = Diamond::where('status', 'Done')->sum('amount');

        $todaylists = Diamond::whereDate('due_date', $today)->where('status', 'Pending')->get();
        $tomorrowlists = Diamond::whereDate('due_date', $tomorrow)->where('status', 'Pending')->get();
        $outdatedlists = Diamond::whereDate('due_date', '<', $today)->where('status', 'Pending')->get();

        $todayCash = Diamond::where('payment_type', 'cash')->whereDate('payment_date', $today)->sum('amount');
        $todayOnline = Diamond::where('payment_type', 'online')->whereDate('payment_date', $today)->sum('amount');
        $todayCheck = Diamond::where('payment_type', 'check')->whereDate('payment_date', $today)->sum('amount');
        $todayTotal =  $todayCash + $todayOnline + $todayCheck;
        return view('admin.index', compact('totaldiamond', 'pendingdiamond', 'donediamond', 'todaylists', 'tomorrowlists', 'outdatedlists', 'total', 'pending', 'done', 'todayCash', 'todayOnline', 'todayCheck', 'todayTotal'));
    }

    public function profiledit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile.edit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        // $user = User::where('id',1)->first();
        // $user->password = Hash::make($request->new_password);
        // $user->save();
        // return redirect()->back()->with("success","Password changed successfully !");
        // return $request;
        $user = Session::get('user');
        if (!(Hash::check($request->get('current_password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Session::get('user');
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partyLists = Party::get();

        $partyId = $request->input('party_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $status = $request->input('status');
        $data = [];
        $partys = [];

        if ($partyId) {
            $data = Diamond::query();
            $partys = $partyLists;
            if ($partyId != 'All') {
                $data->where('parties_id', $partyId);
                $partys = Party::where('id', $partyId)->get();
            }
            if ($status) {
                $data->whereIn('status', $status);
            }
            if ($startDate) {
                $data->whereDate('created_at', '>=', $startDate); // Changed to '>=' for inclusivity
            }
            if ($endDate) {
                $data->whereDate('created_at', '<=', $endDate); // Changed to '<=' for inclusivity
            }

            // Execute the query and get the result as a collection
            $data = $data->get();
        }

        return view('admin.report.index', compact('partyLists', 'data', 'partys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {}
}
