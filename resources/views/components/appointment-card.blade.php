<a href="{{ route('appointment.edit', ['id' => $id]) }}" class="appointment-card-link">
    <div class="appointment-card">
        <div class="appointment-info">
            <h3 class="doctor-name">Doctor: {{ $name }}</h3>
            <p class="patient-name">Patient: {{ $fullname }}</p>
            <p class="condition">Condition: {{ $condition }}</p>
            <p class="appointment-date">Date: {{ $date }}</p>
            // test
        </div>
    </div>
</a>

<style>
    .appointment-card-link {
        text-decoration: none;
        display: block;
        width: 100%;
        max-width: 650px;
        /* Max width for responsiveness */
        margin: 10px auto;
        /* Centering the card */
    }

    .appointment-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .appointment-card:hover {
        transform: translateY(-5px);
        /* Lift the card on hover */
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        /* Stronger shadow on hover */
    }

    .appointment-info {
        display: flex;
        flex-direction: column;
        gap: 12px;
        /* Space between text lines */
    }

    .doctor-name,
    .patient-name,
    .condition,
    .appointment-date {
        font-size: 16px;
        color: #555;
        line-height: 1.5;
        /* Improved line height */
        margin: 0;
    }

    .doctor-name {
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }

    .patient-name {
        color: #444;
    }

    .condition {
        font-style: italic;
        color: #666;
    }

    .appointment-date {
        color: #999;
        font-style: italic;
    }

    /* Add a subtle transition effect for the text when hovering */
    .appointment-card:hover .doctor-name,
    .appointment-card:hover .patient-name,
    .appointment-card:hover .condition,
    .appointment-card:hover .appointment-date {
        color: #000;
    }
</style>
