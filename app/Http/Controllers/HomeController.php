<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Invoice;
use App\Item;
use DB;
use DateTime;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $clients = Client::orderBy('id','desc')->get();
        $invoices = Invoice::orderBy('id','desc')->get();
        $unpaids = Invoice::orderBy('id','desc')->where('paid_at')->get();
        $items = Item::orderBy('id','desc')->get();

        $unpaiditems = DB::table('items')
            ->join('invoices','items.invoice_id','=','invoices.id')->where('paid_at')
            ->select('items.id','items.total')
            ->get();

        return view('home')
            ->with('clients', $clients)
            ->with('invoices', $invoices)
            ->with('unpaids', $unpaids)
            ->with('items', $items)
            ->with('unpaiditems',$unpaiditems);
    }
    public function account()
    {
        return view('account');
    }

    public function getAllMonths()
    {
        $monthArray = array();
        $invoiceDates = Invoice::orderBy('date','ASC')->whereYear('date', '>=', Carbon::now()->subDays(365))->pluck('date');
        $invoiceDates = json_decode($invoiceDates);

        if (! empty($invoiceDates)) {
            foreach ($invoiceDates as $unformatedDate) {
                $date = new \DateTime($unformatedDate);
                $monthNo = $date->format('m');
                $monthName = $date->format('M');
                $monthArray[$monthNo] = $monthName;
            }
        }
        return $monthArray;
    }

    public function getAllMonthsYear()
    {
        $monthArrays = array();
        $invoiceDates = Invoice::orderBy('date', 'ASC')->whereYear('date', '=', Carbon::now()->format('Y'))->pluck('date');
        $invoiceDates = json_decode($invoiceDates);

        if (! empty($invoiceDates)) {
            foreach ($invoiceDates as $unformatedDate) {
                $date = new \DateTime($unformatedDate);
                $monthNo = $date->format('m');
                $monthName = $date->format('M');
                $monthArrays[$monthNo] = $monthName;
            }
        }
        return $monthArrays;
    }

    public function getMonthlyInvoiceCount($month)
    {
        $monthlyInvoiceCount = Invoice::whereMonth('date', $month)->whereYear('date', '>=', Carbon::now()->subDays(365))->where('paid_at')->get()->count();
        return $monthlyInvoiceCount;
    }

    public function getMonthlyPaidInvoiceCount($month)
    {
         $monthlyPaidInvoiceCount = Invoice::whereMonth('date', $month)->whereYear('date', '>=', Carbon::now()->subDays(365))->whereNotNull('paid_at')->get()->count();
          return $monthlyPaidInvoiceCount;
    }
    
    public function getThisYearMonthlyInvoiceCount($month)
    {
        $monthlyInvoiceCountThisYear = Invoice::whereMonth('date', $month)->whereYear('date', '=', Carbon::now()->format('Y'))->where('paid_at')->get()->count();
        return $monthlyInvoiceCountThisYear;
    }

    public function getThisYearMonthlyPaidInvoiceCount($month)
    {
        $monthlyPaidInvoiceCountThisYear = Invoice::whereMonth('date', $month)->whereYear('date', '=', Carbon::now()->format('Y'))->whereNotNull('paid_at')->get()->count();
        return $monthlyPaidInvoiceCountThisYear;
    }

    public function getMonthlyInvoiceData()
    {
        $monthlyInvoiceCountArray = array();
        $monthlyPaidInvoiceCountArray = array();
        $monthlyInvoiceCountThisYearArray = array();
        $monthlyPaidInvoiceCountThisYearArray = array();
        $monthArray = $this->getAllMonths();
        $monthName_array = array();
        if (! empty($monthArray)) {
            foreach ($monthArray as $monthNo => $monthName) {
                $monthlyInvoiceCount = $this->getMonthlyInvoiceCount($monthNo);
                $monthlyPaidInvoiceCount = $this->getMonthlyPaidInvoiceCount($monthNo);
                array_push($monthlyInvoiceCountArray, $monthlyInvoiceCount);
                array_push($monthlyPaidInvoiceCountArray, $monthlyPaidInvoiceCount);
                array_push($monthName_array, $monthName);
            }
        }
        $monthArrays = $this->getAllMonthsYear();
        $monthName_year_array = array();
        if (! empty($monthArrays)) {
            foreach ($monthArrays as $monthNo => $monthName) {
                $monthlyInvoiceCountThisYear = $this->getThisYearMonthlyInvoiceCount($monthNo);
                $monthlyPaidInvoiceCountThisYear = $this->getThisYearMonthlyPaidInvoiceCount($monthNo);
                array_push($monthlyInvoiceCountThisYearArray, $monthlyInvoiceCountThisYear);
                array_push($monthlyPaidInvoiceCountThisYearArray, $monthlyPaidInvoiceCountThisYear);
                array_push($monthName_year_array, $monthName);
            }
        }
        
        $monthlyInvoiceDataArray = array(
            'months' => $monthName_array,
            'this_year_months' => $monthName_year_array,
            'invoice_count_data' => $monthlyInvoiceCountArray,
            'paid_invoice_count_data' => $monthlyPaidInvoiceCountArray,
            'this_year_invoice_count_data' => $monthlyInvoiceCountThisYearArray,
            'this_year_paid_invoice_count_data' => $monthlyPaidInvoiceCountThisYearArray,
        );

        return $monthlyInvoiceDataArray;
    }
}
