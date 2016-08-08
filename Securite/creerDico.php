<?php

const NB_PASS = 26 ** 1;

$salt = 'rcBATr$B4C8(AHD64rq64zw25u_s19g#g-zpuQt)';

$debut = microtime(true);

$password = 'a';

for ($i=0; $i<NB_PASS; $i++) {
    password_hash($password, PASSWORD_BCRYPT, ['salt' => $salt, 'cost' => '12']);
    $password++;
}

echo NB_PASS . ' mots de passe générés en ' . (microtime(true) - $debut) . 's';