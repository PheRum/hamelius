<?php

namespace App\Http\Controllers;

use App\Events\Ticket\TicketClose;
use App\Events\Ticket\TicketCompleted;
use App\Events\Ticket\TicketNew;
use App\Http\Requests\TicketStoreRequest;
use App\Http\Requests\TicketUpdateRequest;
use App\Models\Status;
use App\Models\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = Ticket::with('user')->when(!request()->user()->isAdmin(), function ($query) {
            /** @var \Illuminate\Database\Query\Builder $query */
            $query->where('user_id', auth()->id());
        })->simplePaginate();

        return view('ticket.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\TicketStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TicketStoreRequest $request)
    {
        $ticket = Ticket::create([
            'title' => $request->get('title'),
            'process_id' => $request->get('process'),
            'status_id' => Status::STATUS_NEW,
            'user_id' => auth()->id(),
        ]);

        if ($request->has('furniture')) {
            $ticket->furniture()->attach($request->get('furniture'));
        }

        TicketNew::dispatch($ticket);

        return redirect()->route('ticket.show', $ticket->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket $ticket
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\TicketUpdateRequest $request
     * @param  \App\Models\Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(TicketUpdateRequest $request, Ticket $ticket)
    {
        $this->authorize('update', $ticket);

        $ticket->update([
            'title' => $request->get('title'),
            'process_id' => $request->get('process'),
            'status_id' => $request->get('status'),
        ]);

        if ($request->has('furniture')) {
            $ticket->furniture()->detach();
            $ticket->furniture()->attach($request->get('furniture'));
        }

        if ($ticket->status !== $request['status']) {
            switch ($request->get('status')) {
                case Status::STATUS_COMPLETED:
                    TicketCompleted::dispatch($ticket);
                    break;
                case Status::STATUS_CLOSE:
                    TicketClose::dispatch($ticket);
                    break;

            }
        }

        return redirect()->route('ticket.show', $ticket->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Exception
     */
    public function destroy(Ticket $ticket)
    {
        $this->authorize('delete', $ticket);

        $ticket->delete();

        return redirect()->route('ticket.index');
    }
}
