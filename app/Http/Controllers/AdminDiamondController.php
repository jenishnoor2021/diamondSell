<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\Party;
use App\Models\Diamond;
use App\Models\Plane;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AdminDiamondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diamonds = Diamond::orderBy('id', 'DESC')->get();
        return view('admin.diamond.index', compact('diamonds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partys = Party::where('is_active', 1)->orderBy('id', 'DESC')->get();
        $planes = Plane::where('is_active', 1)->orderBy('id', 'DESC')->get();
        return view('admin.diamond.create', compact('partys', 'planes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parties_id' => 'required',
            'planes_id' => 'required',
            'dimond_name' => ['required', 'string', 'max:255', 'unique:diamonds'],
            'weight' => 'required',
            // 'shape' => 'required',
            'mobile' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($validator);
        }

        $request['status'] = 'Pending';

        Diamond::create($request->all());

        return redirect('admin/diamond')->with('success', "Add Record Successfully");
    }

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
    public function edit($id)
    {
        $diamond = Diamond::findOrFail($id);
        $partys = Party::where('is_active', 1)->orderBy('id', 'DESC')->get();
        $planes = Plane::where('is_active', 1)->orderBy('id', 'DESC')->get();
        return view('admin.diamond.edit', compact('diamond', 'partys', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $diamond = Diamond::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'parties_id' => 'required',
            'planes_id' => 'required',
            'dimond_name' => ['required', 'string', 'max:255', Rule::unique('diamonds')->ignore($diamond->id)],
            'weight' => 'required',
            // 'shape' => 'required',
            'mobile' => 'required',
            'amount' => 'required',
            'due_date' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput($request->all())->withErrors($validator);
        }

        $input = $request->all();
        $diamond->update($input);
        return redirect('admin/diamond')->with('success', "Update Record Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diamond = Diamond::findOrFail($id);
        $diamond->delete();
        return Redirect::back()->with('success', "Delete Record Successfully");
    }
}
