<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * index.php
 *
 * @package   mod_scicalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . "/../../config.php");

$id = required_param("id", PARAM_INT);

$course = get_course($id);
require_course_login($course);

$context = context_course::instance($course->id);

$PAGE->set_url(new moodle_url("/mod/scicalc/index.php", ["id" => $course->id]));
$PAGE->set_title($course->fullname);
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();

$modinfo = get_fast_modinfo($course);
$instances = [];

foreach ($modinfo->instances["scicalc"] ?? [] as $cm) {
    if (!$cm->uservisible) {
        continue;
    }
    $instances[] = [
        "name" => $cm->name,
        "url" => new moodle_url("/mod/scicalc/view.php", ["id" => $cm->id]),
    ];
}

echo html_writer::tag("h2", format_string(get_string("modulenameplural", "scicalc")));

if (!$instances) {
    echo $OUTPUT->notification(get_string("nothingtodisplay"), "notifymessage");
} else {
    echo html_writer::start_tag("ul", ["class" => "list-group"]);
    foreach ($instances as $item) {
        $link = html_writer::link($item["url"], $item["name"]);
        echo html_writer::tag("li", $link, ["class" => "list-group-item"]);
    }
    echo html_writer::end_tag("ul");
}

echo $OUTPUT->footer();
