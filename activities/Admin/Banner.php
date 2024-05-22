<?php







namespace Admin;

use database\Database;

// use Admin\Admin;
class Banner extends Admin
{

  public function index()
  {
    $db = new DataBase();
    $banners = $db->select('SELECT * FROM banner ORDER BY `id` DESC');
    require_once (BASE_PATH . '/template/admin/banners/index.php');
  }

  public function create()
  {
    require_once (BASE_PATH . '/template/admin/banners/create.php');
  }

  public function store($request)
  {
    
    $db = new Database();
      $request['image'] = $this->saveImage($request['image'], 'banners-image');

      if ($request['image']) {

        $db->insert('banner', array_keys($request), $request);
        $this->redirect('admin/banner');


      } else {

        $this->redirect('admin/banner');

      }

    $db = new Database();
    $db->insert('banners', array_keys($request), $request);
    $this->redirect('admin/banner');

  }

  public function edit($id)
  {
    $db = new DataBase();
    $banner = $db->select("SELECT * FROM banner WHERE id = ?;", [$id])->fetch();
    require_once (BASE_PATH . '/template/admin/banners/edit.php');

  }
  public function update($request, $id)
  {

    $db = new DataBase();
    if ($request['image']['tmp_name'] != null) {
      $banner = $db->select("SELECT * FROM banner WHERE id = ?;", [$id])->fetch();
      $this->removeImage($banner['image']);
      $request['image'] = $this->saveImage($request['image'], 'banners-image');

    } else {

      unset($request['image']);
    }
    $db->update('banner', $id, array_keys($request), $request);
    $this->redirect('admin/banner');

  }
  public function delete($id)
  {

    $db = new Database();
    $banner = $db->select("SELECT * FROM banner WHERE id = ?;", [$id])->fetch();
    $this->removeimage($banner['image']);
    $db->delete('banner', $id);
    $this->redirectback();

  }

}