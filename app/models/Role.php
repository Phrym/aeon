<?php

class Role extends Eloquent
{

    protected $table = 'role';
    
    /**
     * Set timestamps off
     */
    public $timestamps = false;
 
    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('User','user_role');
    }

}
