<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\ItemType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function index() {
        $item_cond = ItemCondition::get();
        $item_type = ItemType::get();
        return view('form', [
            'type' => $item_type,
            'condition' => $item_cond
        ]);
    }

    public function submit(Request $request) {
        $validator = Validator::make($request->all(), [
            'itemname' => ['required', 'ascii'],
            'description' => ['required', 'ascii'],
            'amount' => ['required', 'integer'],
            'itemtype' => ['required', 'exists:item_types,name'],
            'itemcondition' => ['required', 'exists:item_conditions,name'],
            'picture' => ['required','file','image','mimes:png,jpg,jpeg','max:2048']
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();
        $image = $request->file('picture')->store('public/images');


        $item = new Item;
        $item->name = $validated['itemname'];
        $item->description = $validated['description'];
        $item->amount = $validated['amount'];
        $item->image = $image;
        $item->item_type_id = ItemType::where('name', $validated['itemtype'])->first()->id;
        $item->item_condition_id = ItemCondition::where('name', $validated['itemcondition'])->first()->id;
        $item->save();


        return route('dashboard');
    }
    
}
