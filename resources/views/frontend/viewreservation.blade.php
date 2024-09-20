<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reservations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #f22835;
        }

        .reservation-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .reservation-table th, .reservation-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .reservation-table th {
            background-color: #f22835;
            color: white;
        }

        .no-reservation {
            text-align: center;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Reservations</h2>
        <table class="reservation-table">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Guests</th>
                    <th>Table</th>
                </tr>
            </thead>
            <tbody>
                @if ($reservations->count() > 0)
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->reservation_date }}</td>
                            <td>{{ $reservation->reservation_time }}</td>
                            <td>{{ $reservation->head_count }}</td>
                            <td>{{ $reservation->table_number }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="no-reservation">No reservations found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
