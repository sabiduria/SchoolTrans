<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dependants Controller
 *
 * @property \App\Model\Table\DependantsTable $Dependants
 */
class DependantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Dependants->find()
            ->contain(['Users', 'Pupils']);
        $dependants = $this->paginate($query);

        $this->set(compact('dependants'));
    }

    /**
     * View method
     *
     * @param string|null $id Dependant id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dependant = $this->Dependants->get($id, contain: ['Users', 'Pupils', 'Payments', 'Transports']);
        $this->set(compact('dependant'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dependant = $this->Dependants->newEmptyEntity();
        if ($this->request->is('post')) {
            $dependant = $this->Dependants->patchEntity($dependant, $this->request->getData());
            if ($this->Dependants->save($dependant)) {
                $this->Flash->success(__('The dependant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependant could not be saved. Please, try again.'));
        }
        $users = $this->Dependants->Users->find('list', limit: 200)->all();
        $pupils = $this->Dependants->Pupils->find('list', limit: 200)->all();
        $this->set(compact('dependant', 'users', 'pupils'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dependant id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dependant = $this->Dependants->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dependant = $this->Dependants->patchEntity($dependant, $this->request->getData());
            if ($this->Dependants->save($dependant)) {
                $this->Flash->success(__('The dependant has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dependant could not be saved. Please, try again.'));
        }
        $users = $this->Dependants->Users->find('list', limit: 200)->all();
        $pupils = $this->Dependants->Pupils->find('list', limit: 200)->all();
        $this->set(compact('dependant', 'users', 'pupils'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dependant id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dependant = $this->Dependants->get($id);
        if ($this->Dependants->delete($dependant)) {
            $this->Flash->success(__('The dependant has been deleted.'));
        } else {
            $this->Flash->error(__('The dependant could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
