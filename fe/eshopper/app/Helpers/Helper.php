<?php

function getConfigValueFromSettingTable($configkey)
{
    $setting = \App\Setting::where('config_key', $configkey)->first();
    if (!empty($setting)) {
        return $setting->config_value;
    }
    return null;
}
