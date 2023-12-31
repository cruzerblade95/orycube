<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class WithdrawMethodController extends Controller
{
    public function methods()
    {
        abort_if(Gate::denies('withdraw_method_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Withdraw Methods';
        return view('admin.withdraw.index', compact('page_title'));
    }

    public function create()
    {
        abort_if(Gate::denies('withdraw_method_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'New Withdraw Method';
        return view('admin.withdraw.create', compact('page_title'));
    }

    public function store(Request $request)
    {
        $validation_rule = [
            'name' => 'required|max: 60',
            'image' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'rate' => 'required|gt:0',
            'delay' => 'required',
            'currency' => 'required',
            'min_limit' => 'required|gt:0',
            'max_limit' => 'required|gte:0',
            'fixed_charge' => 'required|gte:0',
            'percent_charge' => 'required|between:0,100',
            'instruction' => 'required|max:64000'
        ];

        $custom_messages = [
            'name.required' => 'Name is required.',
            'name.max' => 'Name should not be more than 60 characters.',
            'image.required' => 'Image is required.',
            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Image must be of type jpeg, png, or jpg.',
            'rate.required' => 'Rate is required.',
            'rate.gt' => 'Rate must be greater than 0.',
            'delay.required' => 'Delay is required.',
            'currency.required' => 'Currency is required.',
            'min_limit.required' => 'Minimum limit is required.',
            'min_limit.gt' => 'Minimum limit must be greater than 0.',
            'max_limit.required' => 'Maximum limit is required.',
            'max_limit.gte' => 'Maximum limit must be greater than or equal to 0.',
            'fixed_charge.required' => 'Fixed charge is required.',
            'fixed_charge.gte' => 'Fixed charge must be greater than or equal to 0.',
            'percent_charge.required' => 'Percent charge is required.',
            'percent_charge.between' => 'Percent charge must be between 0 and 100.',
            'instruction.required' => 'Instruction is required.',
            'instruction.max' => 'Instruction should not be more than 64000 characters.',
        ];

        $request->validate($validation_rule, $custom_messages);
        $filename = '';
        $path = imagePath()['withdraw']['method']['path'];
        $size = imagePath()['withdraw']['method']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImg($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {

                $arr = array();
                $arr['field_name'] = strtolower(str_replace(' ', '_', $request->field_name[$a]));
                $arr['field_level'] = $request->field_name[$a];
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $method = new WithdrawMethod();
        $method->name = $request->name;
        $method->image = $filename;
        $method->rate = $request->rate;
        $method->delay = $request->delay;
        $method->min_limit = $request->min_limit;
        $method->max_limit = $request->max_limit;
        $method->fixed_charge = $request->fixed_charge;
        $method->percent_charge = $request->percent_charge;
        $method->currency = $request->currency;
        $method->description = $request->instruction;
        $method->user_data = $input_form;
        $method->save();
        $method->clearCache();
        $notify[] = ['success', $method->name . ' has been added.'];
        return redirect()->route('admin.withdraw.method.index')->withNotify($notify);
    }


    public function edit($id)
    {
        abort_if(Gate::denies('withdraw_method_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Update Withdraw Method';
        $method = WithdrawMethod::findOrFail($id);
        return view('admin.withdraw.edit', compact('page_title', 'method'));
    }

    public function update(Request $request, $id)
    {
        $validation_rule = [
            'name'           => 'required|max: 60',
            'image' => [
                'image',
                'mimes:jpeg,png,jpg'
            ],
            'rate'           => 'required|gt:0',
            'delay'          => 'required',
            'min_limit'      => 'required|gt:0',
            'max_limit'      => 'required|gte:0',
            'fixed_charge'   => 'required|gte:0',
            'percent_charge' => 'required|between:0,100',
            'currency'       => 'required',
            'instruction'    => 'required|max:64000'
        ];

        $custom_messages = [
            'name.required' => 'Name is required.',
            'name.max' => 'Name should not be more than 60 characters.',
            'image.required' => 'Image is required.',
            'image.image' => 'Uploaded file must be an image.',
            'image.mimes' => 'Image must be of type jpeg, png, or jpg.',
            'rate.required' => 'Rate is required.',
            'rate.gt' => 'Rate must be greater than 0.',
            'delay.required' => 'Delay is required.',
            'currency.required' => 'Currency is required.',
            'min_limit.required' => 'Minimum limit is required.',
            'min_limit.gt' => 'Minimum limit must be greater than 0.',
            'max_limit.required' => 'Maximum limit is required.',
            'max_limit.gte' => 'Maximum limit must be greater than or equal to 0.',
            'fixed_charge.required' => 'Fixed charge is required.',
            'fixed_charge.gte' => 'Fixed charge must be greater than or equal to 0.',
            'percent_charge.required' => 'Percent charge is required.',
            'percent_charge.between' => 'Percent charge must be between 0 and 100.',
            'instruction.required' => 'Instruction is required.',
            'instruction.max' => 'Instruction should not be more than 64000 characters.',
        ];

        $request->validate($validation_rule, $custom_messages);

        $method = WithdrawMethod::findOrFail($id);
        $filename = $method->image;

        $path = imagePath()['withdraw']['method']['path'];
        $size = imagePath()['withdraw']['method']['size'];

        if ($request->hasFile('image')) {
            try {
                $filename = uploadImg($request->image, $path, $size, $method->image);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }


        $input_form = [];
        if ($request->has('field_name')) {
            for ($a = 0; $a < count($request->field_name); $a++) {
                $arr = array();
                $arr['field_name'] = strtolower(str_replace(' ', '_', $request->field_name[$a]));
                $arr['field_level'] = $request->field_name[$a];
                $arr['type'] = $request->type[$a];
                $arr['validation'] = $request->validation[$a];
                $input_form[$arr['field_name']] = $arr;
            }
        }

        $method->name           = $request->name;
        $method->image          = $filename;
        $method->rate           = $request->rate;
        $method->delay          = $request->delay;
        $method->min_limit      = $request->min_limit;
        $method->max_limit      = $request->max_limit;
        $method->fixed_charge   = $request->fixed_charge;
        $method->percent_charge = $request->percent_charge;
        $method->description    = $request->instruction;
        $method->user_data      = $input_form;
        $method->currency       = $request->currency;
        $method->save();
        $method->clearCache();

        $notify[] = ['success', $method->name . ' has been updated.'];
        return back()->withNotify($notify);
    }
}
