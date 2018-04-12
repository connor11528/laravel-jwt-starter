<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\CompanyResource;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CompanyResource::collection(Company::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::create([
           'name'            => $request->name,
           'description'     => $request->description,
           'website'         => $request->website,
           'year_founded'    => $request->year_founded,
           'address_line1'   => $request->address_line1,
           'address_line2'   => $request->address_line2,
           'address_city'    => $request->address_city,
           'address_state'   => $request->address_state,
           'address_country' => $request->address_country,
           'address_zip'     => $request->address_zip,
        ]);

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->update($request->only(['name', 'description']));
        return new CompanyResource($company);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(null, 204);
    }
}
