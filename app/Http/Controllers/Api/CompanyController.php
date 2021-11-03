<?php

namespace App\Http\Controllers\Api;
   use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Http\Resources\Company as CompanyResource;
use App\Models\Company;
use Validator;
use App\Http\Controllers\Controller;

class CompanyController extends BaseController
{
    //Company CRUD Actions 
    public function index()
    {
         // paginate the authorized user's Company with 5 per page
         $company = Auth::user()
         ->company()
         ->orderBy('status')
         ->orderByDesc('created_at')
         ->paginate(10);

     // return Company index view with paginated Company
    //  return view('Company', [
    //      'Company' => $Company
    //  ]);
        $company = Company::all();
        return $this->handleResponse(CompanyResource::collection($company), 'Company have been retrieved!');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'company_name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'logo' => 'required'
         
        ]);
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $companys = Auth::user();
        $company = Company::create($input);
        return $this->handleResponse(new CompanyResource($companys), 'Company created!');
    }

   
    public function show($id)
    {
        $company = Company::find($id);
        if (is_null($company)) {
            return $this->handleError('Company not found!');
        }
        return $this->handleResponse(new CompanyResource($company), 'Company retrieved.');
    }
    

    public function update(Request $request, Company $company)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'company_name' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'logo' => 'required'
        ]);

        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
        $company->company_name = $input['company_name'];
        $company->email = $input['email'];
        $company->phoneNumber = $input['phoneNumber'];
        $company->logo = $input['logo'];
        $company->save();
        
        return $this->handleResponse(new CompanyResource($company), 'Company successfully updated!');
    }
   
    public function destroy(Company $company)
    {
        $company->delete();
        return $this->handleResponse([], 'Company deleted!');
    }
}
