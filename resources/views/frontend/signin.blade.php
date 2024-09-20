<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{asset('frontend_assets/image/calm.png')}}" type="image/x-icon">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; /* Remove default margin */
            background-color: black;
            background-image: url('{{asset('frontend_assets/image/loginBackground.jpg')}}'); /* Set the background image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: white;
        }

        /* Style for the container within login.php */
        .register-container {
            padding: 50px; /* Adjust the padding as needed */
            border-radius: 10px; /* Add rounded corners */
            margin: 100px auto; /* Center the container horizontally */
            max-width: 500px; /* Set a maximum width for the container */
        }
        
        .register_wrapper {
            width: 400px; /* Increase the container width */
            padding: 20px;
        }

        h2 {
            text-align: center;
            font-family: 'Montserrat', serif;
        }

        p {
            font-family: 'Montserrat', serif;
        }

        .form-group {
            margin-bottom: 15px; /* Add space between form elements */
        }

        ::placeholder {
            font-size: 12px; /* Adjust the font size as needed */
        }

        /* Add flip animation class to all Font Awesome icons */
        .fa-flip {
            animation: fa-flip 3s infinite;
        }

        /* Keyframes for the flip animation */
        @keyframes fa-flip {
            0% {
                transform: scale(1) rotateY(0);
            }
            50% {
                transform: scale(1.2) rotateY(180deg);
            }
            100% {
                transform: scale(1) rotateY(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register_wrapper"> <!-- Updated class name -->
            <a class="nav-link" href="../home/home.php#hero">
                <h1 class="text-center" style="font-family:Copperplate; color:white;"> THe Calm</h1>
                <span class="sr-only"></span>
            </a>
            <br>
            <form action="{{route('registerSave')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email">
                    <span class="text-danger"><!-- PHP echo for email_err --></span>
                </div>

                <div class="form-group">
                    <label> Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name">
                    <span class="text-danger"><!-- PHP echo for member_name_err --></span>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password">
                    <span class="text-danger"><!-- PHP echo for password_err --></span>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    <span class="text-danger"><!-- PHP echo for password_err --></span>
                </div>

                

                <button style="background-color:black;" class="btn btn-dark" type="submit" name="register" value="Register">Register</button>
            </form>

            <p style="margin-top:1em; color:white;">Already have an account? <a href="{{url('/user_login')}}">Proceed to Login</a></p>
        </div>
    </div>
</body>
</html>
