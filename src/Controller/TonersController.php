<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Toners Controller
 *
 * @property \App\Model\Table\TonersTable $Toners
 *
 * @method \App\Model\Entity\Toner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TonersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {  $this->paginate=array('limit'=>100);
        $toners = $this->paginate($this->Toners);

        $this->set([
            'toners' =>$toners,
            '_serialize' => ['toners']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Toner id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $toner = $this->Toners->get($id, [
            'contain' => ['Printers']
        ]);

        $this->set('toner', $toner);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Toners->newEntity($this->request->getData());
        if ($this->Toners->save($recipe)) {
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
     * @param string|null $id Toner id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $toner = $this->Toners->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $toner = $this->Toners->patchEntity($toner, $this->request->getData());
            if ($this->Toners->save($toner)) {
                $this->Flash->success(__('The toner has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The toner could not be saved. Please, try again.'));
        }
        $this->set(compact('toner'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Toner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $toner = $this->Toners->get($id);
        if ($this->Toners->delete($toner)) {
            $this->Flash->success(__('The toner has been deleted.'));
        } else {
            $this->Flash->error(__('The toner could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
