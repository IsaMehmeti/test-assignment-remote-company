<?php

namespace App\Http\Controllers;

use App\Services\ResourceService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /* Declaring a class property called $resourceService and setting it to be of type ResourceService. */
    public ResourceService $resourceService;

    /**
     * The constructor function is called when the class is instantiated. It takes a parameter of type ResourceService and
     * assigns it to the class property $resourceService. (Usually Service injection in all controller one by one, but since we
     * use the same Service in all, we inject it in parent controller and use it from here)
     *
     * @param ResourceService $resourceService This is the service that will be injected into the constructor.
     */
    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }
}
