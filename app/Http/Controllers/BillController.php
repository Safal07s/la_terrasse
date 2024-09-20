<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Items;  // Assuming you create a BillItem model
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class BillController extends Controller
{
    public function index(){

        $bill = Bill::all();
        return view('backend.bill',compact('bill'));
        }

//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ //
public function downloadReceipt($id)
    {
        $bill = Bill::findOrFail($id);

        // Initialize Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        // Load HTML content
        $html = view('backend.receipt', compact('bill'))->render();
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass)
        $dompdf->render();

        // Stream the PDF (or save it to a file if preferred)
        return $dompdf->stream("receipt-{$id}.pdf", array("Attachment" => 1));
    }
//$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ //



    public function store(Request $request)
    {
        // Validate the customer information
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'amount' => 'required|numeric',
            'payment_type' => 'required|string|max:50',
        ]);

        // Step 1: Create a new Bill record
        $bill = Bill::create([
            'customer_name' => $validatedData['customer_name'],
            'customer_phone' => $validatedData['customer_phone'],
            'total_amount' => $validatedData['amount'],
            'payment_type' => $validatedData['payment_type'],
        ]);

        // Step 2: Store each item in the `bill_items` table
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            Bill_Items::create([
                'bill_id' => $bill->id,
                'item_name' => $item['name'],
                'item_price' => $item['price'],
                'item_quantity' => $item['quantity'],
                'item_total' => $item['price'] * $item['quantity'],
            ]);
        }

        // Step 3: Clear the cart from session
        session()->forget('cart');

        // Step 4: Return with success message
        return redirect()->route('paybill')->with('success', 'Bill Paid Successfully');
    }
}
