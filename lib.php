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
 * lib.php
 *
 * @package   mod_scicalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Declares module features.
 *
 * @param string $feature The feature constant.
 * @return mixed
 */
function scicalc_supports(string $feature) {
    switch ($feature) {
        case FEATURE_MOD_INTRO:
            return true;
        case FEATURE_SHOW_DESCRIPTION:
            return true;
        case FEATURE_COMPLETION_TRACKS_VIEWS:
            return true;
        case FEATURE_MOD_ARCHETYPE:
            return MOD_ARCHETYPE_RESOURCE;
        case FEATURE_MOD_PURPOSE:
            return MOD_PURPOSE_CONTENT;
        case FEATURE_BACKUP_MOODLE2:
            return true;
        case FEATURE_GROUPS:
            return true;
        case FEATURE_GROUPINGS:
            return true;
        case FEATURE_COMMENT:
            return true;
        default:
            return null;
    }
}

/**
 * Adds a scicalc instance.
 *
 * @param stdClass $data The form data.
 * @param mod_scicalc_mod_form $mform The form.
 * @return int
 * @throws dml_exception
 */
function scicalc_add_instance(stdClass $data, $mform): int {
    global $DB;

    $data->timecreated = time();
    $data->timemodified = time();

    return $DB->insert_record("scicalc", $data);
}

/**
 * Updates a scicalc instance.
 *
 * @param stdClass $data The form data.
 * @param mod_scicalc_mod_form $mform The form.
 * @return bool
 * @throws dml_exception
 */
function scicalc_update_instance(stdClass $data, $mform): bool {
    global $DB;

    $data->timemodified = time();
    $data->id = $data->instance;

    return $DB->update_record("scicalc", $data);
}

/**
 * Deletes a scicalc instance.
 *
 * @param int $id The instance id.
 * @return bool
 * @throws dml_exception
 */
function scicalc_delete_instance(int $id): bool {
    global $DB;

    if (!$DB->record_exists("scicalc", ["id" => $id])) {
        return false;
    }

    return $DB->delete_records("scicalc", ["id" => $id]);
}

/**
 * Adds extra info for course module listing.
 *
 * @param cm_info $cm The course module info.
 */
function scicalc_cm_info_view(cm_info $cm) {
    // Intentionally empty. Kept for future enhancements.
}
