<?php

return [

    'driver' => 'smtp',                 
    'host' => 'smtp.gmail.com',         
    'port' => 587,                  
    'from' => ['address' => 'masterjamanow@gmail.com', 'name' => 'Admin'],
    'encryption' => 'tls',
    'username' => 'masterjamanow@gmail.com',   
    'password' => 'sarirejo1',        
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
];