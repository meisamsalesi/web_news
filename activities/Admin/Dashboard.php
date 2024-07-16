<?php


namespace Admin;

use database\Database;


// use Admin\Admin;
class Dashboard extends Admin
{

  public function index()
  {

    $db = new Database();
    $categoryCount = $db->select('SELECT COUNT(*) FROM categories')->fetch();
    $adminCount = $db->select('SELECT COUNT(*) FROM users WHERE permission = "admin"')->fetch();
    $userCount = $db->select('SELECT COUNT(*) FROM users WHERE permission = "user"')->fetch();
    $postCount = $db->select('SELECT COUNT(*) FROM posts')->fetch();
    $postsViews = $db->select('SELECT SUM(view) FROM posts')->fetch();
    $commentCount = $db->select('SELECT COUNT(*) FROM comment')->fetch();
    $commentUnseenCount = $db->select('SELECT COUNT(*) FROM comment WHERE status = "unseen"')->fetch();
    $commentApprovedCount = $db->select('SELECT COUNT(*) FROM comment WHERE status = "approved"')->fetch();

    $mostViewPosts = $db->select('SELECT * FROM posts ORDER BY view DESC LIMIT 0,5')->fetchAll();

    $mostCommentedPosts = $db->select('SELECT posts.id , posts.title , COUNT(comment.post_id) as comment_count FROM posts LEFT JOIN comment ON posts.id = comment.post_id GROUP BY posts.id ORDER BY comment_count DESC LIMIT 0,5')->fetchAll();

    $lastComments = $db->select('SELECT comment.id , comment.comment, comment.status , users.username FROM comment,users WHERE comment.user_id = users.id ORDER BY comment.created_at DESC LIMIT 0,5')->fetchAll();

    
    
    
    require_once (BASE_PATH . '/template/admin/dashboard/index.php');


  }



}