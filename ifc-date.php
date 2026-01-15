<?php
/**
 * Plugin Name: IFC Date
 * Description: Outputs the current International Fixed Calendar date.
 * Version: 0.1.1
 * Author: Tinkersmith
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit;

function ifc_get_date(): string {

  $timestamp = current_time('timestamp');

  $dayOfYear = (int) gmdate('z', $timestamp);
  $year      = (int) gmdate('Y', $timestamp);
  $isLeap    = (bool) gmdate('L', $timestamp);

    /* intercalary check */
    if ($dayOfYear >= 364) {
        return "Intercalary Day {$year}";
    }

    /* ifc month/day */
    $ifcMonth = intdiv($dayOfYear, 28) + 1;
    $ifcDay   = ($dayOfYear % 28) + 1;

    $ifcMonths = [
        1  => 'January',
        2  => 'February',
        3  => 'March',
        4  => 'April',
        5  => 'May',
        6  => 'June',
        7  => 'Sol',
        8  => 'July',
        9  => 'August',
        10 => 'September',
        11 => 'October',
        12 => 'November',
        13 => 'December',
    ];

    $weekdays = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
    $weekday  = $weekdays[($ifcDay - 1) % 7];

    $dayFormatted   = str_pad($ifcDay, 2, '0', STR_PAD_LEFT);
    $monthFormatted = str_pad($ifcMonth, 2, '0', STR_PAD_LEFT);

    return "{$weekday} {$dayFormatted}.{$monthFormatted}.{$year}";
}

function ifc_date_shortcode(): string {
    return '<span class="ifc-date">' . esc_html(ifc_get_date()) . '</span>';
}
add_shortcode('ifc_date', 'ifc_date_shortcode');