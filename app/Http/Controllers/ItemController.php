<?php
namespace App\Http\Controllers;

use Auth;
use App\Item;
use App\Company;
use App\Measureunit;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function add()
    {
        $measureunits = Measureunit::all();
        $companys = Auth::user()->companies;
        $item = new Item;
        return view('items.form', compact('measureunits', 'companys','item'));
    }

    public function details($item_id)
    {
        $measureunits = Measureunit::all();
        $companys = Auth::user()->companies;
        $item = Item::find($item_id);
        return view('items.form', compact('measureunits', 'companys','item'));
    }

    public function delete($item_id)
    {
        $item = Item::findOrFail($item_id);
        $item->enabled=0;
        $item->save();
        return redirect()->route('items.list')->with('success', 'Insumo eliminada correctamente');
    }

    public function process (Request $request)
    {        
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $item = Item::findOrFail($id);
            $item->update($request->all());
            return redirect()->route('items.list')->with('success', 'Insumo editado correctamente');
        }else{
            //Si no, Crea un Item
            Item::create($request->all());
            return redirect()->route('items.list')->with('success', 'Insumo Creado Correctamente');
        }
    }

    public function list()
    {   
        //Array de las Compañias del Usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $items = Item::where('enabled',1)->whereIn('company_id',$companies_id)->get();
        foreach ($items as $key => $item) {
            $item->measureunit;
        }
        return view('items.list', compact('items'));
    }
}
