<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Expenditure;
use App\Models\Category;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenditures=Expenditure::all();
        return view('create')->with(compact('expenditures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'total'=> 'required|numeric',
          'date'=> 'required|date',
          'location'=>'nullable', //exists istenilen sartlar saglanirsa ilgili kaydı listeler.
        //  'category_id'=>'required|numeric|exists:categories,id',

      ]);

        $expenditure = new Expenditure();
        $expenditure->total = $request->total;
        $expenditure->date = $request->date;
        $expenditure->location = $request->location;
      //  $expenditure->category_id = $request->category_id;


        $expenditure->save();


        //return redirect('welcome');
        return "basarılı";
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
