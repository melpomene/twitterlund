--TEST--
ssl communications
--FILE--
<?php

require_once dirname(__FILE__) . '/setup.php';

try {
    $twitter = Services_Twitter_factory('statuses/update', true, array('use_ssl' => true));
    $status  = $twitter->statuses->update('testing services_twitter over ssl');
    var_dump($status instanceof stdclass && isset($status->id));
    $twitter = Services_Twitter_factory('statuses/destroy', true, array('use_ssl' => true));
    $deleted = $twitter->statuses->destroy($status->id);
    var_dump($deleted instanceof stdclass && isset($deleted->id));
} catch (Services_Twitter_Exception $exc) {
    echo $exc . "\n";
}

?>
--EXPECT--
bool(true)
bool(true)
