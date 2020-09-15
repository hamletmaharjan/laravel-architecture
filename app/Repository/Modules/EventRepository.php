<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\Event;

class EventRepository
{
    
    private $event;


   
    public function __construct(Event $event) {
        $this->event = $event;
    }

    public function all() {
        $result = $this->event->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->event->find($id);
        return $result;
    }

}