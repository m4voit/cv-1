<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseRequest;
use App\Http\Resources\HouseResource;
use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct()
    {
    }

    public function index(HouseRequest $request)
    {
        $res = House::query()
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->name . '%');
            })
            ->when($request->price_from, function ($query) use ($request) {
                $query->where('price', '>=', $request->price_from);
            })
            ->when($request->price_to, function ($query) use ($request) {
                $query->where('price', '<', $request->price_to);
            })
            ->when($request->bedroom, function ($query) use ($request) {
                $query->where('bedroom', $request->bedroom);
            })
            ->when($request->bathroom, function ($query) use ($request) {
                $query->where('bathroom', $request->bathroom);
            })
            ->when($request->storey, function ($query) use ($request) {
                $query->where('storey', $request->storey);
            })
            ->when($request->garage, function ($query) use ($request) {
                $query->where('garage', $request->garage);
            });
        return HouseResource::collection($res->paginate($request->get('limit', 2), ['*'], 'page', $request->get('page', 1)));
    }
}
