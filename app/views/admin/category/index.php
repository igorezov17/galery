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
              <h2 class="box-title">Все категории</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="/admin/category/create" class="btn btn-success btn-lg">Добавить</a> <br> <br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  
                  <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Пост</th>
                    <th>Действия</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
                  <tr>
                    <td>1</td>
                    <td>Mercedes</td>
                    <td>Публике придставили новое поколение</td>
                    <td>

                      <a href="/admin/category/<?php echo $category['id']; ?>/edit" class="btn btn-warning">
                        <i class="fa fa-pencil"></i>
                      </a>
                      <a href="#" class="btn btn-danger" onclick="return confirm('Вы уверены?');">
                        <i class="fa fa-remove"></i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box-body -->

        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
 