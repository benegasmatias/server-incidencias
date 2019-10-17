<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Motherboards Controller
 *
 * @property \App\Model\Table\MotherboardsTable $Motherboards
 *
 * @method \App\Model\Entity\Motherboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MotherboardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {$mothers = $this->paginate($this->Motherboards);

        $this->set([
            'mothers' => $mothers,
            '_serialize' => ['mothers']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Motherboard id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $motherboard = $this->Motherboards->get($id, [
            'contain' => ['Cabinets']
        ]);

        $this->set('motherboard', $motherboard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Motherboards->newEntity($this->request->getData());
        if ($this->Motherboards->save($recipe)) {
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
     * @param string|null $id Motherboard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $motherboard = $this->Motherboards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $motherboard = $this->Motherboards->patchEntity($motherboard, $this->request->getData());
            if ($this->Motherboards->save($motherboard)) {
                $this->Flash->success(__('The motherboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The motherboard could not be saved. Please, try again.'));
        }
        $this->set(compact('motherboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Motherboard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $motherboard = $this->Motherboards->get($id);
        if ($this->Motherboards->delete($motherboard)) {
            $this->Flash->success(__('The motherboard has been deleted.'));
        } else {
            $this->Flash->error(__('The motherboard could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
