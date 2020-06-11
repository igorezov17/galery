<?php $this->layout('layout'); ?>


        <div class="columns">
            <div class="column">
              <div class="tabs is-centered pt-100">
                <ul>
                  <li>
                    <a href="/profile/info?>">
                      <span class="icon is-small"><i class="fas fa-user"></i></span>
                      <span>Основная информация</span>
                    </a>
                  </li>
                  <li class="is-active">
                    <a href="/profile/security">
                      <span class="icon is-small"><i class="fas fa-lock"></i></span>
                      <span>Безопасность</span>
                    </a>
                  </li>
                </ul>

              </div>
              <div class="is-clearfix"></div>
                <div class="columns is-centered">
                  <div class="column is-half">
                  <?php echo flash(); ?>
                  <form type="text" action="/profile/postSecurity" method="POST">
                    <div class="field">
                      <label class="label">Текущий пароль</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" name="password">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                      <label class="label">Новый пароль</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" name="new_password">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                      <label class="label">Повторите пароль</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="password" name="second_new_password">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="control">
                      <button class="button is-link">Обновить</button>
                    </div>
                  </div>
</form>
                </div>
            </div>
        </div>
      </div>
