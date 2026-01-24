<?php
/**
 * Plugin Name: International Fixed Calendar Date
 * Description: Outputs the current International Fixed Calendar (IFC) date.
 * Version: 0.1.4
 * Author: Tinkersmith
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined('ABSPATH') ) {
    exit;
}

function ifcdate_get_date_parts(): array {
    $timestamp   = current_time('timestamp');
    $day_of_year = (int) wp_date('z', $timestamp); // 0..365 in site timezone
    $year        = (int) wp_date('Y', $timestamp);
    $is_leap     = (bool) wp_date('L', $timestamp);

    if ($day_of_year === 364) {
        return ['type' => 'yearday', 'year' => $year];
    }

    if ($is_leap && $day_of_year === 365) {
        return ['type' => 'leapday', 'year' => $year];
    }

    $ifc_month = intdiv($day_of_year, 28) + 1; // 1..13
    $ifc_day   = ($day_of_year % 28) + 1;      // 1..28

    $months = [
        1  => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
        5  => 'May',     6 => 'June',     7 => 'Sol',   8 => 'July',
        9  => 'August', 10 => 'September', 11 => 'October', 12 => 'November',
        13 => 'December',
    ];

    $weekdays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $weekday  = $weekdays[($ifc_day - 1) % 7];

    return [
        'type'   => 'regular',
        'year'   => $year,
        'month'  => $ifc_month,
        'day'    => $ifc_day,
        'month_name' => $months[$ifc_month] ?? (string) $ifc_month,
        'weekday'    => $weekday,
    ];
}

/**
 * Formats IFC date for display.
 */
function ifcdate_format_date(string $format = 'numeric'): string {
    $p = ifcdate_get_date_parts();

    if ($p['type'] === 'yearday') {
        /* translators: %d is the calendar year. */
      return sprintf( 
        esc_html__( 'Year Day %d', 'international-fixed-calendar-date' ),
        $p['year'] );
    }
    if ($p['type'] === 'leapday') {
        /* translators: %d is the calendar year. */
      return sprintf(
        esc_html__( 'Leap Day %d', 'international-fixed-calendar-date' ),
        $p['year']
      );
      }

    $day2   = str_pad((string) $p['day'], 2, '0', STR_PAD_LEFT);
    $month2 = str_pad((string) $p['month'], 2, '0', STR_PAD_LEFT);

    switch ($format) {
        case 'long':
            return "{$p['weekday']} {$p['day']} {$p['month_name']} {$p['year']}";

        case 'ymd':
            return "{$p['year']}-{$month2}-{$day2}";

        case 'numeric':
        default:
            return "{$p['weekday']} {$day2}.{$month2}.{$p['year']}";
    }
}

/**
 * Shortcode callback.
 * [ifcdate_date format="numeric|long|ymd"]
 */
function ifcdate_date_shortcode($atts): string {
    $atts = shortcode_atts(['format' => 'numeric'], (array) $atts, 'ifcdate_date');
    $format = strtolower(trim((string) $atts['format']));

    // allow only known values
    if (!in_array($format, ['numeric', 'long', 'ymd'], true)) {
        $format = 'numeric';
    }

    return '<span class="ifcdate-date">' . esc_html(ifcdate_format_date($format)) . '</span>';
}

add_shortcode('ifcdate_date', 'ifcdate_date_shortcode');
