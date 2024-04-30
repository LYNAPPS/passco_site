<?php

namespace App\Services;

use App\Models\ExamCategory;
use App\Models\Resource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class FilterResourceService
{
    public function loadInitialResource($id)
    {

        $category = ExamCategory::findOrFail($id);
        $resources = $category->resource;

        $resources = $resources->shuffle()->take(9);

        // Render the view as HTML
        $html = View::make('resource-render', compact('resources'))->render();

        return $html;
    }

    public function loadFilteredResource($request)
    {
        $subjectId = $request->input('subject_id');
        $examYear = $request->input('exam_year');
        $categoryID = $request->input('category_id');

        $query = Resource::where('exam_category_id', $categoryID);

        if (!is_null($request->input('exam_year')) && !is_null($request->input('subject_id'))) {
            // Case 1: Both year and subject are specified
            $examYear = $request->input('exam_year');
            $subjectId = $request->input('subject_id');

            $query->where('exam_year', $examYear)
                ->where('subject_id', $subjectId);
        } elseif (!is_null($request->input('exam_year'))) {
            // Case 2: Only year is specified
            $examYear = $request->input('exam_year');

            $query->where('exam_year', $examYear);
        } elseif (!is_null($request->input('subject_id'))) {
            // Case 3: Only subject is specified
            $subjectId = $request->input('subject_id');

            $query->where('subject_id', $subjectId)
                ->where('exam_category_id', $categoryID);
        }

        // Execute the query
        $resources = $query->get();


        $category = ExamCategory::findOrFail($categoryID);


        $html = View::make('resource-render', compact('resources', 'category'))->render();
        return $html;
    }
}
