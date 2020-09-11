<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Item;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('items.index')->with('items', $items);
    }

    public function update(Item $item)
    {
        $item->update(request()->all());

        return "ad item updated";
    }

    public function store(Ad $ad)
    {
        $ad->addItem(request()->item);

        return "item added to ad!";
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return "ad item deleted";
    }
}
