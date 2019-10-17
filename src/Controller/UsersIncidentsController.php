<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use  Cake\Routing\Router;

/**
 * UsersIncidents Controller
 *
 * @property \App\Model\Table\UsersIncidentsTable $UsersIncidents
 *
 * @method \App\Model\Entity\UsersIncidents[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersIncidentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
      
        $users = $this->paginate($this->UsersIncidents);

         $this->set([
            'users' => $users,
            '_serialize' => ['users'] //lo convierte en json
        ]);

    }

    /**
     * View method
     *
     * @param string|null $id Users Incident id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $UsersIncidents = $this->UsersIncidentss->get($id, [
            'contain' => []
        ]);

        $this->set('UsersIncidents', $UsersIncidents);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->UsersIncidents->newEntity();
        if ($this->request->is('post')) {
            $article = $this->UsersIncidents->patchEntity($article, $this->request->getData());
            // You could also do the following
            //$newData = ['user_id' => $this->Auth->user('id')];
            //$article = $this->Users->patchEntity($article, $newData);
            if ($this->UsersIncidents->save($article)) {
               
               $msg="save";
            }else
            $msg="Error";
        }

        $this->set([
            'msg' => $msg,
            '_serialize' => ['msg'] //lo convierte en json
        ]);


    }

    /**
     * Edit method
     *
     * @param string|null $id Users Incident id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $UsersIncidents = $this->UsersIncidents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $UsersIncidents = $this->UsersIncidents->patchEntity($UsersIncidents, $this->request->getData());
            if ($this->UsersIncidents->save($UsersIncidents)) {
                $this->Flash->success(__('The users incident has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The users incident could not be saved. Please, try again.'));
        }
        $this->set(compact('UsersIncidents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Users Incident id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $UsersIncidents = $this->UsersIncidents->get($id);
        if ($this->UsersIncidents->delete($UsersIncidents)) {
            $this->Flash->success(__('The users incident has been deleted.'));
        } else {
            $this->Flash->error(__('The users incident could not be deleted. Please, try again.'));
        }

      
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['generatepass','authlogin','logout','index','add']);
        
        $action = Router::getRequest()->params;
        if($this->request->session()->read('Auth.User.rol') == 'Administrador'){
            $permision = ['edit','credentials','logout'];
            if(!in_array($action['action'], $permision)){
                throw new UnauthorizedException('Faltan permisos',401);
            }
        }
      
    }

    public function authlogin()
    {
        if ($this->request->is('post')) {
            $this->Auth->identify();
           
            $user = $this->Auth->identify();
            
            if ($user) {
                $this->Auth->setUser($user);
                return $this->response->withType('application/json')
                ->withStringBody(json_encode([$user
                ]));
            }else{
               $msg = ['type'=>'danger','msg'=>['title'=>'Error!','body'=>'Usuario o contraseña incorrecta']];
                
                return $this->response->withStatus(401, $msg['msg']['body'])
                ->withStringBody(json_encode(['status'=>'Error']));
            }            
        }
        throw new UnauthorizedException('Faltan permisos',401);  
    }

    public function logout()
{
   $this->Auth->logout();

   return $this->response->withType('application/json')
   ->withStringBody(json_encode(["status"=>"OK"
   ]));
    
}
}
  
