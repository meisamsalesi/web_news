<?php

require_once (BASE_PATH . '/template/admin/layouts/header.php');


?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottombanners">
    <h1 class="h5banners"><i class="fas fa-imagebanners"></i> Banner</h1>
    <div class="btn-toolbar mb-2 mb-md-0banners">
        <a role="buttonbanners" href="<?= url('admin/banner/create')?>" class="btn btn-sm btn-successbanners">create</a>
        </div>
    </div>
    <div class="table-responsivebanners">
        <table class="table table-striped table-smbanners">
            <caption>List of banners</caption>
            <thead>
                <tr>
                    <th>#</th>
                    <th>url</th>
                    <th>image</th>
                    <th>setting</th>
                </tr>
            </thead>
            <tbody>
              <?php 
              
              foreach($banners as $banner) {

              ?>
                <tr>
                    <td>
                        <?= $banner['id']?>
                      </td>
                    <td>
                        <?= $banner['url']?>
                      </td>
                    <td><img style="width: 80px;banners" src="<?= asset($banner['image'])?>" alt="banners"></td>
                    <td>
                        <a role="buttonbanners" class="btn btn-sm btn-primary text-whitebanners" href="<?= url('admin/banner/edit/' . $banner['id'])?>">edit</a>
                        <a role="buttonbanners" class="btn btn-sm btn-danger text-whitebanners" href="<?= url('admin/banner/delete/' . $banner['id'])?>">delete</a>
                    </td>
                </tr>
                <?php 
              }
                ?>
            </tbody>

        </table>
    </div>

    <?php

require_once (BASE_PATH . '/template/admin/layouts/footer.php');


?>