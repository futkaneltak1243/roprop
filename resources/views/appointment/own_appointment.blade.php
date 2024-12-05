<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: rgb(16, 16, 54);
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .header {
        background-color: #4CAF50;
        color: white;
        text-align: center;
        padding: 20px;
    }

    .header h1 {
        margin: 0;
        font-size: 24px;
    }

    .content {
        padding: 20px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }

    .row:last-child {
        border-bottom: none;
    }

    .label {
        font-weight: bold;
        color: #555;
    }

    .value {
        color: #333;
        text-align: right;
    }

    .button-container {
        text-align: center;
        padding: 20px;
        background: #f4f4f4;
    }

    .btn {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Appointment Details</h1>
        </div>
        <div class="content">
            <div class="row">
                <div class="label">Appointment ID:</div>
                <div class="value">{{ $appointment->id }}</div>
            </div>
            <div class="row">
                <div class="label">Full Name:</div>
                <div class="value">{{ $appointment->full_name }}</div>
            </div>
            <div class="row">
                <div class="label">Doctor's Name:</div>
                <div class="value">{{ $appointment->doctor->name }}</div>
            </div>
            <div class="row">
                <div class="label">Condition:</div>
                <div class="value">{{ $appointment->condition }}</div>
            </div>
            <div class="row">
                <div class="label">Phone Number:</div>
                <div class="value">{{ $appointment->phone_number }}</div>
            </div>
            <div class="row">
                <div class="label">Appointment Date:</div>
                <div class="value">{{ $appointment->appointment_date }}</div>
            </div>
        </div>
        <div class="button-container">
            <a href="{{ route('home') }}" class="btn">Back to Appointments</a>
        </div>
    </div>
</body>
