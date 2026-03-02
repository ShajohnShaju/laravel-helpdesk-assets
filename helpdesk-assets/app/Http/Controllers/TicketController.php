<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
   public function store(\App\Http\Requests\StoreTicketRequest $request)
{
    // validation and insert
    $validated = $request->validated();

    $ticket = Ticket::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'priority' => $validated['priority'],
        'status' => 'open',
        'created_by_name' => $validated['created_by_name'],
        'created_by_user_id' => null,
        'asset_id' => $validated['asset_id'] ?? null,
    ]);

    return response()->json([
        'message' => 'Ticket created',
        'ticket' => $ticket,
    ], 201);
}





/*  // data validation when receiving a post request
    public function store(\App\Http\Requests\StoreTicketRequest $request)
{
    // only validated fields are included
    $validated = $request->validated();

    return response()->json($validated);
}  */

/*     debugging only diagnostic code

public function store(\App\Http\Requests\StoreTicketRequest $request)
{
    return response()->json([
        'incoming' => $request->all(),
        'incoming_priority' => $request->input('priority'),
        'validated' => $request->validated(),
    ]);
} */
}
