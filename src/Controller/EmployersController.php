<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * Employers Controller
 *
 * @property \App\Model\Table\EmployersTable $Employers
 */
class EmployersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'register']);
    }

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
        $this->set('employers', $this->paginate($this->Employers));
        $this->set('_serialize', ['employers']);
    }

    /**
     * View method
     *
     * @param string|null $id Employer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employer = $this->Employers->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('employer', $employer);
        $this->set('_serialize', ['employer']);
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employer = $this->Employers->newEntity();
        if ($this->request->is('post')) {
            $employer = $this->Employers->patchEntity($employer, $this->request->data);
            if ($this->Employers->save($employer)) {
                $this->Flash->success('The employer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The employer could not be saved. Please, try again.');
            }
        }
        $users = $this->Employers->Users->find('list', ['limit' => 200]);
        $this->set(compact('employer', 'users'));
        $this->set('_serialize', ['employer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employer = $this->Employers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employer = $this->Employers->patchEntity($employer, $this->request->data);
            if ($this->Employers->save($employer)) {
                $this->Flash->success('The employer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The employer could not be saved. Please, try again.');
            }
        }
        $users = $this->Employers->Users->find('list', ['limit' => 200]);
        $this->set(compact('employer', 'users'));
        $this->set('_serialize', ['employer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employer = $this->Employers->get($id);
        if ($this->Employers->delete($employer)) {
            $this->Flash->success('The employer has been deleted.');
        } else {
            $this->Flash->error('The employer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
