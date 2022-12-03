<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model
{
    /**
     * Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get all online players of a realm
     *
     * @param int $realm
     * @return array
     */
    public function online_players($realm)
    {
        $cache = $this->cache->get('online_players_' . $realm);

        if ($cache !== false) {
            return $cache;
        }

        $rows = $this->server_characters_model->connect($realm)
            ->select('name, race, class, gender, level, zone')
            ->where('online', 1)
            ->order_by('name', 'DESC')
            ->get('characters')
            ->result();

        $this->cache->save('online_players_' . $realm, $rows, 300);

        return $rows;
    }
}
