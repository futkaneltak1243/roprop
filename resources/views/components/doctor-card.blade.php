<a href="{{ route('doctor.edit', ['id' => $id]) }}" class="doctor-card-link">
    <div class="doctor-card">
        <img src="{{ $photoUrl }}" alt="Photo of {{ $name }}" class="doctor-photo" />
        <div class="doctor-info">
            <h3 class="doctor-name">{{ $name }}</h3>
            <p class="doctor-specialty">{{ $specialty }}</p>
            <p class="doctor-experience">{{ $experience }} years of experience</p>
        </div>
    </div>
</a>

<style>
    .doctor-card-link {
        text-decoration: none;
        display: block;
        transition: transform 0.3s ease-in-out;
    }

    .doctor-card-link:hover {
        transform: scale(1.05);
    }

    .doctor-card {
        display: flex;
        width: 900px;
        max-width: 100%;
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .doctor-card:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .doctor-photo {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        margin-right: 20px;
        object-fit: cover;
        border: 3px solid #007BFF;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .doctor-info {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .doctor-name {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-bottom: 8px;
    }

    .doctor-specialty {
        font-size: 16px;
        color: #555;
        margin-bottom: 5px;
    }

    .doctor-experience {
        font-size: 14px;
        color: #777;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .doctor-card {
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 15px;
        }

        .doctor-photo {
            margin-right: 0;
            margin-bottom: 15px;
        }

        .doctor-info {
            text-align: center;
        }
    }
</style>
