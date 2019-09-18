<?php
namespace App\Controller;
use Cake\Datasource\ConnectionManager;
use App\Controller\AppController;

/**
 * Supports Controller
 *
 *
 * @method \App\Model\Entity\Support[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SupportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $supports = $this->paginate($this->Supports);

        $this->set([
            'supports' => $supports,
            '_serialize' => ['supports']
        ]);
    }

    public function viewTodo()
    {
        $bd = ConnectionManager::get('default');
        $query="SELECT * FROM supports 
        JOIN users on user_id = id_user
        JOIN offices on office_id=id_office 
        JOIN problems on problem_id=id_problem 
        JOIN technicals on technical_id=id_technical";
        $availabitys=$bd->query($query)->fetchAll('assoc');
        $this->set([
            'availabitys'=>$availabitys,
            '_serialize'=>['availabitys']
        ]);

       

    }

    /**
     * View method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $support = $this->Supports->get($id, [
            'contain' => []
        ]);

        $this->set('support', $support);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $support = $this->Supports->newEntity($this->request->getData());
        if ($this->Supports->save($support)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'support' => $support,
            '_serialize' => ['message', 'support']
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $support = $this->Supports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $support = $this->Supports->patchEntity($support, $this->request->getData());
            if ($this->Supports->save($support)) {
                $this->Flash->success(__('The support has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The support could not be saved. Please, try again.'));
        }
        $this->set(compact('support'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $support = $this->Supports->get($id);
        if ($this->Supports->delete($support)) {
            $this->Flash->success(__('The support has been deleted.'));
        } else {
            $this->Flash->error(__('The support could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
