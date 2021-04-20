<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomainSaveRequest;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Domain;
use App\Models\Product;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $customers=Customer::all();
        $companies=Company::all();
        $domains=Domain::all();
        return view('back.homepage',compact('domains','products','customers','companies'));
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
    public function store(DomainSaveRequest $request)
    {
        Domain::create($request->post());
        return redirect()->route('domain.index')->withMessage('Domain Başarıyla Oluşturuldu!');
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
    public function update(DomainSaveRequest $request, $id)
    {
        $domain=Domain::find($id);
        $domain->update($request->post());
        return redirect()->route('domain.index')->withMessage('Domain Başarıyla Güncellendi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Domain::destroy($id);
        return redirect()->route('domain.index')->withError('Domain Başarıyla Silindi!');
    }
}
