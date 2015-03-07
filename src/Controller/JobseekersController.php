<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobseekers Controller
 *
 * @property \App\Model\Table\JobseekersTable $Jobseekers
 */
class JobseekersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('jobseekers', $this->paginate($this->Jobseekers));
        $this->set('_serialize', ['jobseekers']);
    }

    /**
     * View method
     *
     * @param string|null $id Jobseeker id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $jobseeker = $this->Jobseekers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('jobseeker', $jobseeker);
        $this->set('_serialize', ['jobseeker']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $jobseeker = $this->Jobseekers->newEntity();
        if ($this->request->is('post')) {
            $jobseeker = $this->Jobseekers->patchEntity($jobseeker, $this->request->data);
            if ($this->Jobseekers->save($jobseeker)) {
                $this->Flash->success('The jobseeker has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The jobseeker could not be saved. Please, try again.');
            }
        }
        $users = $this->Jobseekers->Users->find('list', ['limit' => 200]);
        $this->set(compact('jobseeker', 'users'));
        $this->set('_serialize', ['jobseeker']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Jobseeker id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $jobseeker = $this->Jobseekers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $jobseeker = $this->Jobseekers->patchEntity($jobseeker, $this->request->data);
            if ($this->Jobseekers->save($jobseeker)) {
                $this->Flash->success('The jobseeker has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The jobseeker could not be saved. Please, try again.');
            }
        }
        $users = $this->Jobseekers->Users->find('list', ['limit' => 200]);
        $this->set(compact('jobseeker', 'users'));
        $this->set('_serialize', ['jobseeker']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Jobseeker id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $jobseeker = $this->Jobseekers->get($id);
        if ($this->Jobseekers->delete($jobseeker)) {
            $this->Flash->success('The jobseeker has been deleted.');
        } else {
            $this->Flash->error('The jobseeker could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
