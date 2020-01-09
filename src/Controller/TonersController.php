<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

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
    {      $bd = ConnectionManager::get('default');
            $query="SELECT types_toners.id_type as id_type,toners.id_toner,toners.toner_model,types_toners.type,toners.quantity,toners.description FROM toners LEFT JOIN types_toners on toners.type_id=types_toners.id_type";
    
            
            $toners=$bd->query($query)->fetchAll('assoc');
    
            $this->set([
                'toners'=>$toners,
                '_serialize'=>['toners']
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
    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $toner2 = $this->Toners->get($id);
        
        $toner = $this->Toners->patchEntity($toner2, $this->request->getData());
     
        if ($this->Toners->save($toner)) {
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
     * @param string|null $id Toner id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $departure = $this->Toners->get($id);
        $message = 'Deleted';
        if (!$this->Toners->delete($departure)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }


    public function viewquantity()
    { 
        $bd = ConnectionManager::get('default');

        
        $query="(SELECT * FROM `toners` WHERE quantity !=0)";

       
         $toners=$bd->query($query)->fetchAll('assoc');

        $this->set([
            'toners'=>$toners,
            '_serialize'=>['toners']
        ]);
    
    }

    public function viewModel($model)
    { 
        $recipe = $this->Toners->find()->where(['toner_model'=>$model]);
        $this->set([
            'model' => $recipe,
            '_serialize' => ['model']
        ]);

    
    }
}
