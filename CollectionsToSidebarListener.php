<?php

namespace Statamic\Addons\CollectionsToSidebar;

use Statamic\API\Nav;
use Statamic\API\Collection;
use Statamic\Extend\Listener;

class CollectionsToSidebarListener extends Listener
{

    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'cp.nav.created' => 'moveCollectionsToNav'
    ];

    /**
     * This method is doing too much.
     * Needs refactoring in the future.
     *
     * @param string $nav
     * @return void
     */
    public function moveCollectionsToNav($nav)
    {
        /**
         * Remove the collections link.\
         * 
         * @since 0.1.0
         */
        $nav->remove('content.collections');

        /**
         * Add each collection, by handle, to the content nav section.
         * 
         * @since 0.1.0
         * @todo Break this method down as it's doing too much.
         */
        $nav->addTo('content', function($item){
            $allCollectionHandles = Collection::handles();
            foreach($allCollectionHandles as $handle)
            {
                $name = ucwords($handle);
                // echo $handle;
                $item->add(Nav::item($name)->route('entries.show', $handle)->icon('book'));
            }
        });

    }
}
