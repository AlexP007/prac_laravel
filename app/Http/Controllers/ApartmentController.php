<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use Illuminate\Http\Response;
use Webmozart\Assert\Assert;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ApartmentRequest $request
     * @return Response
     */
    public function store(ApartmentRequest $request): Response
    {
        $apartment = new Apartment($request->all());
        $apartment->user_id = $request->user()->id;
        $apartment->save();
        return response([
            'data' => $apartment,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ApartmentRequest $request
     * @param Apartment $apartment
     * @return Response
     */
    public function update(ApartmentRequest $request, Apartment $apartment)
    {
        if ($request->user()->id !== $apartment->user_id) {
            return response([
                'errors' => ['user' => ['Not valid user']]
            ], 403);
        }
        $apartment->update($request->all());
        return response([
            'data' => $apartment,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Apartment $apartment
     * @return Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
