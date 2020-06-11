<?php $this->layout('layout'); 
/*header ('Content-type: text/html; charset=utf-8');
print_r($str);*/
?>
<section class="hero is-primary">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Что происходит в мире
            </h1>

          </div>
        </div>
      </section>
      <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"><h3>Новости</h3></div>
                            <?php foreach ($news as $new): ?> 
                            <div class="card-body">
                                  <div class="media">

                                  <div class="media-body">
                                    <h5 class="mt-0"><?php echo $new['title']; ?></h5> 
                                    <span><small><?php echo $new['date']; ?></small></span>
                                    <p><img src="<?php echo "../uploads/" . $new['image']; ?>" class="mr-3" alt="..." width="400" height="400"></p>
                                    <p>
                                    <?php echo $new['description']; ?>
                                    </p>
                                  </div>
                                </div>
                                </div>
                            <?php endforeach; ?>
                                
                          </div>
                      </div>
                      </div>
                    </div>
                </div>
              </div>
        </main>

          </div>
        </div>
      </section>