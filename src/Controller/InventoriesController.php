<?php
namespace App\Controller;

use App\Controller\AppController;

use Cake\Datasource\ConnectionManager;

/**
 * Inventories Controller
 *
 *
 * @method \App\Model\Entity\Inventory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InventoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    { $this->paginate=array('limit'=>900);
        $inventories = $this->paginate($this->Inventories);

        $this->set(compact('inventories'));
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventories->get($id, [
            'contain' => []
        ]);

        $this->set('inventory', $inventory);
    }

    public function viewInventories()
    {    $bd = ConnectionManager::get('default');
        $query="(SELECT offices.id_office,cabinets.id_cabinet,toners.id_toner,printers.number_serie as number_printer,monitors.number_serie,laptops.id_laptop,monitors.id_monitor,printers.id_printer,rams.id_ram,microprocessors.id_microprocessor,motherboards.id_motherboard,disks.id_disk,offices.name_office,cabinets.name_computer,cabinets.ip_address,cabinets.name_cabinet,rams.capacity_ram,disks.capacity_disk, microprocessors.microprocessor,motherboards.name_motherboard,printers.name_printer,monitors.name_monitor FROM cabinets JOIN offices ON office_id=id_office 
        JOIN (rams,disks,microprocessors,motherboards) on (cabinets.ram_id=id_ram and cabinets.disk_id=id_disk and cabinets.microprocessor_id=id_microprocessor and motherboards.id_motherboard=cabinets.motherboard_id)
        LEFT JOIN printers on (printers.id_printer is null)
 		LEFT JOIN monitors on (monitors.id_monitor is null)
 		LEFT JOIN laptops on (laptops.id_laptop is null)
 		LEFT join toners on (toners.id_toner is null)
 	
 )
 UNION
 (SELECT offices.id_office,cabinets.id_cabinet,toners.id_toner,printers.number_serie as number_printer,monitors.number_serie,laptops.id_laptop,monitors.id_monitor,printers.id_printer,rams.id_ram,microprocessors.id_microprocessor,motherboards.id_motherboard,disks.id_disk,offices.name_office,cabinets.name_computer,cabinets.ip_address,laptops.name_laptop,rams.capacity_ram,disks.capacity_disk, microprocessors.microprocessor,motherboards.name_motherboard, printers.name_printer,monitors.name_monitor FROM laptops  JOIN offices ON (laptops.office_id=offices.id_office)
left JOIN (rams,disks) on (laptops.ram_id=id_ram and laptops.disk_id=id_disk)
 LEFT JOIN microprocessors ON (microprocessors.id_microprocessor is null)
left JOIN motherboards on (motherboards.id_motherboard is null)
  left join printers on (printers.id_printer is null)
  LEFT JOIN monitors on (monitors.id_monitor is null) 
  LEFT JOIN cabinets ON (cabinets.name_computer is null AND cabinets.ip_address is null)
  LEFT join toners on (toners.id_toner is null)
 )
UNION 
(SELECT  offices.id_office,cabinets.id_cabinet,toners.id_toner,printers.number_serie as number_printer,monitors.number_serie,laptops.id_laptop,monitors.id_monitor,printers.id_printer,rams.id_ram,microprocessors.id_microprocessor,motherboards.id_motherboard,disks.id_disk,offices.name_office,cabinets.name_computer,cabinets.ip_address,laptops.name_laptop,rams.capacity_ram,disks.capacity_disk, microprocessors.microprocessor,motherboards.name_motherboard, printers.name_printer,monitors.name_monitor FROM printers JOIN offices on (printers.office_id=offices.id_office)
 	 LEFT JOIN microprocessors ON (microprocessors.id_microprocessor is null)
 LEFT JOIN disks on (disks.id_disk is null)
 LEFT JOIN rams on (rams.id_ram is null)
left JOIN motherboards on (motherboards.id_motherboard is null)
LEFT JOIN cabinets on (cabinets.ip_address is null AND cabinets.name_computer is null)
 LEFT JOIN laptops on (laptops.id_laptop is null)
 left join monitors on (monitors.id_monitor is null)
 LEFT join toners on (printers.toner_id=toners.id_toner)
)  
UNION
(SELECT  offices.id_office,cabinets.id_cabinet,toners.id_toner,printers.number_serie as number_printer,monitors.number_serie,laptops.id_laptop,monitors.id_monitor,printers.id_printer,rams.id_ram,microprocessors.id_microprocessor,motherboards.id_motherboard,disks.id_disk,offices.name_office,cabinets.name_computer,cabinets.ip_address,laptops.name_laptop,rams.capacity_ram,disks.capacity_disk, microprocessors.microprocessor,motherboards.name_motherboard, printers.name_printer,monitors.name_monitor FROM (monitors) JOIN offices on (monitors.office_id=offices.id_office)
 	 LEFT JOIN microprocessors ON (microprocessors.id_microprocessor is null)
 LEFT JOIN disks on (disks.id_disk is null)
 LEFT JOIN rams on (rams.id_ram is null)
left JOIN motherboards on (motherboards.id_motherboard is null)
LEFT JOIN cabinets on (cabinets.ip_address is null AND cabinets.name_computer is null)
 LEFT JOIN laptops on (laptops.id_laptop is null)
LEFT JOIN printers on (printers.id_printer is null)
 LEFT join toners on (toners.id_toner is null)
) 
ORDER BY `id_office` ASC";

        
        $inventarios=$bd->query($query)->fetchAll('assoc');

        $this->set([
            'inventarios'=>$inventarios,
            '_serialize'=>['inventarios']
        ]);
    }
   
  
    
   

  

    


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventories->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->getData());
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
        }
        $this->set(compact('inventory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
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
     * @param string|null $id Inventory id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inventory = $this->Inventories->get($id);
        if ($this->Inventories->delete($inventory)) {
            $this->Flash->success(__('The inventory has been deleted.'));
        } else {
            $this->Flash->error(__('The inventory could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
