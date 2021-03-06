<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cabinets Controller
 *
 * @property \App\Model\Table\CabinetsTable $Cabinets
 *
 * @method \App\Model\Entity\Cabinet[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CabinetsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Rams', 'Disks', 'Motherboards']
        ];
        $cabinets = $this->paginate($this->Cabinets);

       
        $this->set([
            'cabinets'=>$cabinets,
            '_serialize'=>['cabinets']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Cabinet id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cabinet = $this->Cabinets->get($id, [
            'contain' => ['Offices', 'Rams', 'Disks', 'Motherboards']
        ]);

        $this->set([
            'cabinet'=>$cabinet,
            '_serialize'=>['cabinet']
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Cabinets->newEntity($this->request->getData());
        if ($this->Cabinets->save($recipe)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'recipe' => $recipe,
            '_serialize' => ['message', 'recipe']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cabinet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $cabinet2 = $this->Cabinets->get($id);
        
        $cabinet = $this->Cabinets->patchEntity($cabinet2, $this->request->getData());
     
        if ($this->Cabinets->save($cabinet)) {
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
     * @param string|null $id Cabinet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $recipe = $this->Cabinets->get($id);
        $message = 'Deleted';
        if (!$this->Cabinets->delete($recipe)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function getCabinetsForOffices($id)
    {
        $cabinets = $this->Cabinets->find()->where(['office_id' => $id]);
        
        $this->set([
            'cabinets' => $cabinets,
            '_serialize' => ['cabinets']
        ]);

    }
}
