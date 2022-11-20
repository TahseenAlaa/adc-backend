<?php

namespace App\Http\Controllers;

use App\Models\Providers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => Providers::with([
                'user:id,full_name',
                'updatedUser:id,full_name'
            ])
            ->get()
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
    public function store(Request $request) // TODO validate request
    {
        $newProvider = new Providers;
        $newProvider->title = $request->title;
        $newProvider->created_by = auth('sanctum')->user()->id;
        $newProvider->created_at = Carbon::now();
        $newProvider->save();

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
    public function update(Request $request)
    {
        Providers::where('id', '=', $request->id)->update([
            'title'      => $request->title,
            'updated_by' => auth('sanctum')->user()->id,
            'updated_at' => Carbon::now()
        ]);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Providers::where('id', '=', $request->id)->delete();

        return $this->index();
    }
}
