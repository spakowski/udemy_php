<?php
namespace App\Post;
use App\Core\AbstractController;
class CommentController extends AbstractController
{
    public function __construct (CommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        //$postsRepository = $container->make('postsRepository');
        $posts = $this->postsRepository->all();
        $this->render("post/index",[
            'posts'=>$posts
        ]);
        
    }

    public function showPost()
    {
        $id = $_GET["id"];
        $post = $this->postsRepository->find($id);
        $this->render("post/post",[
            'post'=>$post,
            'id'=>$id
        ]);
    }
}
?>