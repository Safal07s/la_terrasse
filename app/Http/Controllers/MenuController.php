<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    
    public function index()
    {
        $menus = new Menu;
        $menus = $menus->all();
        return view('admin.menu.index', compact('menus'));
    }
    
    public function orderitems(){
        $menus=Menu::all();
        return view('backend.orderitems',compact('menus'));
    }

    

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'category' => 'required',
                'price' => 'required',
                'description' => 'required',
            ]
        );
        $menus= new Menu;
        $menus->name=$request->name;
        $menus->type=$request->type;
        $menus->category=$request->category;
        $menus->price=$request->price;
        $menus->description=$request->description;

        $menus->save();
        return redirect()->route('menu.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menus= new Menu;
        $menus= $menus->where('id',$id)->first();
        return view('admin.menu.edit',compact('menus'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $menus= new Menu;
        $menus=$menus->where('id',$id)->first();
        $menus->name=$request->name;
        $menus->type=$request->type;
        $menus->category=$request->category;
        $menus->price=$request->price;
        $menus->description=$request->description;

        $menus->update();
        return redirect()->route('menu.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menus=new Menu;
        $menus=$menus->where('id', $id)->first();
        $menus->delete();
        return redirect()->route('menu.index');

    }
}
