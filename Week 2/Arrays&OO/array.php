<pre><?php
    $array = ["foo" => "bar", 1 => "foo", "bar" => "foo", "foobar",];
    foreach ($array as $key => $value) {
        print $key . ' => ' . $value . "\n";
    }
    ?>
</pre>