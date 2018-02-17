<?php

namespace Statamic\Addons\CollectionsToSidebar;

use Statamic\Extend\Controller;

class CollectionsToSidebarController extends Controller
{
    /**
     * Maps to your route definition in routes.yaml
     *
     * @return mixed
     */
    public function index()
    {
        return $this->view('index');
    }
}
