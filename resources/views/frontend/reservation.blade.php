<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Customer Reservation</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: rgb(37, 42, 52);
            display: flex;
            color: white;
            justify-content: center;
            /* Center the container horizontally */
            align-items: center;
            /* Center the container vertically */
            height: 100vh;
            /* Ensure the container takes up the full viewport height */
        }

        .reserve-container {
            max-width: 36.4em;
            height: 100vh;
        }

        .column {
            padding: 10px;
            text-align: left;
            width: 36.4em;
            flex-basis: 50%;
            /* Adjust the width of the columns as needed */
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="reserve-container">
        <a class="nav-link" href="{{ url('/') }}">
            <h1 class="text-center" style="font-family: Copperplate; color: whitesmoke;">The Calm</h1>
            <span class="sr-only"></span>
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div id="reservation-form-content" class="row">
            <div class="column">
                <div id="search-reservation">
                    <h2 style="color:white;">Search for Time</h2>
                    <form id="search_reservation_form" method="POST" action="{{ route('frontend.reservation.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="search_reservation_date">Select Date</label><br>
                            <input class="form-control" type="date" id="search_reservation_date"
                                name="reservation_date" required>
                        </div>
                        <div class="form-group">
                            <label for="search_reservation_time">Available Reservation Times</label>
                            <div id="availability-table">
                                <select name="reservation_time" id="search_reservation_time" style="width:10em;"
                                    class="form-control">
                                    <option value="" selected disabled>Select a Time</option>
                                    <option value="10:00:00">10:00 AM</option>
                                    <option value="11:00:00">11:00 AM</option>
                                    <option value="12:00:00">12:00 PM</option>
                                    <option value="13:00:00">01:00 PM</option>
                                    <option value="14:00:00">02:00 PM</option>
                                    <option value="15:00:00">03:00 PM</option>
                                    <option value="16:00:00">04:00 PM</option>
                                    <option value="17:00:00">05:00 PM</option>
                                    <option value="18:00:00">06:00 PM</option>
                                    <option value="19:00:00">07:00 PM</option>
                                    <option value="20:00:00">08:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <input type="number" id="search_head_count" name="head_count" value="1" hidden required>
                        <button type="submit" style="background-color: black; color: rgb(234, 234, 234);"
                            class="btn">Search</button>
                    </form>
                </div>
            </div>

            <div class="column right-column">
                <div id="make-reservation">
                    <h2 style="color:white;">Make Reservation</h2>
                    <form method="POST" action="{{ route('frontend.reservation.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="customer_name" class="form-label ">Customer Name</label>
                            <input type="text" class="form-control text-dark" name="customer_name"
                                id="customer_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label ">Phone</label>
                            <input type="tel" class="form-control text-dark" name="phone" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="table_number" class="form-label ">Table Number</label>
                            <input type="number" class="form-control text-dark" name="table_number"
                                id="table_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="reservation_time" class="form-label ">Reservation Time</label>
                            <input type="time" min="10:00" max="20:00" class="form-control text-dark"
                                name="reservation_time" id="reservation_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="reservation_date" class="form-label ">Reservation Date</label>
                            <input type="date" class="form-control text-dark" name="reservation_date"
                                id="reservation_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="head_count" class="form-label ">Head Count</label>
                            <input type="number" class="form-control text-dark" name="head_count"
                                id="head_count" required>
                        </div>
                        <div class="mb-3">
                            <label for="special_request" class="form-label ">Special Request</label>
                            <textarea class="form-label text-dark" name="special_request" id="special_request" cols="55"
                                rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Redirect and hide content after success
        @if (session('success'))
            document.getElementById('reservation-form-content').style.display = 'none';
            setTimeout(function() {
                window.location.href = "{{ url('/') }}";
            }, 3000); // 3000 milliseconds = 3 seconds
        @endif
    </script>
</body>

</html>
