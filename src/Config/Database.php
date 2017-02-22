<?php
use RedBeanPHP\R;

R::setup('mysql:host=localhost;dbname=mypaydb', 'root', '');
R::setAutoResolve( TRUE );
