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

    
    
    require_once (BASE_PATH . '/template/admin/dashboard/index.php');


  }



}