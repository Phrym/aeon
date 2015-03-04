<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user';

    /**
     *  Array of field available for form fill-ups
     *
     * @access protected
     * @var array
     */
    protected $fillable = array('username', 'password');

    /**
     * The set of rules set in validation
     * 
     * @access public
     * @var array
     */

	public static $rules = array(
			'username'   => 'required|unique,user,username|min:5',
			'password'   => 'required|alphaNum|min:5',
            'staff_id'   => 'unique:user,staff_id|numeric'
	);

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    /**
     * Returns the staff related to this model
     *
     * @access public
     * @return Staff
     */
    public function staff()
    {
        return $this->belongsTo('Staff');
    }

    public function masteral()
    {
        return $this->belongsTo('Masteral');
    }

    public function doctor()
    {
        return $this->belongsTo('Doctor');
    }

    public function roles()
    {
        return $this->belongsToMany('Role','user_role');
    }

    public function isEmployee()
    {
        $roles = $this->roles->toArray();
        return !empty($roles);
    }
    
    public function hasRole($check)
    {
        return in_array($check, array_fetch($this->roles->toArray(), 'role'));
    }
 
    private function getIdInArray($array, $term)
    {
        foreach ($array as $role) 
        {
            if ($role['role'] == $term) 
            {
                return $role['id'];
            }
        }
        
        return Redirect::to('admin')->with('error_message','Unexpected Value Appeared. Sorry for Inconvenience.');
    }
 
    /**
     * Add roles to user to make them a concierge
     */
    public function authorizeUser($title)
    {
        $this->roles()->detach();
        $assigned_roles = [];
 
    //  $roles = array_fetch(Role::all()->toArray(), 'role');
        $roles = Role::all()->toArray();

        switch ($title) {
            case 'owner':
                $assigned_roles[] = $this->getIdInArray($roles, 'su');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_user');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_user');
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_degree');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_staff');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_room');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_subject');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_schedule');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_degree');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_staff');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_room');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_subject');
                $assigned_roles[] = $this->getIdInArray($roles, 'create_degree');
                $assigned_roles[] = $this->getIdInArray($roles, 'create_staff');
                $assigned_roles[] = $this->getIdInArray($roles, 'create_room');
                $assigned_roles[] = $this->getIdInArray($roles, 'create_subject');
                $assigned_roles[] = $this->getIdInArray($roles, 'global');
            case 'worker':
                $assigned_roles[] = $this->getIdInArray($roles, 'create_schedule');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_schedule');
                $assigned_roles[] = $this->getIdInArray($roles, 'delete_faculty');
                $assigned_roles[] = $this->getIdInArray($roles, 'edit_faculty');
                $assigned_roles[] = $this->getIdInArray($roles, 'create_faculty');
                $assigned_roles[] = $this->getIdInArray($roles, 'global_view');
            case 'basic':
                $assigned_roles[] = $this->getIdInArray($roles, 'basic_authentication_access');
                break;
            default:
                return Redirect::to('admin')->with('error_message','The employee status entered does not exist');
        }
 
        $this->roles()->attach($assigned_roles);
    }
}
