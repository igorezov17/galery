<?php $this->layout('layout') ?>
<section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
          <div class="container">
            <h1 class="title">
              Самые минималистичные и элегантные обои для вашего рабочего стола!
            </h1>
            <h2 class="subtitle">
              Настроение и вдохновение в одном кадре.
            </h2>
          </div>
        </div>
      </section>
<div class="wrapper">
      <section class="section main-content">
        <div class="container">
          <div class="columns  is-multiline">
            <?php foreach ($images as $image): ?>
                <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <a href="<?php echo "show/" . $image['id']; ?>">
                      <!--<img src="<?php //echo ("../web/uploads/" . $image["image"]); ?>" alt="Placeholder image">-->
                      
                      <!--<img src="/web/uploads/1b5qsrurhq.jpg" alt="">-->
                      <!--<img src="../uploads/1.jpg" alt="">-->
                      <img src="<?php echo "../uploads/" . $image['image']; ?>" alt="">

                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                    <p class="title is-5"><a href="<?php echo "show/" . $image['id']; ?>">Природа</a></p>
                    </div>
                    <div class="media-right">
                      <p  class="is-size-7">Размер: 1280x760</p>
                      <time datetime="2016-1-1" class="is-size-7">Добавлено: 12.02.2018</time>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>

           <!-- <div class="column is-one-quarter">
              <div class="card">
                <div class="card-image">
                  <figure class="image is-4by3">
                    <a href="photo.html">
                      <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
                    </a>
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-left">
                    <p class="title is-5"><a href="category.html">Природа</a></p>
                    </div>
                    <div class="media-right">
                      <p  class="is-size-7">Размер: 1280x760</p>
                      <time datetime="2016-1-1" class="is-size-7">Добавлено: 12.02.2018</time>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            


          </div>
        </div>
      </section>
</div>
     