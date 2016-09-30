<?php
/**
 * Created by PhpStorm.
 * User: seungman
 * Date: 2016. 9. 22.
 * Time: 오후 5:35
 */

namespace Xpressengine\Plugins\GoogleMapTool;
use App\Http\Controllers\Controller;
use Xpressengine\Http\Request;
use Xpressengine\Permission\PermissionSupport;

class SettingsController extends Controller
{
    use PermissionSupport;

    public function getSetting($instanceId)
    {
        $permArgs = $this->getPermArguments(GoogleMapTool::getKey($instanceId), 'use');

        return XePresenter::make('google_map_tool::views.setting', [
            'instanceId' => $instanceId,
            'permArgs' => $permArgs
        ]);
    }

    public function postSetting(Request $request, $instanceId)
    {
        $this->permissionRegister($request, GoogleMapTool::getKey($instanceId), 'use');

        return redirect()->route('settings.plugin.google_map_tool.setting', $instanceId);
    }
}