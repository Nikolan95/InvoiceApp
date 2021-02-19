<?php

namespace App\Http\Controllers;

use App\Item;
use App\Client;
use App\Invoice;
use Session;
use Validator;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DateTime;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //         'form' => 'required|date|after_or_equal:createInvoiceDate|before_or_equal:todayDate',
        //     ]);

        $invoice = Invoice::findOrFail($request->newInvoiceId);

        $dateObject = $request->form;

        $convertedDate = Carbon::createFromFormat('d-m-Y', $dateObject)->format('Y-m-d');
               
        $invoice->paid_at = $convertedDate;

        
        
        $firstDate = $request->createInvoiceDate;                        

        $secondDate = $convertedDate;


        
        $datetime1 = new DateTime($firstDate);
        
        $datetime2 = new DateTime($secondDate);
        
        $interval = $datetime1->diff($datetime2);

        $days = $interval->format('%a');

        $invoice->diff = $days;

        $invoice->save();

        Session::flash('success', 'Invoice payed');

        return redirect()->route('invoices.index');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        
        if ($item->delete()) {
            echo 'item deleted';
        }
    }
}
