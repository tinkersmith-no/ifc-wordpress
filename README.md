## International Fixed Calendar date for WordPress

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
