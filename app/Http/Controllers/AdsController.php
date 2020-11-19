<?php

namespace App\Http\Controllers;

use App\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ad::orderByDesc('created_at')->paginate(6);

        return view('ads.index')->with('ads', $ads);
    }

    public function show(Ad $ad)
    {
        return view('ads.show',compact('ad'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function edit(Ad $ad)
    {
        $this->authorize('edit', $ad);

        return view('ads.edit')->with('ad', $ad);
    }

    public function update(Ad $ad)
    {
        $this->authorize('edit', $ad);

        $ad->name = request()->name;
        $ad->save();

        return "ad updated";
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'start_date_time' => ['required'],
            'end_date_time' => ['required'],
            'address' => ['required'],
        ]);


        if ($request->file('image')) {
            $filePath = $request->file('image')->store('/public/ads');
            $attributes['image_path'] = $filePath;
        }

        $location = $this->getGeoCode($request->address);

        if ($location) {
            $attributes['latitude'] = $location->lat;
            $attributes['longitude'] = $location->lng;
        }

        $ad = auth()->user()->ads()->create($attributes);

        /* TODO add validation */
        if ($request->items) {
            foreach ($request->items as $item)
            $ad->addItem($item);
        }

        return redirect($ad->path());
    }

    public function destroy(Ad $ad)
    {
        $this->authorize('delete', $ad);

        $ad->delete();

        return "ad deleted";
    }

    private function getGeoCode($address)
    {
        $response = json_decode(\GoogleMaps::load('geocoding')
            ->setParam(['address' => $address])
            ->get());

        return $response->results[0]->geometry->location;
    }
}
