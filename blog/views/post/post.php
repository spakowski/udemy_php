<?php include __DIR__."/../layout/header.php"; ?>
<br>
<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title"><?php echo $post->title; ?></h2>
  </div>
  <div class="panel-body">
   <?php echo nl2br($post->content); ?>
  </div>
 </div>

 <ul class="list-group">
   <?php foreach ($comments AS $comment): ?>
      <li class="list-group-item">
       <?php echo encode($comment->content) ?>
      </li>
<?php endforeach; ?>
</ul>

<form method="POST" action="post?id=<?php echo $post['id'];?>">
  <textarea name="commentContent" class="form-control"></textarea>
  <br />
  <input type="submit" value="Kommentar verfassen" class="btn btn-primary" />
</form>
<br />
<br />
<br />
<?php include __DIR__."/../layout/footer.php"; ?>