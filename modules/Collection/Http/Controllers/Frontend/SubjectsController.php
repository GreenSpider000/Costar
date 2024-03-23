<?php

namespace Modules\Collection\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Modules\Collection\Events\SubjectViewed;

class SubjectsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Subjects';

        // module name
        $this->module_name = 'subjects';

        // directory path of the module
        $this->module_path = 'subjects';

        // module icon
        $this->module_icon = 'fas fa-file-alt';

        // module model name, path
        $this->module_model = "Modules\Collection\Models\Subject";
        
        // taxon model
        $this->taxon_model = "Modules\Taxon\Models\Taxon";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $taxon_model = $this->taxon_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $meta_page_type = 'collection';

        $$module_name = $module_model::get();
        
        $taxon_data = $taxon_model::select('id', 'name', 'slug', 'status')->get();
        
        $module_group_data = array();
        
        foreach ($taxon_data as $row) {
            $taxon_key = $row->id;
            
            $taxon_list = $taxon_model::findOrFail($taxon_key);
            $subject_paginate = $taxon_list->subjects()->with('taxon')->paginate(8);
            
            $subject_list = array();
            foreach($subject_paginate as $item) {
                array_push($subject_list, $item);
            }
            
            $module_group_data[$taxon_key] = array();
            $module_group_data[$taxon_key]['taxon'] = array(
                'id' => $row->id,
                'name' => $row->name,
                'slug' => $row->slug,
            );
            
            $module_group_data[$taxon_key]['subject'] = $subject_list;
        }

        return view(
            "collection::frontend.{$module_path}.index",
            compact('module_title', 'module_name', "$module_name", 'module_group_data', 'module_icon', 'module_action', 'module_name_singular', 'meta_page_type')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($hashid)
    {
        $id = decode_id($hashid);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $meta_page_type = 'collection';

        $$module_name_singular = $module_model::findOrFail($id);

        event(new SubjectViewed($$module_name_singular));

        return view(
            "collection::frontend.{$module_name}.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular", 'meta_page_type')
        );
    }
}
