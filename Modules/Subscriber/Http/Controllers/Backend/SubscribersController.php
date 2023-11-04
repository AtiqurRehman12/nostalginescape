<?php

namespace Modules\Subscriber\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Support\Str;


class SubscribersController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Subscribers';

        // module name
        $this->module_name = 'subscribers';

        // directory path of the module
        $this->module_path = 'subscriber::backend';

        // module icon
        $this->module_icon = 'fa fa-user-friends';

        // module model name, path
        $this->module_model = "Modules\Subscriber\Models\Subscriber";
    }
    public function destroy($id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'destroy';

        $$module_name_singular = $module_model::findOrFail($id);

        $$module_name_singular->forceDelete();

        flash(icon().''.label_case($module_name_singular).' Deleted Successfully!')->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }

}
