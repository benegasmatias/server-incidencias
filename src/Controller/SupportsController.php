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
        $this->paginate=array('limit'=>900);
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
        $incidencias=$bd->query($query)->fetchAll('assoc');
        $this->set([
            'incidencias'=>$incidencias,
            '_serialize'=>['incidencias']
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
            'contain' => ['problems']
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
        debug($support);
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
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $support2 = $this->Supports->get($id);
        
        $support = $this->Supports->patchEntity($support2, $this->request->getData());
     
        if ($this->Supports->save($support)) {
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
     * @param string|null $id Support id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $support = $this->Supports->get($id);
        $message = 'Deleted';
        if (!$this->Supports->delete($support)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
