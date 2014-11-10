<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form');

    public $components = array('Session');

    public $uses = array('Post','Category');

    public function beforeFilter(){
        parent::beforeFilter();

        $this->layout = 'changePractice';
    }

    public function index() {
    	$posts = $this->Post->find('all');

        //Categoryモデルを使ってデータを取得
        $categories = $this->Category->find('all');

    	$this->set(compact('posts','categories'));

        //$this->set('posts', $this->Post->find('all'));
    }

    public function category_index($category_id = null) {
        $posts = $this->Post->find('all',array('conditions' => array('category_id' => $category_id)));

        //Categoryモデルを使ってデータを取得
        $categories = $this->Category->find('all');

        $this->set(compact('posts','categories'));

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