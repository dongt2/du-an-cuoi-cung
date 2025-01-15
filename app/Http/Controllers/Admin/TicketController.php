<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Combo;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function checkin(string $id)
    {
        $ticket = Ticket::with('transaction','booking','user','movie','showtime')->findOrFail($id);

        $combos = Combo::get();
        if(($ticket->checkin == 0)){
            return view('admin.ticket.checkin',compact('ticket','combos'));
        }
        return redirect()->route('admin.ticket.index')->with('error','Vé đã checkin');

    }

    public function checkinUpdate(Request $request, string $id)
    {
        $data = $request->all();
//dd($data);
        if ($request['combo_id']) {
            if ($data['combo_id'] != null) {
                $combo = Combo::findOrFail($data['combo_id']);

                // Check if requested quantity exceeds available inventory
                if ($data['quantity_combo'] > $combo->quantity) {
                    return redirect()->back()->with('error', 'Số lượng combo được yêu cầu vượt quá lượng hàng tồn kho có sẵn.');
                }

                // Update booking details
                $booking = Ticket::findOrFail($id)->booking;
                $booking->update([
                    'combo_id' => $data['combo_id'],
                    'quantity_combo' => $data['quantity_combo'],
                    'total_price' => $booking->total_price + ($combo->price * $data['quantity_combo']),
                ]);
                // Update combo inventory
                $combo->update([
                    'quantity' => $combo->quantity - $data['quantity_combo'],
                ]);
            }
        }
        $ticket = Ticket::findOrFail($id);
        $ticket->update($data);

        return redirect()->route('admin.checkin.print', $ticket->ticket_id)->with('success', 'Check-in successful');
    }

    public function print(Request $request, string $id)
    {
        $ticket = Ticket::with('transaction','booking','user','movie','showtime')->findOrFail($id);

        return view('admin.ticket.print',compact('ticket'));
    }


    public function exportTicketsToPdf($ticketId)
    {

        $ticket = Ticket::with('transaction','booking','user','movie','showtime')
        ->findOrFail($ticketId);

        // Decode the seats JSON
        $ticketSeats = json_decode($ticket->seats, true);

        // Generate individual tickets for each seat
        $data = [];
        foreach ($ticketSeats as $seat) {
            $data[] = [
                'movie_title' => $ticket->movie->title,
                'screen_name' => $ticket->showtime->screen->screen_name,
                'showtime' => \Carbon\Carbon::parse($ticket->showtime->time)->format('H:m'),
                'showtime_date' => \Carbon\Carbon::parse($ticket->showtime->showtime_date)->format('d-m-Y'),
                'seat' => $seat,
                'price' => number_format($ticket->transaction->total / count($ticketSeats), 0, ',', ','),
                'order_code' => $ticket->booking->order_code,
                'buyer_name' => $ticket->user->username,
                'combo' => $ticket->booking->combo_id != null ? $ticket->booking->combo->combo_name : 'Không có',
                'quantity' => $ticket->booking->quantity_combo,
            ];
        }
        // Render the PDF view (we'll create this next)
        $pdf = Pdf::loadView('admin.ticket.pdf', [
            'tickets' => $data,
        ]);

        $ticket->update([
            'status' => '1'
        ]);

        // Return the PDF download response
        return $pdf->download('ticket.pdf');

//        return redirect()->route('admin.ticket.index',compact('pdf'))->with('success', 'Xuất vé thành công');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ticket = Ticket::with('transaction','booking','user','movie','showtime')->get();

        return view('admin.ticket.index', compact('ticket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('transaction','booking','user','movie','showtime')->findOrFail($id);

        return view('admin.ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
