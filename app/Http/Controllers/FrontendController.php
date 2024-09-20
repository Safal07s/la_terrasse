<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontendController extends Controller
{
    // Fetch menu items categorized into Main Dishes, Side Dishes, and Drinks
    public function menu()
    {
        $mainDishes = Menu::where('category', 'Main Dishes')->get();
        $sideDishes = Menu::where('category', 'Side Dishes')->get();
        $drinks = Menu::where('category', 'Drinks')->get();

        return view('frontend.index', compact('mainDishes', 'sideDishes', 'drinks'));
    }

    

    public function showReservations()
    {
        $reservations = new Reservation();
        // $reservations = $reservations->all();
        // Get the currently authenticated user
        $user = Auth::user();

        // Fetch reservations for the logged-in user
        $reservations = Reservation::where('user_id', $user->id)->get();

        Log::info($reservations);

        // Pass the reservations to the view
        return view('frontend.viewreservation', compact('reservations'));
    }


    public function index()
    {
        $reservations = new Reservation();
        $reservations = $reservations->all();
        // if (!Auth::user()) {
        //     return redirect('/user_login');
        // }
        return view('frontend.viewreservation', compact('reservations'));
    }

    public function reservation()
    {
        if (!Auth::check()) {
            return redirect('/user_login')->with('error', 'Please login to make a reservation.');
        }

        return view('frontend.reservation');
    }

    /**
     * Store a newly created reservation in storage.
     */
   


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
                    return redirect('/reservation')->with('success', 'Your reservation has been made successfully!');
                } else {
                    return view('frontend.reservation')->with('error', 'Failed to save reservation. Please try again.');
                }
            } catch (\Exception $e) {
                // Log the error for debugging
                Log::error('Reservation Error: ' . $e->getMessage());

                return view('frontend.reservation')->with('error', 'An error occurred while saving your reservation. Please try again.');
            }
        } else {
            // Redirect if the user is not logged in
            return redirect()->route('user_login')->with('error', 'You must be logged in to make a reservation.');
        }
    }
}
