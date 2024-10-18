<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Transports Controller
 *
 * @property \App\Model\Table\TransportsTable $Transports
 */
class TransportsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Transports->find()
            ->contain(['Assignments', 'Dependants']);
        $transports = $this->paginate($query);

        $this->set(compact('transports'));
    }

    /**
     * View method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transport = $this->Transports->get($id, contain: ['Assignments', 'Dependants']);
        $this->set(compact('transport'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transport = $this->Transports->newEmptyEntity();
        if ($this->request->is('post')) {
            $transport = $this->Transports->patchEntity($transport, $this->request->getData());
            if ($this->Transports->save($transport)) {
                $this->Flash->success(__('The transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transport could not be saved. Please, try again.'));
        }
        $assignments = $this->Transports->Assignments->find('list', limit: 200)->all();
        $dependants = $this->Transports->Dependants->find('list', limit: 200)->all();
        $this->set(compact('transport', 'assignments', 'dependants'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transport = $this->Transports->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transport = $this->Transports->patchEntity($transport, $this->request->getData());
            if ($this->Transports->save($transport)) {
                $this->Flash->success(__('The transport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transport could not be saved. Please, try again.'));
        }
        $assignments = $this->Transports->Assignments->find('list', limit: 200)->all();
        $dependants = $this->Transports->Dependants->find('list', limit: 200)->all();
        $this->set(compact('transport', 'assignments', 'dependants'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transport id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transport = $this->Transports->get($id);
        if ($this->Transports->delete($transport)) {
            $this->Flash->success(__('The transport has been deleted.'));
        } else {
            $this->Flash->error(__('The transport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
