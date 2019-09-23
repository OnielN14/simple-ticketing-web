<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'ticket_code', 'name', 'email', 'phone', 'is_check_in'
    ];
}
