<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Printers Controller
 *
 * @property \App\Model\Table\PrintersTable $Printers
 *
 * @method \App\Model\Entity\Printer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PrintersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $printer = $this->paginate($this->Printers);

        $this->set([
            'printers' => $printer,
            '_serialize' => ['printers']
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Printer id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $printer = $this->Printers->get($id, [
            'contain' => ['printer']
        ]);

        $this->set('printer', $printer);
    }

    public function getPrintsForprinter($id)
    {
        $printers = $this->Printers->find()->where(['office_id' => $id]);
        
        $this->set([
            'printers' => $printers,
            '_serialize' => ['printers']
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
        $recipe = $this->Printers->newEntity($this->request->getData());
        if ($this->Printers->save($recipe)) {
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
     * @param string|null $id Printer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $printer2 = $this->Printers->get($id);
        
        $printer = $this->Printers->patchEntity($printer2, $this->request->getData());
     
        if ($this->Printers->save($printer)) {
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
     * @param string|null $id Printer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $printer = $this->Printers->get($id);
        if ($this->Printers->delete($printer)) {
            $this->Flash->success(__('The printer has been deleted.'));
        } else {
            $this->Flash->error(__('The printer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
