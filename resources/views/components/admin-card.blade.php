<div class="card">
    <h1 class="name">{{ $name }}</h1>
</div>
<form action="{{ route('admin.delete.post') }}" method="POST" class="delete-form">
    @csrf
    <input type="hidden" name="id" value="{{ $id ?? '' }}">
    <button type="submit" class="btn btn-delete">Delete</button>
</form>

<style>
    /* Card Styling */
    .card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        /* Soft shadow for elegant look */
        padding: 30px;
        width: 300px;
        text-align: center;
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        margin: 0 auto;
        border: 1px solid #f0f0f0;
        /* Light border for extra definition */
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
    }

    /* Name Styling */
    .name {
        font-size: 2.5rem;
        /* Larger font size for name */
        font-weight: 500;
        color: #333;
        letter-spacing: 0.5px;
        margin: 0;
        padding-bottom: 20px;
        text-transform: capitalize;
    }

    /* Button Styling */
    .btn-delete {
        background-color: #ff6f61;
        /* Soft red color for the button */
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 30px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-transform: uppercase;
    }

    .btn-delete:hover {
        background-color: #e64a3c;
        /* Darker red on hover */
        transform: translateY(-3px);
    }

    .delete-form {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Ensures the form is vertically centered as well */
        width: auto;
        /* Use auto to let the content define the width */
        margin: 0 auto;
        /* Centers the form horizontally */
    }

    .btn-delete:focus {
        outline: none;
        box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
    }
</style>
