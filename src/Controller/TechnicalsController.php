<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Technicals Controller
 *
 *
 * @method \App\Model\Entity\Technical[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TechnicalsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $technicals = $this->paginate($this->Technicals);

        $this->set([
            'technicals' =>$technicals,
            '_serialize' => ['technicals']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $technical = $this->Technicals->get($id, [
            'contain' => []
        ]);

        $this->set('technical', $technical);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $technical = $this->Technicals->newEntity();
        if ($this->request->is('post')) {
            $technical = $this->Technicals->patchEntity($technical, $this->request->getData());
            if ($this->Technicals->save($technical)) {
                $this->Flash->success(__('The technical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technical could not be saved. Please, try again.'));
        }
        $this->set(compact('technical'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $technical = $this->Technicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $technical = $this->Technicals->patchEntity($technical, $this->request->getData());
            if ($this->Technicals->save($technical)) {
                $this->Flash->success(__('The technical has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The technical could not be saved. Please, try again.'));
        }
        $this->set(compact('technical'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Technical id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $technical = $this->Technicals->get($id);
        if ($this->Technicals->delete($technical)) {
            $this->Flash->success(__('The technical has been deleted.'));
        } else {
            $this->Flash->error(__('The technical could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
