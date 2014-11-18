<?php
class UsersController extends AppController {

    public $uses = array('User','Group');

    public function index(){
        $groups = $this->Group->find('all');

        $users = $this->User->find('all');

        $this->set(compact('groups','users'));
    }

    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('user', $user);
    }

    public function add() {
        $Groups = $this->Group->find('list');
        $this->set(compact('Groups'));
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

    public function admin_login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash('Your username or password was incorrect.');
            }
        }
    }

    public function logout() {
        $this->Auth->logout();
    }
    function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow();
}
}