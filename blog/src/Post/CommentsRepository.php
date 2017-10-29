<?php
namespace App\Post;
use App\Core\AbstractRepository;
use PDO;

class CommentsRepository extends AbstractRepository
{
    public function getTableName()
    {
        return "comments";
    }

    public function getModelName()
    {
        return "App\\Post\\CommentModel";
    }
    public function allPostComments($post_id)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        
        $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE post_id = :pid");
        $stmt->execute(['pid' => $post_id]);
        
        $allPostComments = $stmt->fetchAll(PDO::FETCH_CLASS, $model);

      return $allPostComments;
    }
    public function postComment ($post_id, $comment)
    {
        $table = $this->getTableName();
        $model = $this->getModelName();
        
        try{
            $stmt = $this->pdo->prepare("INSERT INTO `$table` (`id`, `content`, `post_id`) VALUES (NULL, :comment, :pid);");
            $htmlComment = encode($comment, ENT_QUOTES, 'UTF-8');
            $stmt->execute([
                'comment'=>$htmlComment, 
                'pid' => $post_id]
            );
        }catch (Exception $e) {die ("Kommentar eintragen ist nicht möglich");}
            return TRUE;
    }
    

}

?>