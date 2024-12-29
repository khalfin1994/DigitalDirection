<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as RoutingController;
use OpenApi\Attributes\Contact;
use OpenApi\Attributes\Info;
use OpenApi\Attributes\Server;

#[Info(
    version: '1.0',
    title: 'Music service api',
    contact: new Contact(name: 'GitLab Repository', url: 'http://localhost'),
)]
#[Server(
    url: L5_SWAGGER_CONST_DEV_HOST,
    description: 'Dev server api',
)]
#[Server(
    url: L5_SWAGGER_CONST_LOCAL_HOST,
    description: 'Localhost server api',
)]
class Controller extends RoutingController
{
    //
}
