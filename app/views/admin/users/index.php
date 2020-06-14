<?php $this->layout('admin/layout'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content container-fluid">

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Админ-панель</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="">
            <div class="box-header">
              <h2 class="box-title">Все пользователи</h2>
            </div>
            <!-- /.box-header -->
            <?php echo flash(); ?>
            <div class="box-body">
              <a href="/admin/users/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Роль</th>
                    <th>Аватар</th>
                    <th>Статус</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $user): ?>
                  <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>Обычный пользователь</td>
                    <td>
                      <img src="<?php echo "/uploads/" . $user['image']; ?>" width="200" alt="">
                    </td>
                          <?php if ($user['status'] == 0)
                          { ?>
                            <td>
                            <form action="/admin/users/<?php echo $user['id'] ?>/role" method="POST">
                                  <button type="submite" name="name" value="activ" class="btn btn-success">Активный</></button>
                              </form>
                            </td>
                          <?php } else if ($user['status'] == 1) {?>
                            <td>

                              <form action="/admin/users/<?php echo $user['id'] ?>/role" method="POST">
                                    <button type="submite" name="name" value="ban" class="btn btn-danger">Бан</></button>
                              </form>
                            </td>
                         <?php  } else if ($user['status'] == 2) {?>
                            <td>

                          <form action="#" method="POST">
                                <button type="submite" name="name" value="ban" class="btn btn-warning">Админ</></button>
                          </form>
                          </td>
                         <?php } ?>

                    <td>

                      <a href="/admin/users/<?php echo $user['id']; ?>/edit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="/admin/users/<?php echo $user['id']; ?>/delete" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                        <i class="fa fa-remove"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>

        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 