=== International Fixed Calendar Date ===
Contributors: tinkersmith
Tags: calendar, date, shortcode
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 0.1.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Displays the current International Fixed Calendar (IFC) date using a shortcode.

== Description ==
This plugin provides a shortcode for displaying today's date using the International Fixed Calendar (IFC).

The IFC is an alternative calendar consisting of 13 months with 28 days each, plus one or two intercalary days (Year Day and Leap Day). Each month begins on a Monday and ends on a Sunday.

The plugin outputs the current IFC date based on the site's configured timezone.

== Installation ==
1. Upload the plugin and activate it.
2. Add the shortcode `[ifcdate_date]` where you want the date to appear.

== Shortcode ==
The plugin registers a single shortcode:

`[ifcdate_date]`

By default, the date is displayed in a numeric format.

=== Formatting Options ===
You can control the output format using the `format` attribute:

`[ifcdate_date format="numeric"]`  
Outputs: `Monday 01.07.2026`

`[ifcdate_date format="long"]`  
Outputs: `Monday 1 Sol 2026`

`[ifcdate_date format="ymd"]`  
Outputs: `2026-07-01`

If an invalid or unsupported format is provided, the shortcode falls back to the default numeric format.

== Frequently Asked Questions ==
= What is the International Fixed Calendar? =
The International Fixed Calendar is a proposed calendar reform designed to create equal-length months and a perpetual weekly structure. It divides the year into 13 months of 28 days, with additional intercalary days that are not part of any week.

= Does this plugin add settings or options? =
No. The plugin only provides a shortcode and does not store any settings or user data.


More information about the International Fixed Calendar is available at:
https://tinkersmith.no/international-fixed-calendar

== Changelog ==
= 0.1.0 =
* Initial release.

= 0.1.1 =
* Fixed minor spelling errors

= 0.1.2 =
* Updated plugin name proper title
* Replaced "Intercalary Day" with "Year Day" and "Leap Day"

= 0.1.3 =
* More tweaks to comply with WP plugin standards

= 0.1.4 =
* Updated shortcode prefixing to comply with WordPress plugin guidelines
* Added format attribute for controlling date output
* Improved intercalary day handling
* Code cleanup and internal refactoring
