<?php

namespace App\Domains\Customer\Http\Controllers;

use App\Domains\Customer\Http\Resources\WebsiteListResource;
use App\Domains\Customer\Models\Website;
use App\Domains\Customer\Http\Requests\WebsiteStoreRequest;
use App\Domains\Customer\Http\Resources\WebsiteDetailResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return WebsiteListResource::collection(Website::query()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WebsiteStoreRequest $request
     * @return WebsiteDetailResource
     */
    public function store(WebsiteStoreRequest $request)
    {
        $item = Website::create($request->all());
        return new WebsiteDetailResource($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  Website  $vulnerability
     * @return WebsiteDetailResource
     */
    public function show(Website $Vulnerability)
    {
        return new WebsiteDetailResource($Vulnerability);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WebsiteStoreRequest $request
     * @param Website $vulnerability
     *
     * @return WebsiteDetailResource
     */
    public function update(WebsiteStoreRequest $request, Website $Vulnerability)
    {
        $Vulnerability->title = $request->title;
        $Vulnerability->description = $request->description;
        $Vulnerability->update();
        return new WebsiteDetailResource($Vulnerability);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Website  $vulnerability
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Website $Vulnerability)
    {
        $Vulnerability->delete();
        return response()->json(['OK']);
    }
}
