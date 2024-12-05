@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .hero-section {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            background-image: url("/images/photo.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            /* Parallax effect */
            z-index: 0;
            transition: background-position 0.1s linear;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translateX(-50%);
            z-index: -1;
            transition: background-position 0.1s linear;
        }

        /* Optional: If you want a smooth parallax effect */
        .hero-section {
            will-change: background-position;
            /* Optimizes performance during scrolling */
        }

        /* Adjust the position of the background based on scroll */
        window.addEventListener('scroll', function() {
                let scrollPos=window.scrollY;
                document.querySelector('.hero-section').style.backgroundPosition='center ' + (scrollPos * 0.5) + 'px';
            });

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent overlay */
            z-index: 1;
        }

        .content {
            z-index: 2;
            padding: 20px;
        }

        .welcome-message {
            font-size: 4rem;
            margin: 0;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            animation: fadeIn 2s ease-in-out;
        }

        .sub-message {
            font-size: 1.5rem;
            margin: 10px 0 30px;
            animation: fadeIn 2.5s ease-in-out;
        }

        .appointment-button {
            font-size: 1.8rem;
            padding: 15px 40px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, background-color 0.3s ease;
            animation: fadeIn 3s ease-in-out;
        }

        .appointment-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .social-icons {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            color: #fff;
            font-size: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #007BFF;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.2rem;
            color: #fff;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @media (max-width: 768px) {
            .welcome-message {
                font-size: 2.5rem;
            }

            .sub-message {
                font-size: 1.2rem;
            }

            .appointment-button {
                font-size: 1.5rem;
                padding: 10px 30px;
            }

            .scroll-indicator {
                font-size: 1rem;
            }
        }
    </style>

    <body>
        <section class="hero-section">
            <div class="overlay"></div>
            <div class="content">
                <h1 class="welcome-message">Welcome to NovaCare Clinic</h1>
                <p class="sub-message">Your health, our priority. Book an appointment today!</p>
                <a href="{{ route('appointment.doctors') }}" class="appointment-button">Take an Appointment</a>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="scroll-indicator">Scroll Down ⬇</div>
        </section>
    </body>
@endsection
