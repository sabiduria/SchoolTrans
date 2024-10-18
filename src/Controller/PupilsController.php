<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Pupils Controller
 *
 * @property \App\Model\Table\PupilsTable $Pupils
 */
class PupilsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Pupils->find();
        $pupils = $this->paginate($query);

        $this->set(compact('pupils'));
    }

    /**
     * View method
     *
     * @param string|null $id Pupil id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pupil = $this->Pupils->get($id, contain: ['Dependants']);
        $this->set(compact('pupil'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pupil = $this->Pupils->newEmptyEntity();
        if ($this->request->is('post')) {
            $pupil = $this->Pupils->patchEntity($pupil, $this->request->getData());
            if ($this->Pupils->save($pupil)) {
                $this->Flash->success(__('The pupil has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pupil could not be saved. Please, try again.'));
        }
        $this->set(compact('pupil'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pupil id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pupil = $this->Pupils->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pupil = $this->Pupils->patchEntity($pupil, $this->request->getData());
            if ($this->Pupils->save($pupil)) {
                $this->Flash->success(__('The pupil has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pupil could not be saved. Please, try again.'));
        }
        $this->set(compact('pupil'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pupil id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pupil = $this->Pupils->get($id);
        if ($this->Pupils->delete($pupil)) {
            $this->Flash->success(__('The pupil has been deleted.'));
        } else {
            $this->Flash->error(__('The pupil could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
