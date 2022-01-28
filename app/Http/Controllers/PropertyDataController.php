<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchByRequest;
use App\Http\Resources\PropertyData\PropertyDataResource;
use App\Models\PropertyData;
use PhpParser\Builder\Property;

class PropertyDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => PropertyDataResource::collection(PropertyData::all())]);
    }

    public function searchBy(SearchByRequest $request)
    {
        if ($request->value == 'name')
           $propertyData = PropertyData::where('name', 'like', '%'.$request->text.'%')->get();

        if ($request->value == 'bedrooms')
            $propertyData = PropertyData::where('bedrooms', $request->int)->get();

        if ($request->value == 'bathrooms')
            $propertyData = PropertyData::where('bathrooms', $request->int)->get();

        if ($request->value == 'storeys')
            $propertyData = PropertyData::where('storeys', $request->int)->get();

        if ($request->value == 'garages')
            $propertyData = PropertyData::where('garages', $request->int)->get();

        if ($request->value == 'price')
            $propertyData = PropertyData::whereBetween('price', [$request->from, $request->to])->get();

       return PropertyDataResource::collection($propertyData);
    }
}
