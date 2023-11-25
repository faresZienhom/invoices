<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Invoices_Attachment;
use App\Models\Invoices_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $invoices = Invoices::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = Invoices_Attachment::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request $request)
    {
        $invoices = Invoices_Attachment::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();

    }

    public function get_file($invoice_number,$file_name)
    {
    $st="Attachments";
    $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
    return response()->download($pathToFile);
    }
    public function open_file($invoice_number,$file_name)
    {
    $st="Attachments";
    $pathToFile = public_path($st.'/'.$invoice_number.'/'.$file_name);
    return response()->file($pathToFile);
    }



    }



