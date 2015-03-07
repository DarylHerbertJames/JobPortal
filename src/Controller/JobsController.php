<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Jobs Controller
 *
 * @property \App\Model\Table\JobsTable $Jobs
 */
class JobsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Categories']
        ];
        $this->set('jobs', $this->paginate($this->Jobs));
        $this->set('_serialize', ['jobs']);
    }

    /**
     * View method
     *
     * @param string|null $id Job id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => ['Users', 'Categories', 'Applications']
        ]);
        $this->set('job', $job);
        $this->set('_serialize', ['job']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $job = $this->Jobs->newEntity();
        if ($this->request->is('post')) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success('The job has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The job could not be saved. Please, try again.');
            }
        }
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        $categories = $this->Jobs->Categories->find('list', ['limit' => 200]);
        $this->set(compact('job', 'users', 'categories'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Job id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $job = $this->Jobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $job = $this->Jobs->patchEntity($job, $this->request->data);
            if ($this->Jobs->save($job)) {
                $this->Flash->success('The job has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The job could not be saved. Please, try again.');
            }
        }
        $users = $this->Jobs->Users->find('list', ['limit' => 200]);
        $categories = $this->Jobs->Categories->find('list', ['limit' => 200]);
        $this->set(compact('job', 'users', 'categories'));
        $this->set('_serialize', ['job']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Job id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $job = $this->Jobs->get($id);
        if ($this->Jobs->delete($job)) {
            $this->Flash->success('The job has been deleted.');
        } else {
            $this->Flash->error('The job could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
