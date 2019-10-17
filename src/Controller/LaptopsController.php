<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Laptops Controller
 *
 * @property \App\Model\Table\LaptopsTable $Laptops
 *
 * @method \App\Model\Entity\Laptop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LaptopsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Offices', 'Rams', 'Disks']
        ];
        $laptops = $this->paginate($this->Laptops);

        $this->set(compact('laptops'));
    }

    /**
     * View method
     *
     * @param string|null $id Laptop id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $laptop = $this->Laptops->get($id, [
            'contain' => ['Offices', 'Rams', 'Disks']
        ]);

        $this->set('laptop', $laptop);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Laptops->newEntity($this->request->getData());
        if ($this->Laptops->save($recipe)) {
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
     * @param string|null $id Laptop id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $laptop2 = $this->Laptops->get($id);
        
        $laptop = $this->Laptops->patchEntity($laptop2, $this->request->getData());
     
        if ($this->Laptops->save($laptop)) {
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
     * @param string|null $id Laptop id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $laptop = $this->Laptops->get($id);
        if ($this->Laptops->delete($laptop)) {
            $this->Flash->success(__('The laptop has been deleted.'));
        } else {
            $this->Flash->error(__('The laptop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
