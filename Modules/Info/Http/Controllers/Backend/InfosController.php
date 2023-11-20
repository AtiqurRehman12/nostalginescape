<?php

namespace Modules\Info\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class InfosController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Infos';

        // module name
        $this->module_name = 'infos';

        // directory path of the module
        $this->module_path = 'info::backend';

        // module icon
        $this->module_icon = 'fa fa-info-circle';

        // module model name, path
        $this->module_model = "Modules\Info\Models\Info";
    }

}
