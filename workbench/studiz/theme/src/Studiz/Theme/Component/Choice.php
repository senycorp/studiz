<?php namespace Studiz\Theme\Component;

class Choice
{
    public static function fromModel(\Illuminate\Database\Eloquent\Collection $modelCollection, $selected = null)
    {
        $options = '';

        // Check for full collection
        if ($modelCollection->count())
        {
            // Get Data
            $data = $modelCollection->lists('title', 'id');

            // Get selected data
            if ($selected)
            {
                $selected = $selected->lists('id');
            }
            else
            {
                $selected = array();
            }

            // Build options
            foreach ($data AS $id => $title)
            {
                $options .= '<option value="'.$id.'"  '.((in_array($id, $selected)) ? 'selected="selected"' : '').'>'.$title.'</option>';
            }
        }

        echo $options;
    }
}