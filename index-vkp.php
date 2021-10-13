<?php
/*
  Plugin Name: VK Poster Group without Titles
  Plugin URI: https://github.com/jarpex/vk-poster-group
  Description: Добавляет ваши записи на страницу группы Вконтакте, простой и удобный кроспостинг в социальную сеть
  Version: 2.0.4
  Author: Djo, Jarpex
  Author URI: https://zixn.ru , https://jarpex.ru
 */

/*  Copyright 2021  Djo  (email: izm@zixn.ru)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 */

add_action('init', 'coderun_vk_poster_group');

/**
 * Инициализация всего плагина
 */
function coderun_vk_poster_group() {
    if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'heartbeat') {
        return;
    }
    $rootDir = dirname(__FILE__);
    require_once $rootDir.'/vendor/autoload.php';
    $core = Coderun\VkPoster\CorePlugin::getInstance();
    $core->setPluginUri(plugins_url('vk-poster-group'));
    $core->addEvents();
    if (is_admin()) {
        $core->addAdminActions();
        $ajax = new \Coderun\VkPoster\ServicesAjax();
        $ajax->addEventListener();
    }

}




