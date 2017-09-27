<pre><?php


function autoload($className)
{
  $prefix = "App";
  $dir = "./src";

  $clss = str_replace ("\\","/", substr($className,strlen($prefix)));


  $className = str_replace("\\","/",$className);
  if (file_exists("{$dir}{$clss}.php"))
  {
    require "{$dir}{$clss}.php";
  }
}

spl_autoload_register("autoload");


$post = new App\Blog\Post();
var_dump($post);
$post3 = new App\Blos\Post();

$post2 = new App\Forum\Post();
var_dump($post2);



$h = new App\Blog\Post();
var_dump($h);


?>
</pre>
