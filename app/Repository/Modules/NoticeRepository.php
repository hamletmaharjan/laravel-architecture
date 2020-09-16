<?php
/**
 * Created by PhpStorm.
 * User: ym
 * Date: 3/26/18
 * Time: 11:25 AM
 */

namespace App\Repository\Modules;


use App\Models\Modules\Notice;

class NoticeRepository
{
    
    private $notice;


   
    public function __construct(Notice $notice) {
        $this->notice = $notice;
    }

    public function all() {
        $result = $this->notice->get();
        return $result;
    }
    public function findById($id) {
        $result = $this->notice->find($id);
        return $result;
    }

    public function allActive() {
        $result = $this->notice->where('status', 'active')->orderBy('display_order','asc')->get();
        return $result;
    }

}