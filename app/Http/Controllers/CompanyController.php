<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySaveRequest;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $companies=Company::all();
        return view('back.company.index',compact('companies'));
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
    public function store(CompanySaveRequest $request)
    {
        Company::create($request->post());
        return redirect()->route('company.index')->withMessage('Şirket Başarıyla Oluşturuldu!');

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
    public function update(CompanySaveRequest $request, $id)
    {
        $company=Company::find($id);
        $company->update($request->post());
        return redirect()->route('company.index')->withMessage('Firma başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'çalıştı';

        //$a=Customer::destroy($id);
        //dd($a);
        //return redirect()->route('company.index')->withError('Kayıt Başarıyla Silindi!');
    }
}
