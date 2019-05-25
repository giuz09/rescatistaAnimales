<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * CI-on-Wings core menu model class
 * Extends Eloquent Model
 * You can access it using "Core\Menu::all();"
 */

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Menu
 *
 * @author sahmed
 */
class Menu extends Eloquent {
    
    public static function get_menu_submenu()
    {
        $items = self::all();
        $menu = array();
        foreach ($items as $item)
        {
            if (!isset($menu[$item->parent_id]))
            {
                $menu[$item->id] = array(
                    'id'        => $item->id,
                    'name'      => $item->name,
                    'url'       => $item->url,
                    'sub_menus' => array(),
                );
            }
            else
            {
                $menu[$item->parent_id]['sub_menus'][$item->id] = array(
                    'id'    => $item->id,
                    'name'  => $item->name,
                    'url'   => $menu[$item->parent_id]['url'] . '/' . $item->url,
                );
            }
        }
        
        return $menu;
    }
    
    public static function build()
    {
        Capsule::schema()->create('menus', function($table)
        {
            $table->increments('id');
            $table->string('name', 80);
            $table->string('url', 120);
            $table->integer('parent_id')->default(0);
            
            $table->index('parent_id');

        });
    }
}
