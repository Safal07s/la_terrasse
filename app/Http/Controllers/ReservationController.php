<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\RedisJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use function Pest\Laravel\delete;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = new Reservation();
        $reservations = $reservations->all();
        // if (!Auth::user()) {
        //     return redirect('/user_login');
        // }
        return view('admin.reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reservation.create');
    }

  

    // public function store(Request $request)
    // {
    //     // Validate reservation form data
    //     $validated = $request->validate([
    //         'customer_name' => 'required|string|max:255',
    //         'phone' => 'required|string|max:15',
    //         'table_number' => 'required|integer',
    //         'reservation_time' => 'required|date_format:H:i|after_or_equal:10:00|before_or_equal:19:00',
    //         'reservation_date' => 'required|date', // Ensure reservation_date is required
    //         'head_count' => 'required|integer',
    //         'special_request' => 'nullable|string',
    //     ]);
    
    //     // Debug to check if reservation_date is properly passed
    //     // dd($validated);
    
    //     // Create new reservation
    //     try {
    //         $reservation = new Reservation;
    //         $reservation->customer_name = trim($request->customer_name);
    //         $reservation->phone = trim($request->phone);
    //         $reservation->table_number = $request->table_number;
    //         $reservation->reservation_time = $request->reservation_time;
    //         $reservation->reservation_date = $request->reservation_date; // Ensure this is set correctly
    //         $reservation->head_count = $request->head_count;
    //         $reservation->special_request = trim($request->special_request);
    
    //         // Save the reservation and handle response
    //         if ($reservation->save()) {
    //             return redirect()->route('reservation.index')->with('success', 'Your reservation has been made successfully!');
    //         } else {
    //             return redirect()->route('reservation.create')->with('error', 'Failed to save reservation. Please try again.');
    //         }
    //     } catch (\Exception $e) {
    //         // Log the error for debugging
    //         Log::error('Reservation Error: ' . $e->getMessage());
    
    //         return redirect()->route('reservation.index')->with('error', 'An error occurred while saving your reservation. Please try again.');
    //     }
    // }
    
    public function store(Request $request)
{
    // Validate reservation form data
    $validated = $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'table_number' => 'required|integer',
        'reservation_time' => 'required|date_format:H:i|after_or_equal:10:00|before_or_equal:19:00',
        'reservation_date' => 'required|date', // Ensure reservation_date is required
        'head_count' => 'required|integer',
        'special_request' => 'nullable|string',
    ]);

    // Ensure the user is logged in
    if (Auth::check()) {
        try {
            // Create new reservation and associate it with the logged-in user
            $reservation = new Reservation;
            $reservation->customer_name = trim($request->customer_name);
            $reservation->phone = trim($request->phone);
            $reservation->table_number = $request->table_number;
            $reservation->reservation_time = $request->reservation_time;
            $reservation->reservation_date = $request->reservation_date;
            $reservation->head_count = $request->head_count;
            $reservation->special_request = trim($request->special_request);
            $reservation->user_id = Auth::id(); // Associate the reservation with the logged-in user

            // Save the reservation and handle the response
            if ($reservation->save()) {
                return redirect()->route('reservation.index')->with('success', 'Your reservation has been made successfully!');
            } else {
                return redirect()->route('reservation.create')->with('error', 'Failed to save reservation. Please try again.');
            }
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Reservation Error: ' . $e->getMessage());

            return redirect()->route('reservation.index')->with('error', 'An error occurred while saving your reservation. Please try again.');
        }
    } else {
        // Redirect if the user is not logged in
        return redirect()->route('user_login')->with('error', 'You must be logged in to make a reservation.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservations = new Reservation;
        $reservations = $reservations->where('id', $id)->first();
        $reservations->delete();
        return redirect()->route('reservation.index');
    }
}
