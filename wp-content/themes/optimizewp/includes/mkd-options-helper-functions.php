<?php

if(!function_exists('optimize_mikado_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function optimize_mikado_is_responsive_on() {
        return optimize_mikado_options()->getOptionValue('responsiveness') !== 'no';
    }
}