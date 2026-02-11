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
 * Backup structure step for scicalc activity.
 *
 * @package   mod_scicalc
 * @copyright 2026 Eduardo Kraus {@link https://eduardokraus.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class backup_scicalc_activity_structure_step extends backup_activity_structure_step {

    /**
     * Defines the backup structure for the activity.
     *
     * @return backup_nested_element
     * @throws base_element_struct_exception
     */
    protected function define_structure() {
        // Define the root element describing the scicalc instance.
        $scicalc = new backup_nested_element("scicalc", ["id"],
            ["course", "name", "intro", "introformat"]);

        // Define data sources.
        $scicalc->set_source_table("scicalc", ["id" => backup::VAR_ACTIVITYID]);

        // Define file annotations (we do not use itemid in this example).
        $scicalc->annotate_files("mod_scicalc", "intro", null);

        // Return the root element (scicalc), wrapped into standard activity structure.
        return $this->prepare_activity_structure($scicalc);
    }
}
