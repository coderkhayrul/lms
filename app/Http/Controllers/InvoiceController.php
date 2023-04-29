<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function show($id)
    {
        $dbInvoice = Invoice::findOrFail($id);

        $customer = new Buyer([
            'name'          => $dbInvoice->user->name,
            'custom_fields' => [
                'email' => $dbInvoice->user->email,
            ],
        ]);
        $items=[];
        foreach ($dbInvoice->items as $item){
            $items[] = (new InvoiceItem())->title($item->name)->quantity($item->quantity)->pricePerUnit($item->price);
        }

        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($customer)
            ->addItems($items);

        return $invoice->stream();
    }
}
