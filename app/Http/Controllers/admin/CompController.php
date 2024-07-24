<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comp;
use App\Models\Phone;
use App\Http\Requests\StoreCompRequest;
use App\Http\Requests\UpdateCompRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

class CompController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin/comp.';
    public function index()
    {
        $data = Comp::query()->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }
    public function listComp()
    {
        $data = Comp::query()->get();
        return view('layouts.cl',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW.__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompRequest $request)
    {
        if($request->hasFile('img')){
            $url = Storage::put('comp',$request->file('img'));
        }else{
            $url = '';
        }
        Comp::insert([
            'name'=>$request->name,
            'img'=>$url
        ]);
        return redirect()->route('comp.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comp $comp)
    {
        $id = $comp->id;
        $data = Phone::query()->where('comp_id',$id)->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data','comp'));
    }
    public function list(Comp $comp){
        $data = Phone::query()->where('comp_id',$comp->id)->get();
        return view('client.list',compact('data','comp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comp $comp)
    {
        return view(self::PATH_VIEW.__FUNCTION__,compact('comp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompRequest $request, Comp $comp)
    {
        if($request->hasFile('img')){
            $url = Storage::put('comp',$request->file('img'));
        }else{
            $url = '';
        }
        Comp::where('id',$comp->id)->update([
            'name'=>$request->name,
            'img'=>$url,
            'updated_at'=> Carbon::now()->format("Y-m-d H:i:s")
        ]);
        return redirect()->route('comp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comp $comp)
    {
        $comp->delete();
        return back();
    }
}
