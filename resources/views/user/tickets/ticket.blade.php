<h1>Ticket Information</h1>
<p>Booking ID: {{ $ticket->booking->id }}</p>
<p>Transaction ID: {{ $ticket->transaction->id }}</p>
<p>QR Code: <img src="{{ asset('storage/qrcodes/ticket_' . $ticket->id . '.png') }}" alt="QR Code"></p>
