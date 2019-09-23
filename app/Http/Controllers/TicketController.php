<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data'=>Ticket::all()]);
    }

    public function checkIn(Request $request){
        $message = [];
        $input = $request->all();

        $ticketData = Ticket::where('ticket_code', $input['ticket_code'])->first();

        if($ticketData){

            if(!$this->isTicketChecked($ticketData)){
                $ticketData->is_check_in = true;
    
                $ticketData->save();
    
                $message = [
                    'message' => $input['ticket_code'].' checked.'
                ];
            }
            else{
                $message = [
                    'message' => $input['ticket_code'].' already checked.'
                ];
            }
        }
        else{
            $message = [
                'message' => $input['ticket_code'].' is not exist.'
            ];
        }

        return response()->json($message);
    }

    protected function isTicketChecked($ticket){
        if($ticket['is_check_in']){
            return true;
        }

        return false;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $input['ticket_code'] = $this->ticketCodeGenerator($input);

        Ticket::create($input);

        return response()->json([
            'message' => 'Ticket created',
            'ticket_code' => $input['ticket_code']
        ]);
    }

    protected function ticketCodeGenerator($ticketData){
        return 'MSC-TCT-'.rand(10,99).substr($ticketData['phone'],0,3);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        
        $ticket = Ticket::find($id);

        $ticket->name = $input['name'];
        $ticket->email = $input['email'];
        $ticket->phone = $input['phone'];
        $ticket->is_check_in = $input['is_check_in'];

        $ticket->save();
        return response()->json(['message'=> $input['ticket_code'].' is updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ticket = Ticket::destroy($id);

        if($ticket){
            return response()->json(['message' => 'Ticket has been deleted']);
        }
        else{
            return response()->json(['message' => 'Something wrong']);
        }
    }
}
