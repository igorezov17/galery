<?php $this->layout('admin/layout') ?>
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
              <h2 class="box-title">Все новости</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="/admin/news/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Содержание</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($news as $new): ?>
                  <tr>
                    <td><?php echo $new['id']; ?></td>
                    <td><?php echo $new['title']; ?></td>
                    <td><?php echo $new['description']; ?></td>
                    <td>

                      <a href="/admin/news/edit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="/admin/news/create" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                        <i class="fa fa-remove"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                 
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Соедржание</th>
                    <th>Действия</th>
                  </tr>
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

  