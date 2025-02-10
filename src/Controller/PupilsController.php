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
    public function add($user_id)
    {
        $pupil = $this->Pupils->newEmptyEntity();
        if ($this->request->is('post')) {
            $pupil = $this->Pupils->patchEntity($pupil, $this->request->getData());

            $pupil->reference = GeneralController::generateReference('Pupils', 'DEP');
            $pupil->actived = 1;
            $amount = $this->request->getData('amount');
            $exempted = $this->request->getData('exempted');

            if ($this->Pupils->save($pupil)) {
                $this->Flash->success(__('The pupil has been saved.'));

                GeneralController::NewDependant($user_id, $pupil->id, $amount, $exempted,'Sabiduria');

                return $this->redirect(['controller' => 'users', 'action' => 'view', $user_id]);
            }
            $this->Flash->error(__('The pupil could not be saved. Please, try again.'));
        }
        $this->set(compact('pupil'));
    }

    public function add2()
    {
        $pupil = $this->Pupils->newEmptyEntity();
        if ($this->request->is('post')) {
            $pupil = $this->Pupils->patchEntity($pupil, $this->request->getData());

            $pupil->reference = GeneralController::generateReference('Pupils', 'DEP');
            $pupil->actived = 1;
            $amount = $this->request->getData('amount');
            $exempted = $this->request->getData('exempted');
            $parent_id = $this->request->getData('parent_id');

            if ($this->Pupils->save($pupil)) {
                $this->Flash->success(__('The pupil has been saved.'));

                GeneralController::NewDependant($parent_id, $pupil->id, $amount, $exempted,'Sabiduria');

                return $this->redirect(['controller' => 'users', 'action' => 'view', $parent_id]);
            }
            $this->Flash->error(__('The pupil could not be saved. Please, try again.'));
        }
        $parents = $this->fetchTable('Users')->find('list', limit: 200)->where(['profile_id' => 2]);
        $parents = $this->paginate($parents);
        $this->set(compact('pupil', 'parents'));
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
