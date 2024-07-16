<?php

namespace App;
use database\Database;



class Home
{

  public   function redirectBack()
  {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  public function index(){

    $db = new Database();
    $setting = $db->select('SELECT * FROM settings')->fetch();


    $menus = $db->select('SELECT * FROM menus WHERE parent_id IS NULL')->fetchAll();


    $topSelectPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comment WHERE comment.post_id = posts.id) as comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts WHERE posts.selected = 1 ORDER BY created_at DESC LIMIT 0,3')->fetchAll();



    $lastPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comment WHERE comment.post_id = posts.id) as comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY created_at DESC LIMIT 0,6')->fetchAll();



    $popularPost = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comment WHERE comment.post_id = posts.id) as comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY view DESC LIMIT 0,3')->fetchAll();


    $mostCommentPosts = $db->select('SELECT posts.*, (SELECT COUNT(*) FROM comment WHERE comment.post_id = posts.id) as comment_count, (SELECT username FROM users WHERE users.id = posts.user_id) as username , (SELECT name FROM categories WHERE categories.id = posts.cat_id) as category FROM posts ORDER BY comment_count DESC LIMIT 0,4')->fetchAll();

    $banners = $db->select('SELECT * FROM banner LIMIT 0,2')->fetchAll();


    $beakingNews = $db->select('SELECT * FROM posts WHERE breaking_news = 1 ORDER BY created_at DESC LIMIT 0,1')->fetch();
    
    

    require_once (BASE_PATH . '/template/app/index.php');

  }

  public function show($id){

  }

  public function category($id){



  }

  public function commentStore(){

  }


  


}
