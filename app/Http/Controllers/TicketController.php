<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Auth::user()->tickets;
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'description' => 'required',
            'priority' => 'required|in:low,medium,high',
            'category' => 'required|string|max:255',
            'attachment' => 'nullable|file|mimes:jpg,png,pdf,doc,docx|max:2048'
        ]);
    
        // Handle file upload if there's an attachment
        $attachmentPath = $request->file('attachment') ? $request->file('attachment')->store('attachments', 'public') : null;
    
        Auth::user()->tickets()->create([
            'subject' => $request->subject,
            'description' => $request->description,
            'priority' => $request->priority,
            'category' => $request->category,
            'attachment' => $attachmentPath,
            'reported_at' => now(),
        ]);
    
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
    

}
