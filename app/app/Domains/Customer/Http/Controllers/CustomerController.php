<?php

namespace App\Domains\Customer\Http\Controllers;

use App\Domains\Customer\Http\Requests\CustomerStoreRequest;
use App\Domains\Customer\Http\Resources\CustomerDetailResource;
use App\Domains\Customer\Http\Resources\CustomerListResource;
use App\Domains\Customer\Models\Customer;
use App\Domains\Customer\Models\Website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return CustomerListResource::collection(Website::query()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CustomerStoreRequest $request
     * @return CustomerDetailResource
     */
    public function store(CustomerStoreRequest $request)
    {
        $item = Customer::create($request->all());
        return new CustomerDetailResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return CustomerDetailResource
     */
    public function show(Customer $customer)
    {
        return new CustomerDetailResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CustomerStoreRequest $request
     * @param Customer $customer
     *
     * @return CustomerDetailResource
     */
    public function update(CustomerStoreRequest $request, Customer $customer)
    {
       $customer->firstName =$request->firstName;
       $customer->lastName =$request->lastName;
       $customer->phone =$request->phone;
       $customer->email =$request->email;
       $customer->desiredBudget =$request->desiredBudget;
       $customer->message =$request->message;

        $customer->update();
        return new CustomerDetailResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json(['OK']);
    }
}
