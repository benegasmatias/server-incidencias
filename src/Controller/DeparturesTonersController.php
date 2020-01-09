<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * DeparturesToners Controller
 *
 * @property \App\Model\Table\DeparturesTonersTable $DeparturesToners
 *
 * @method \App\Model\Entity\DeparturesToner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeparturesTonersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    { 
        $bd = ConnectionManager::get('default');
        $query=" SELECT * FROM `departures_toners` 
        JOIN offices on office_id=id_office 
        JOIN toners on departures_toners.toner_id=toners.id_toner
        JOIN types_toners on toners.type_id=types_toners.id_type";

        
        $departures=$bd->query($query)->fetchAll('assoc');

        $this->set([
            'departures'=>$departures,
            '_serialize'=>['departures']
        ]);
    }


   
    /**
     * View method
     *
     * @param string|null $id Departures Toner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $departuresToner = $this->DeparturesToners->get($id, [
            'contain' => ['Offices', 'Toners']
        ]);

        $this->set('departuresToner', $departuresToner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $departure = $this->DeparturesToners->newEntity($this->request->getData());
        if ($this->DeparturesToners->save($departure)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'departure' => $departure,
            '_serialize' => ['message', 'departure']
        ]);
    }
    /**
     * Edit method
     *
     * @param string|null $id Departures Toner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $departure2 = $this->DeparturesToners->get($id);
        
        $departure = $this->DeparturesToners->patchEntity($departure2, $this->request->getData());
     
        if ($this->DeparturesToners->save($departure)) {
            $msg= 'Saved';
        } else {
            $msg = 'Error';
        }
        $this->set([
            'message' => $msg,
            '_serialize' => ['message']
        ]);
    }

    /**
     * Delete method
     *
     * @param string|null $id Departures Toner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $departure = $this->DeparturesToners->get($id);
        $message = 'Deleted';
        if (!$this->DeparturesToners->delete($departure)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
