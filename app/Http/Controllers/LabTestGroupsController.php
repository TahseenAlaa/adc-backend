<?php

namespace App\Http\Controllers;

use App\Models\TestGroups;
use Illuminate\Http\Request;

class LabTestGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testGroupsList = TestGroups::with('user:id,full_name')->get();

        return response([
            'data' => $testGroupsList
        ]);
    }

    public function indexGroupNames() {
        $groupNames = TestGroups::select('id', 'test_group')->get();

        return response([
            'data' => $groupNames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newTest = new TestGroups;
        $newTest->test_group          = $request->test_group;
        $newTest->test_name           = $request->test_name;
        $newTest->min_range           = $request->min_range;
        $newTest->max_range           = $request->max_range;
        $newTest->measurement_unit    = $request->unit;
        $newTest->gender              = $request->gender;
        $newTest->created_by          = auth('sanctum')->user()->id;
        $newTest->save();

        return $this->index();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TestGroups::where('id', '=', $id)->delete();

        return $this->index();

//        return response([
//            'data' => 'Done!'
//        ]);
    }
}