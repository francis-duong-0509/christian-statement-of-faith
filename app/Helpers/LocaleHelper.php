<?php

if (!function_exists('__t')) {
    /**
     * Quick translation helper for bilingual content
     * Usage: __t('Trang Chủ', 'Home')
     */
    function __t(string $vi, string $en): string
    {
        return app()->getLocale() === 'vi' ? $vi : $en;
    }
}

if (!function_exists('current_locale_field')) {
    /**
     * Get the field name for the current locale
     * Usage: $model->{current_locale_field('name')}
     */
    function current_locale_field(string $field): string
    {
        $locale = app()->getLocale();

        return "{$field}_{$locale}";
    }
}
