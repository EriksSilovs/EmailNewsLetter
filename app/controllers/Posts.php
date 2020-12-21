<?php
class Posts extends Controller {
    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $posts = $this->postModel->findAllPosts();

        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    // responds for DESC or ASC in emails or date (index = default = data = asc)
    public function DateDEC() {
        $posts = $this->postModel->orderByDateDESC();

        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
    public function EmailDEC() {
        $posts = $this->postModel->orderByEmailDESC();

        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
    public function EmailASC() {
        $posts = $this->postModel->orderByEmailASC();

        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    
    public function delete($id) {
        $post = $this->postModel->findPostById($id);

        $data = [
            'post' => $post,
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($this->postModel->deletePost($id)) {
                    header("Location: " . URLROOT . "/posts");
            } else {
               die('Something went wrong!');
            }
        }
    }
}