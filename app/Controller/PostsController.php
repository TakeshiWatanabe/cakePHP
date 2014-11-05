<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');

    public function beforeFilter(){
        parent::beforeFilter();

        $this->layout = 'changePractice';
    }

    public function index() {
    	$posts = $this->Post->find('all');

    	$this->set(compact('posts'));

        //$this->set('posts', $this->Post->find('all'));
    }


    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('post', $post);
    }

    public function add(){
        //$this->layout = 'changePractice';

        if ($this->request->is('post')) {
            $this->Post->create();
            debug($this->request->data);
            if ($this->Post->save($this->request->data)) {
                $this->Session->setFlash(__('Your post has been saved.'));
                //return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your post.'));
        }        
    }
}
?>