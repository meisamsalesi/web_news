<?php







namespace Admin;

use database\Database;

// use Admin\Admin;
class Websetting extends Admin
{

  public function index()
  {

        $db = new DataBase();
        $settings = $db->select('SELECT * FROM settings')->fetch();
        require_once (BASE_PATH . '/template/admin/websettings/index.php');
  }

  public function edit($id)
  {
    $db = new DataBase();
    $settings = $db->select('SELECT * FROM settings')->fetch();
    require_once (BASE_PATH . '/template/admin/websettings/edit.php');

  }
  public function update($request)
  {

    $db = new DataBase();
    $setting = $db->select('SELECT * FROM settings')->fetch();
    if ($request['logo']['tmp_name'] != '') {


      $request['logo'] = $this->saveImage($request['logo'], 'setting', 'logo');

    } else {

      unset($request['logo']);
    }
    if ($request['icon']['tmp_name'] != '') {


      $request['icon'] = $this->saveImage($request['icon'], 'setting', 'icon');

    } else {

      unset($request['icon']);
    }
    if (!empty($setting)) {

      $db->update('settings', $setting['id'], array_keys($request), $request);
    } else {
      $db->insert('settings', array_keys($request), $request);
    }
    $this->redirect('admin/websetting');

  }


}