<?php
/**
 * BlizzCMS
 *
 * @author WoW-CMS
 * @copyright Copyright (c) 2019 - 2022, WoW-CMS (https://wow-cms.com)
 * @license https://opensource.org/licenses/MIT MIT License
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends BS_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_module_installed('status', true);

        $this->load->model('status_model');

        $this->load->language('status');
    }

    public function index()
    {
        require_permission('view.status');

        $data = [
            'realms' => $this->realm_model->find_all()
        ];

        $this->template->title(lang('online_players'), config_item('app_name'));

        $this->template->build('index', $data);
    }
}
