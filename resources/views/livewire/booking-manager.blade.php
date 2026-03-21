<div style="margin-top:20px; border:1px solid black; padding:10px;">
    
    <h3>Réserver ce bien</h3>

    @if (session()->has('message'))
        <p style="color:green;">{{ session('message') }}</p>
    @endif

    <div>
        <label>Date début :</label><br>
        <input type="date" wire:model="start_date">
    </div>

    <div style="margin-top:10px;">
        <label>Date fin :</label><br>
        <input type="date" wire:model="end_date">
    </div>

    <button wire:click="book" style="margin-top:10px;">
        Réserver
    </button>

</div>