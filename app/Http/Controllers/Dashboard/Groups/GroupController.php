<?php

namespace App\Http\Controllers\Dashboard\Groups;

use App\Models\group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');  // فقط المستخدمين المسجلين يمكنهم الوصول
    }


    public function index()
    {
        $Groups =  group::all();
        return view('pages_dashboard.groups.groups', compact('Groups'));
    }


    public function create()
    {
        //
    }




    public function store(Request $request)
    {
        // التحقق من صحة المدخلات باستخدام الـ Validator
        $validator = Validator::make($request->all(), [
            'Name_ar' => 'required|string|max:255',
            'Name_en' => 'required|string|max:255',
            'Notes' => 'nullable|string',
        ]);

        // إذا كان هناك أخطاء في التحقق
        if ($validator->fails()) {
            return redirect('/group')
                ->withErrors($validator)
                ->withInput();
        }

        // التحقق مما إذا كانت الترجمة موجودة في قاعدة البيانات
        if (group::whereJsonContains('name->ar', $request->Name_ar)
            ->orWhereJsonContains('name->en', $request->Name_en)
            ->exists()
        ) {
            toastr()->error('messages.Already'); // رسالة الخطأ إذا كانت الترجمة موجودة
            return redirect('/group');
        }

        // حفظ البيانات في قاعدة البيانات
        $model = new group;
        $model->name = [
            'ar' => $request->Name_ar,
            'en' => $request->Name_en
        ];
        $model->notes = $request->Notes; // حفظ الملاحظات

        $model->save(); // حفظ السجل

        // إظهار رسالة نجاح
        toastr()->success('messages.success');
        return redirect('/group');
    }


    public function show(group $group)
    {
        //
    }


    public function edit(group $group)
    {
        //
    }


    public function update(Request $request, $id)
    {
        // التحقق من صحة المدخلات باستخدام الـ Validator
        $validator = Validator::make($request->all(), [
            'Name_ar' => 'required|string|max:255',
            'Name_en' => 'required|string|max:255',
            'Notes' => 'nullable|string',
        ]);

        // إذا كان هناك أخطاء في التحقق
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // البحث عن المجموعة باستخدام الـ id
        $Group = group::findOrFail($id);

        // تحديث البيانات
        $Group->name = ["ar" => $request->Name_ar, "en" => $request->Name_en];
        $Group->notes = $request->Notes;
        $Group->save();

        toastr()->success('messages.success');
        return redirect('/group');
    }



    public function destroy($id)
    {
        $Group = group::findOrFail($id);
        $Group->delete();

        toastr()->success('تم الحذف بنجاح');
        return redirect('/group');
    }
}
