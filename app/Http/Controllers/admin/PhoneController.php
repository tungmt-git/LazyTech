<?php

namespace App\Http\Controllers\Admin;

use App\Models\Phone;
use App\Models\Comp;
use App\Models\Cart;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin/phone.';
    public function index()
    {
        $data = Phone::query()->with(['comp'])->get();
        return view(self::PATH_VIEW.__FUNCTION__,compact('data'));
    }
    public function basic(){
        $data = Phone::query()->with(['comp'])->get();
        return view('client.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $comps = Comp::query()->pluck('name','id')->all();
        return view(self::PATH_VIEW.__FUNCTION__,compact('comps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhoneRequest $request)
    {
        if($request->hasFile('img')){
            $url = Storage::put('phone',$request->file('img'));
        }else{
            $url = '';
        }
        Phone::insert([
            'name'=>$request->name,
            'cost'=>$request->cost,
            'quantity'=>$request->quantity,
            'mota'=>$request->mota,
            'comp_id'=>$request->comp_id,
            'img'=>$url
        ]);
        return redirect()->route('phone.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {

        return view(self::PATH_VIEW.__FUNCTION__,compact('phone'));
    }
    public function detail(Phone $phone){
        $data = Comp::query()->get();
        $data1 = Phone::query()->where('comp_id',$phone->comp_id)->get();
        return view('client.detail',compact('phone','data','data1'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phone $phone)
    {
        $comps = Comp::query()->pluck('name','id')->all();
        return view(self::PATH_VIEW.__FUNCTION__,compact('phone','comps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
        if($request->hasFile('img')){
            $url = Storage::put('phone',$request->file('img'));
        }else{
            $url = '';
        }
        Phone::where('id',$phone->id)->update([
            'name'=>$request->name,
            'cost'=>$request->cost,
            'quantity'=>$request->quantity,
            'mota'=>$request->mota,
            'comp_id'=>$request->comp_id,
            'img'=>$url,
            'updated_at'=> Carbon::now()->format("Y-m-d H:i:s")
        ]);
        return redirect()->route('phone.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();
        return back();
    }

    public function addCart(Request $req ,$id){
        $product = Phone::query()->where('id',$id)->first();
        if($product != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            
            $req->session()->put('Cart',$newCart);
        }
        return view('client.cart');
    }
    public function DeleteItemCart(Request $req ,$id){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->DeleteItemCart($id);
            if(Count($newCart->products) > 0){
                $req->session()->put('Cart',$newCart);
            }else{
                $req->session()->forget('Cart');
            }
            return view('client.cart');
    }
    public function viewListCart(){
        $data = Comp::query()->get();
        return view('client.view',compact('data'));
    }
    public function deleteItemListCart(Request $req ,$id){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if(Count($newCart->products) > 0){
            $req->session()->put('Cart',$newCart);
        }else{
            $req->session()->forget('Cart');
        }
        return view('client.view-cart');
    }
    public function saveItemListCart(Request $req ,$id, $quanty){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->UpdateItemCart($id,$quanty);
        
        $req->Session()->put('Cart',$newCart);

        return view('client.view-cart');
    }
    public function checkOut(){
        $data = Comp::query()->get();
        return view('client.check-out',compact('data'));
    }
    public function EndcheckOut(){
        $data = Comp::query()->get();
        session()->forget('Cart');
        return view('client.thanhcong',compact('data'));
    }
}
