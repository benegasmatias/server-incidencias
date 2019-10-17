<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rams Controller
 *
 * @property \App\Model\Table\RamsTable $Rams
 *
 * @method \App\Model\Entity\Ram[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ram = $this->paginate($this->Rams);

        $this->set([
            'rams' => $ram,
            '_serialize' => ['rams']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Ram id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ram = $this->Rams->get($id);

        $this->set('ram', $ram);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Rams->newEntity($this->request->getData());
        if ($this->Rams->save($recipe)) {
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
     * @param string|null $id Ram id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ram = $this->Rams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ram = $this->Rams->patchEntity($ram, $this->request->getData());
            if ($this->Rams->save($ram)) {
                $this->Flash->success(__('The ram has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ram could not be saved. Please, try again.'));
        }
        $this->set(compact('ram'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ram id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ram = $this->Rams->get($id);
        if ($this->Rams->delete($ram)) {
            $this->Flash->success(__('The ram has been deleted.'));
        } else {
            $this->Flash->error(__('The ram could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
