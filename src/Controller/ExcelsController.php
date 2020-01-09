<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Excels Controller
 *
 *
 * @method \App\Model\Entity\Excel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExcelsController extends AppController
{
    public function excel(){
        $this->layout='ajax';
        $this->response->type('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      }
}
