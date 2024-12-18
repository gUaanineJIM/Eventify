<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    use HasFactory;
    use HasFactory;

    

    protected $fillable = ['event_id', 'name', 'rsvp_status'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    
}
