<?php namespace Aeon\Library\Chronos\Provider;

use Illuminate\Routing\RoutingServiceProvider as ServiceProvider;

class ChronosProvider extends ServiceProvider {

    public function register()
    {
    	$this->bind();
    }

    // Binds the Repositories
    public function bind()
    {
        $this->app->bind("Aeon\\Library\\Chronos\\Repository\\ChronosRepositoryInterface", 
                         "Aeon\\Library\\Chronos\\Repository\\ChronosRepository");
    }
}
