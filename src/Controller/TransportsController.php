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

        $assignments = $this->Transports->Assignments->find('list', keyField: 'id', valueField: 'driver_id')
            ->limit(200)
            ->toArray();

        // Map the list to use getDependantName($id)
        $assignments = array_map(function ($driver_id) {
            return GeneralController::getNameOf($driver_id, 'Drivers');
        }, $assignments);

        $dependants = $this->Transports->Dependants->find('list', keyField: 'id', valueField: 'id')
            ->limit(200)
            ->toArray();

        // Map the list to use getDependantName($id)
        $dependants = array_map(function ($id) {
            return GeneralController::getDependentName($id);
        }, $dependants);
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

        $assignments = $this->Transports->Assignments->find('list', keyField: 'id', valueField: 'driver_id')
            ->limit(200)
            ->toArray();

        // Map the list to use getDependantName($id)
        $assignments = array_map(function ($driver_id) {
            return GeneralController::getNameOf($driver_id, 'Drivers');
        }, $assignments);

        $dependants = $this->Transports->Dependants->find('list', keyField: 'id', valueField: 'id')
            ->limit(200)
            ->toArray();

        // Map the list to use getDependantName($id)
        $dependants = array_map(function ($id) {
            return GeneralController::getDependentName($id);
        }, $dependants);
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

    public function messages()
    {
        // Call the get_message function to retrieve the JSON response
        $response = GeneralController::get_message();

        // If the response is not empty, decode the JSON and populate the table
        if ($response) {
            $sent_messages = json_decode($response, true);
        } else {
            echo "No data received from the API.";
            exit;
        }

        // Filter messages by specific sender (e.g., "SAMU")
        $sender_filter = "SAMU"; // Replace with the sender you're interested in
        $filtered_messages = array_filter($sent_messages, function($message) use ($sender_filter) {
            return $message['from'] == $sender_filter;
        });

        $this->set(compact('filtered_messages'));
    }
}
