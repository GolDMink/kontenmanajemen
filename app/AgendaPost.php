<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaPost extends Model
{
    protected $table = 'agenda_post';
    protected $fillable = ['id_client','id_designer','nama_projek','jadwal_post'];
}
