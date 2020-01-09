<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TypesToners Controller
 *
 *
 * @method \App\Model\Entity\TypesToner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TypesTonersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $typesToner = $this->paginate($this->TypesToners);

        $this->set([
            'typesToner' =>$typesToner,
            '_serialize' => ['typesToner']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Types Toner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $typesToner = $this->TypesToners->get($id, [
            'contain' => []
        ]);

        $this->set('typesToner', $typesToner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $typesToner = $this->TypesToners->newEntity();
        if ($this->request->is('post')) {
            $typesToner = $this->TypesToners->patchEntity($typesToner, $this->request->getData());
            if ($this->TypesToners->save($typesToner)) {
                $this->Flash->success(__('The types toner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types toner could not be saved. Please, try again.'));
        }
        $this->set(compact('typesToner'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Types Toner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $typesToner = $this->TypesToners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $typesToner = $this->TypesToners->patchEntity($typesToner, $this->request->getData());
            if ($this->TypesToners->save($typesToner)) {
                $this->Flash->success(__('The types toner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The types toner could not be saved. Please, try again.'));
        }
        $this->set(compact('typesToner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Types Toner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $typesToner = $this->TypesToners->get($id);
        if ($this->TypesToners->delete($typesToner)) {
            $this->Flash->success(__('The types toner has been deleted.'));
        } else {
            $this->Flash->error(__('The types toner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
