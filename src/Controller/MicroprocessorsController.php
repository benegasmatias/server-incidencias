<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Microprocessors Controller
 *
 * @property \App\Model\Table\MicroprocessorsTable $Microprocessors
 *
 * @method \App\Model\Entity\Microprocessor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MicroprocessorsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $micros = $this->paginate($this->Microprocessors);

        $this->set([
            'micros' => $micros,
            '_serialize' => ['micros']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Microprocessor id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $microprocessor = $this->paginate($this->Microprocessors);

        $this->set([
            'microprocessor' => $microprocessor,
            '_serialize' => ['microprocessor']
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
        $recipe = $this->Microprocessors->newEntity($this->request->getData());
        if ($this->Microprocessors->save($recipe)) {
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
     * @param string|null $id Microprocessor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $microprocessor = $this->Microprocessors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $microprocessor = $this->Microprocessors->patchEntity($microprocessor, $this->request->getData());
            if ($this->Microprocessors->save($microprocessor)) {
                $this->Flash->success(__('The microprocessor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The microprocessor could not be saved. Please, try again.'));
        }
        $this->set(compact('microprocessor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Microprocessor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $microprocessor = $this->Microprocessors->get($id);
        if ($this->Microprocessors->delete($microprocessor)) {
            $this->Flash->success(__('The microprocessor has been deleted.'));
        } else {
            $this->Flash->error(__('The microprocessor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
