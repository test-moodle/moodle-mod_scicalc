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
 * Restore structure step for scicalc activity.
 *
 * @package   mod_scicalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class restore_scicalc_activity_structure_step extends restore_activity_structure_step {

    /**
     * Defines the paths to be processed during restore.
     *
     * @return restore_path_element[]
     */
    protected function define_structure() {
        $paths = [];
        $paths[] = new restore_path_element("scicalc", "/activity/scicalc");

        // Return the paths wrapped into standard activity structure.
        return $this->prepare_activity_structure($paths);
    }

    /**
     * Processes a restored scicalc instance.
     *
     * @param array $data The data from the backup file.
     * @throws dml_exception
     */
    protected function process_scicalc($data) {
        global $DB;

        $data = (object)$data;
        $data->course = $this->get_courseid();

        if (empty($data->timecreated)) {
            $data->timecreated = time();
        }

        if (empty($data->timemodified)) {
            $data->timemodified = time();
        }

        if ($data->grade < 0) {
            // Scale found, get mapping.
            $data->grade = -($this->get_mappingid("scale", abs($data->grade)));
        }

        // Create the scicalc instance.
        $newitemid = $DB->insert_record("scicalc", $data);
        $this->apply_activity_instance($newitemid);
    }

    /**
     * After execute: add related files.
     */
    protected function after_execute() {
        // Add scicalc related files, no need to match by itemname (just internally handled context).
        $this->add_related_files("mod_scicalc", "intro", null);
    }
}
