<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Client;
use App\Item;
use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use App\Rules\ValidName;
use Carbon\Carbon;
use Datetime;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type = null)
    {
        if ($type == 'unpaid') {
            $invoices = Invoice::with(['items','client'])->whereNull('paid_at')->get();
            return view('invoices.unpaid')->with('invoices', $invoices);
        }
        else if ($type == 'paid') {
            $invoices = Invoice::with(['items','client'])->whereNotNull('paid_at')->get();
            return view('invoices.paid')->with('invoices', $invoices);
        }
        else {
            $invoices = Invoice::with(['items','client'])->get();
            return view('invoices.index')->with('invoices', $invoices);
        }
    }
    /**
     * Show the form for creating a new resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderBy('id','desc')->get();

        return view('invoices.create')->with('clients', $clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
              'name' => ['required', new ValidName],
              'issuedAt' => 'required',
              'items.*.desc' => 'required',
              'items.*.amount' => 'required',
              'items.*.price' => 'required',
        ]);
       
        $invoice = new Invoice;
        $item = new Item;
        $date = date('-Y');
        $invoiceDate = $request->issuedAt;
        $dateObject = Carbon::createFromFormat('d-m-Y', $invoiceDate);
        
        $invoice->name = $request->name.$date;
        $invoice->client_id = $request->clientId;
        $invoice->date = $dateObject;
        $invoice->avans = $request->avans;

        if ($invoice->save()) {
            $id = $invoice->id;
            foreach ($request->items as $item) {
                $data = [
                   'invoice_id' => $id,
                   'desc' => $item['desc'],
                   'amount' => $item['amount'],
                   'price' => $item['price'],
                   'total' => $item['amount']*$item['price']
                ];
              Item::insert($data);
            }
        }

        Session::flash('success', 'New invoice has been created succesfuly');
        return redirect()->route('invoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.view')->with('invoice', $invoice);
    }

    public function getInvoiceItems($id)
    {
        return Invoice::join('items','invoices.id', '=', 'items.invoice_id')
            ->where('invoices.id', $id)
            ->get();
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.edit')->with('invoice', $invoice);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
              'name' => 'required|max:255',
              'items.*.desc' => 'required|max:255',
              'items.*.amount' => 'required|max:255',
              'items.*.price' => 'required|max:255',
        ]);
        
        $invoice = Invoice::find($id);
        $item = new Item;
       
        $invoice->name = $request->name;
        $invoice->client_id = $request->client_id;

        if ($invoice->save()) {
            $id = $invoice->id;
            foreach ($request->items as $item) {
                $data = [
                    'invoice_id' => $id,
                    'desc' => $item['desc'],
                    'amount' => $item['amount'],
                    'price' => $item['price'],
                    'total' => $item['amount']*$item['price']
                ];
                if ($item['id']) {
                    DB::table('items')->where('id', $item['id'])->update($data);
                } 
                else {
                    Item::insert($data);
                }
            }
        }
        
        Session::flash('success', 'Invoice #' .$id. ' has been updated');
        return redirect()->route('invoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice = Invoice::findOrFail($request->deleteInvoice);
        $invoice->delete();
        
        Session::flash('success','Invoice has been deleted');
        return back();
    }
}
