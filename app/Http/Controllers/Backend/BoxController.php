<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\Boxes\StoreRequest;
use App\Models\Box;
use Illuminate\Http\Request;

class BoxController extends BackendController
{
    public function __construct(Box $model)
    {
        parent::__construct($model);
    }

    public function store(StoreRequest $request)
    {
        $pluralModelName = $this->getPluralName($this->model);
        $input = $request->merge([
            'order' => ($this->model->max('order'))+1,
            'admin_id' => auth()->guard('admin')->id(),
        ]);

        $this->model->create($input->all());
        return redirect()->route('admin.'.$pluralModelName.'.index');
    }

    public function update(StoreRequest $request, Box $box)
    {
        $pluralModelName = $this->getPluralName($this->model);
        $input = $request->except('_token');
        $box->update($input);
        return redirect()->route('admin.'.$pluralModelName.'.edit',$box->id);
    }

    public function filter($items)
    {
        return $items->where('admin_id',auth()->guard('admin')->id());
    }

    public function selectToShow()
    {
        return ['id','name','created_at'];
    }
}