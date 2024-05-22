<?php


namespace Admin;

use database\Database;


// use Admin\Admin;
class Comment extends Admin
{

  public function index()
  {
    $db = new DataBase();
    $comments = $db->select('SELECT comment.* ,posts.title AS post_name  , users.email AS user_email FROM ((comment LEFT JOIN posts ON comment.post_id = posts.id) LEFT JOIN users ON comment.user_id = users.id )  ORDER BY `id` DESC');
    $unseenComment = $db->select("SELECT * FROM comment WHERE status = ?;", ['unseen'])->fetch();
    if($unseenComment != false){
    foreach ($unseenComment as $comment) {

      $db->update('comment', $comment, ['status'], ['seen']);

    }
  }
    require_once (BASE_PATH . '/template/admin/comments/index.php');
  }



  public function changeStatus($id){

    $db = new Database();
    $comment = $db->select("SELECT * FROM comment WHERE id = ?;", [$id])->fetch();
    if (empty($comment)) {
      $this->redirectback();
    }
    $comment['status'] == 'seen' ? $db->update('comment', $id, ['status'], ['approved']): $db->update('comment', $id, ['status'], ['seen']);

    $this->redirectback();

  }


  }

