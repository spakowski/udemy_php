<?php
namespace App\Post;
use App\Core\AbstractController;
class PostsController extends AbstractController
{
    public function __construct (
        PostsRepository $postsRepository,
        CommentsRepository $commentsRepository)
    {
        $this->postsRepository = $postsRepository;
        $this->commentsRepository = $commentsRepository;
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
        
        if (isset($_POST['commentContent'])) {
            $commentContent=$_POST['commentContent'];
            $this->commentsRepository->postComment($id, $commentContent);
        }
        
        $post = $this->postsRepository->find($id);
        $comments = $this->commentsRepository->allPostComments($id);
        $this->render("post/post",[
            'post' => $post,
            'comments'=>$comments
        ]);
    }
}
?>