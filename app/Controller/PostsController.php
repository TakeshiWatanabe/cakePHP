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

        //選択されたカテゴリーのデータを取得しておく
        $selectedCategory = $this->Category->find('all',array('conditions' => array('id' => $category_id)));


        //Categoryモデルを使ってデータを取得
        $categories = $this->Category->find('all');

        $this->set(compact('posts','categories','selectedCategory'));

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
            
            //idでファイル名を作成

            $last_id = $this->Post->getLastInsertID();

            $new_file_name = 'P'.str_pad($last_id, 5, "0", STR_PAD_LEFT);

            if (is_uploaded_file($this->request->data['Post']['upfile']['tmp_name'])) {
              if (move_uploaded_file($this->request->data['Post']['upfile']['tmp_name'], '/var/www/html/cakephp/app/webroot/files/'.$new_file_name)) {
                //chmod('/cakephp/files/'. $this->request->data['Post']['upfile']['name'], 0644);
                echo 'アップロードしました。';
              } else {
                echo 'ファイルをアップロードできません。';
              }
            } else {
              echo 'ファイルが選択されていません。';
            }



            $this->Session->setFlash(__('Unable to add your post.'));
        }        
    }
}
?>