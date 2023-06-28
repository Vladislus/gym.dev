<style>
        html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: black;
    }
    .form {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: #000;
    color: #FFD700;
    margin-top: 50px;
    width: 600px; /* Adjust the width of the form container */
    margin-left: auto;
    margin-right: auto;
}

.form-group {
    margin-bottom: 15px;
}

.form-label {
    font-weight: bold;
}

.form-input {
    padding: 8px;
    border: none;
    border-radius: 4px;
    background-color: #FFD700;
    color: #000;
    width: 100%; /* Set all inputs to the same width */
    box-sizing: border-box; /* Include padding in the width calculation */
}

.form-submit {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #FFD700;
    color: #000;
    font-weight: bold;
    cursor: pointer;
}

.form-submit:hover {
    background-color: yellow;
}
</style>

<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-yellow-500 bg-black p-4">
            {{ __('Izveidot sacensības') }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('competitions.store') }}" class="form">
    @csrf
    <div class="form-group">
        <label for="title">Nosaukums:</label>
        <input type="text" id="title" name="title" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="place">Vieta:</label>
        <input type="text" id="place" name="place" class="form-input" required>
    </div>
    <div class="form-group">
        <label for="date">Datums:</label>
        <input type="date" id="date" name="date" class="form-input" required>
    </div>
    <div class="form-group">
        <button type="submit" class="form-submit">Apstrprināt</button>
    </div>
</form>
</x-app-layout>