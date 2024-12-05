<template>
    <div class="appointments-card">
        <div class="card-header">
            <h2>Appointments</h2>
        </div>
        <div class="card-body">
            <ul>
                <li v-for="(appointment, index) in appointments" :key="index" class="appointment-item">
                    <div class="appointment-content">
                        <span class="appointment-text">{{ appointment }}</span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            appointments: {
                type: Array,
                required: true
            }
        }
    }
</script>

<style scoped>
    .appointments-card {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .card-header {
        text-align: center;
        font-family: 'Roboto', sans-serif;
        font-size: 24px;
        color: #333;
        margin-bottom: 15px;
    }

    .card-body {
        background: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
    }

    .appointment-item {
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 10px;
        background: #ffecb3;
        transition: all 0.3s ease;
    }

    .appointment-item:hover {
        background: #f7d54c;
        transform: scale(1.05);
    }

    .appointment-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .appointment-text {
        font-family: 'Arial', sans-serif;
        font-size: 18px;
        color: #5f6368;
    }
</style>
