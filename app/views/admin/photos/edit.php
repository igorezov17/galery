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
            <?php dd($imgC); ?>
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
              <h2 class="box-title">Изменить изображение</h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <form action="" action="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="Мой любимый город">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Краткое описание</label>
                        <textarea class="form-control" name="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, sit.</textarea>
                      </div>

                      <div class="form-group">
                        <label>Категория</label>
                        <select class="form-control select2" style="width: 100%;">
                          <option>Города</option>
                          <option>Компьютеры</option>
                          <option>Животные</option>
                          <option selected="selected">Абстракция</option>
                          <option>Небо</option>
                          <option>Деревья</option>
                          <option>Шарики</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Изображение</label>
                        <input type="file"> <br>
                        <img src="../assets/img/photo1.png" width="200" alt="">
                      </div>

                      <div class="form-group">
                        <button class="btn btn-warning">Изменить</button>
                      </div>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            По вопросам к главному администратору.
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

