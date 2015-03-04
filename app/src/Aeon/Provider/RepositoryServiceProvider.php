<?php namespace Aeon\Provider;

use Illuminate\Routing\RoutingServiceProvider as ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

    public function register()
    {
    	$this->bind();
    }

    // Binds the Repositories
    public function bind()
    {
    	$this->bindModels();
    }

    //Binds each Repository
    private function bindModels()
    {
    	foreach($this->models() as $model)
    	{
    		$this->app->bind("Aeon\\Repository\\{$model}RepositoryInterface", "Aeon\\Repository\\{$model}Repository");
    	}
    }

    /**
    * returns the list of the model from Aeon\Repository
    *
    * @return array
    */

    private function models()
    {
    	return [
    		'Staff',
    		'Room',
    		'Faculty',
            'Designation',
            'Bachelor',
            'Status',
            'User',
            'Prospectus',
            'Chronos'
    	];
    }

}
