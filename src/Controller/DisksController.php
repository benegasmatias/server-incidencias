<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Disks Controller
 *
 * @property \App\Model\Table\DisksTable $Disks
 *
 * @method \App\Model\Entity\Disk[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $disk = $this->paginate($this->Disks);

        $this->set([
            'disks' => $disk,
            '_serialize' => ['disks']
        ]);
    }

    /**
     * View method
     *
     * @padisk string|null $id Disk id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $disk = $this->Disks->get($id, [
            'contain' => ['Cabinets', 'Laptops']
        ]);

        $this->set('disk', $disk);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->Disks->newEntity($this->request->getData());
        if ($this->Disks->save($recipe)) {
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
     * @padisk string|null $id Disk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $disk = $this->Disks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $disk = $this->Disks->patchEntity($disk, $this->request->getData());
            if ($this->Disks->save($disk)) {
                $this->Flash->success(__('The disk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The disk could not be saved. Please, try again.'));
        }
        $this->set(compact('disk'));
    }

    /**
     * Delete method
     *
     * @padisk string|null $id Disk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $disk = $this->Disks->get($id);
        if ($this->Disks->delete($disk)) {
            $this->Flash->success(__('The disk has been deleted.'));
        } else {
            $this->Flash->error(__('The disk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
