<?php

namespace App\Domain\Admin\Datatables;

use App\Application;
use App\Domain\Util\Datatables\BaseDatatableScope;

class ApplicationDatatableScope extends BaseDatatableScope
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct()
    {
        $this->setHtml([

            [
                'data'  => 'plateforms.name',
                'name'  => 'plateforms.name',
                'title' => 'Plateform',
                'searchable' => true,
                "processing"=> true,
                "serverSide"=>true,
            ],

            [
                'data'  => 'name',
                'name'  => 'name',
                'title' => 'Application',
                'searchable' => true,
                "processing"=> true,
                "serverSide"=>true,
            ],

            [
                'data'  => 'latest_version',
                'name'  => 'latest_version',
                'title' => 'Version',
                'searchable' => true,
                "processing"=> true,
                "serverSide"=>true,
            ],
            [
                'data'       => 'app_users_count',
                'name'       => 'app_users_count',
                'title'      => 'Total User',
                'searchable' => false,
            ],

            [
                'data'      =>'is_only_banner',
                'name'      =>'is_only_banner',
                'title'     =>'Is Banner?',
                
            ]

        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function query()
    {
        if (request()->get('app_platform_id')) {

            $query = Application::query()->with('plateforms')->withCount('app_users')->where('app_platform_id', request()->get('app_platform_id'));
        } else {
            $query = Application::query()->with('plateforms')->withCount('app_users');
        }

        return datatables()->eloquent($query)->addColumn('actions', function ($model) {
            return view('Application.dtcontrols')
                ->with('id', $model->getKey())
               /* ->with('deleteUrl', route('Application.destroy', $model->getKey()))*/
                ->with('editUrl', route('Application.edit', $model->getKey()))
                ->render();
        })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
