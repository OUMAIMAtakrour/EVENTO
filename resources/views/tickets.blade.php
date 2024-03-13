<!-- resources/views/tickets/show.blade.php -->
<h1>Ticket Details</h1>
<p>Ticket ID: {{ $ticket->id }}</p>
<!-- Display other ticket details as needed -->
<div class="cardWrap">
  <div class="card cardLeft">
    <h1>Startup <span>Cinema</span></h1>
    <div class="title">
      <h2>How I met your Mother</h2>
      <span>movie</span>
    </div>
    <div class="name">
      <h2>Vladimir Kudinov</h2>
      <span>name</span>
    </div>
    <div class="seat">
      <h2>156</h2>
      <span>seat</span>
    </div>
    <div class="time">
      <h2>12:00</h2>
      <span>time</span>
    </div>
    
  </div>
  <div class="card cardRight">
    <div class="eye"></div>
    <div class="number">
      <h3>156</h3>
      <span>seat</span>
    </div>
    <div class="barcode"></div>
  </div>

</div>