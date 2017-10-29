<?php
namespace App\Core;

use PDO;
use Exception, PDOException;
use App\post\PostsRepository;
use App\post\PostsController;
use App\post\CommentsRepository;
class Container
{
    private $receipts = [];
    private $instances = [];

    public function __construct()
    {
        
        {$this->receipts = [
            'postsRepository' => function() {
                return new PostsRepository (
                    $this->make("pdo")
                );
            },
            'commentsRepository' => function(){
                return new CommentsRepository(
                    $this->make("pdo")
                );
            },
            'pdo' => function() {
                try{
                    $pdo = new PDO(
                        'mysql:host=localhost;dbname=test;charset=utf8',  //mssql Statement
                        'blog',                                           //User
                        'TX4LQBEzfZfVqnLV'                                //Passwort
                    );
                    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    return $pdo;
                } catch (PDOException $e){
                    echo "Achtung Fehler: Datenbankverbindung fehlgeschlagen";
                    die();
                }
            },
            'postsController' => function()
            {
                return new PostsController(
                    $this->make('postsRepository'),
                    $this->make('commentsRepository')
                );
            }
        ];}
        
    }
    
    
    public function make ($name)
    {
        //FallsVorhanden zurückgeben
        if (!empty($this->instances[$name]))
        {
            return $this->instances[$name];
        }
        //Falls nicht, Erzeugen
        if (isset($this->receipts[$name])){
            $this->instances[$name] = $this->receipts[$name]();
            return $this->instances[$name];
        }

        return null;

    }
}
?>