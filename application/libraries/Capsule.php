<?php

use Illuminate\Database\Capsule\Manager as CapsuleManager;
use Illuminate\Events\Dispatcher as Dispatcher;
use Illuminate\Container\Container as Container;

class Capsule extends CapsuleManager {

    function __construct()
    {
        parent::__construct();

        // Get CI instance to obtain DB settings
        $ci = &get_instance();
        $this->addConnection(array(
            'driver'    => 'mysql',
            'host'      => $ci->db->hostname,
            'database'  => $ci->db->database,
            'username'  => $ci->db->username,
            'password'  => $ci->db->password,
            'charset'   => $ci->db->char_set,
            'collation' => $ci->db->dbcollat,
            'prefix'    => $ci->db->dbprefix,
        ));

        // Listen to Model related events (saving, saved, updating, updated, creating, created etc).
        $this->setEventDispatcher(new Dispatcher(new Container));


        // For CI Profiler (debugging utility)
        $events = new Dispatcher;
        $events->listen('illuminate.query', function($query, $bindings, $time, $name)
        {
            // Format binding data for sql insertion
            foreach ($bindings as $i => $binding)
            {
                if ($binding instanceof \DateTime)
                {
                    $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
                }
                else if (is_string($binding))
                {
                    $bindings[$i] = "'$binding'";
                }
            }

            // Insert bindings into query
            $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
            $query = vsprintf($query, $bindings);

            // Add it into CodeIgniter
            $ci = &get_instance();

            $ci->db->query_times[] = $time;
            $ci->db->queries[] = $query;
        });

        $this->setEventDispatcher($events);

        $this->setAsGlobal();
        $this->bootEloquent();

    }
}
