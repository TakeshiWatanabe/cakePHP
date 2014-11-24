<?php
class GroupsController extends AppController {


    public $uses = array('Group','User');

    public function index(){
        $groups = $this->Group->find('all');

        $users = $this->User->find('all');

        $this->set(compact('groups','users'));
    }
    public function view($id) {
        $Users = $this->User->find('all');
        $this->set(compact('Users'));
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $group = $this->Group->findById($id);
        if (!$group) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('group', $group);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Group->create();
            if ($this->Group->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow();
}
}