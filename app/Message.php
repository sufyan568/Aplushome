<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
 /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['from','to','message','status','type','admin','intakeco_id','caregiver_id','staff','date','time'];

    /**
     * A message belong to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
