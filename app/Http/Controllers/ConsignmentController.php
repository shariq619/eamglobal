<?php

namespace App\Http\Controllers;

use App\Models\Consignment;
use Illuminate\Http\Request;

class ConsignmentController extends Controller
{
    public function index()
    {
        $consignments = Consignment::with('addresses')->paginate(5);
        return view('consignments.index',compact('consignments'));
    }

    public function addConsignment(Request $request)
    {
        dd($request->all());
    }
}
