<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Problems Controller
 *
 *
 * @method \App\Model\Entity\Problem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProblemsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $problems = $this->paginate($this->Problems);

        $this->set([
            'problems' => $problems,
            '_serialize' => ['problems']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $problem = $this->Problems->get($id, [
            'contain' => []
        ]);

        $this->set('problem', $problem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $problem = $this->Problems->newEntity();
        if ($this->request->is('post')) {
            $problem = $this->Problems->patchEntity($problem, $this->request->getData());
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The problem could not be saved. Please, try again.'));
        }
        $this->set(compact('problem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $problem = $this->Problems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $problem = $this->Problems->patchEntity($problem, $this->request->getData());
            if ($this->Problems->save($problem)) {
                $this->Flash->success(__('The problem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The problem could not be saved. Please, try again.'));
        }
        $this->set(compact('problem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Problem id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $problem = $this->Problems->get($id);
        if ($this->Problems->delete($problem)) {
            $this->Flash->success(__('The problem has been deleted.'));
        } else {
            $this->Flash->error(__('The problem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
