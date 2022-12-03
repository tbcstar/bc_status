<section class="uk-section uk-section-small bc-primary-section" uk-height-viewport="expand: true">
  <div class="uk-container">
    <div class="uk-margin-top uk-margin-bottom" uk-grid>
      <div class="uk-width-expand">
        <ul class="uk-breadcrumb uk-margin-remove">
          <li><a href="<?= site_url() ?>"><?= lang('home') ?></a></li>
        </ul>
        <h1 class="uk-h3 uk-text-bold uk-margin-remove"><?= lang('online_players') ?></h1>
      </div>
      <div class="uk-width-auto"></div>
    </div>
    <div class="uk-margin" uk-grid>
      <div class="uk-width-1-3@s uk-width-1-4@m">
        <div class="uk-card uk-card-default">
          <div class="uk-card-header">
            <h3 class="uk-card-title"><i class="fa-solid fa-server"></i> <?= lang('realm') ?></h3>
          </div>
          <?php if (isset($realms) && ! empty($realms)): ?>
          <ul class="uk-nav uk-nav-default" uk-switcher="connect: #online_players;animation: uk-animation-fade">
            <?php foreach ($realms as $realm): ?>
            <li><a href="#"><?= $realm->name ?></a></li>
            <?php endforeach ?>
          </ul>
          <?php endif ?>
        </div>
      </div>
      <div class="uk-width-2-3@s uk-width-3-4@m">
        <?php if (isset($realms) && ! empty($realms)): ?>
        <ul id="online_players" class="uk-switcher">
          <?php foreach ($realms as $realm): ?>
          <li>
            <div class="uk-card uk-card-default">
              <div class="uk-card-body uk-padding-remove">
                <div class="uk-overflow-auto">
                  <table class="uk-table uk-table-small uk-table-divider">
                    <thead>
                      <tr>
                        <th class="uk-table-expand"><?= lang('name') ?></th>
                        <th class="uk-table-expand"><?= lang('level') ?></th>
                        <th class="uk-table-expand"><?= lang('race') ?></th>
                        <th class="uk-table-expand"><?= lang('class') ?></th>
                        <th class="uk-table-expand"><?= lang('zone') ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($this->status_model->online_players($realm->id) as $online): ?>
                      <tr>
                        <td><?= $online->name ?></td>
                        <td><?= $online->level ?></td>
                        <td><img class="uk-border-circle" src="<?= $template['assets'].'img/icons/race/'.$online->race.'-'.$online->gender.'.png' ?>" width="20" height="20" alt="<?= race_name($online->race) ?>"></td>
                        <td><img class="uk-border-circle" src="<?= $template['assets'].'img/icons/class/'.$online->class.'.png' ?>" width="20" height="20" alt="<?= class_name($online->class) ?>"></td>
                        <td><?= zone_name($online->zone) ?></td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </li>
          <?php endforeach ?>
        </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
</section>
