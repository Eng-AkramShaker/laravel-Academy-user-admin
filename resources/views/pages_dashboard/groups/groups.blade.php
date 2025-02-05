@extends('pages_dashboard.theme.master')
@section('css')


@section('title')
{{ trans('Grades_trans.title_page') }}

@stop
@endsection

@section('page-header')

<!-- Title -->
@section('PageTitle')
{{ trans('main_trans.Grades') }}
@stop

@endsection
@section('content')



<!--=================================
body -->

<div class="row">
    <!--------------------------- عرض الأخطاء -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif



    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">


                <!-- زر إضافة -->
                <button type="button" class="button x-small" data-toggle="modal" data-target="#addGradeModal">
                    {{ trans('Grades_trans.add_Grade') }}
                </button>
                <br><br>



                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('Grades_trans.Name') }}</th>
                                <th>{{ trans('Grades_trans.Notes') }}</th>
                                <th>{{ trans('Grades_trans.Processes') }}</th>
                            </tr>
                        </thead>


                        <tbody>


                            @foreach ($Groups as $group)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->notes }}</td>
                                <td>

                                    <!-- زر عرض  -->

                                    <button data-target="#showGroupModal{{ $group->id }}" data-toggle="modal"
                                        class="btn btn-success  btn-sm">
                                        {{ trans('Grades_trans.Show_Grade') }}
                                    </button>

                                    <!-- مودال عرض -->
                                    <div class="modal fade" id="showGroupModal{{ $group->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="addGradeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ trans('Grades_trans.add_Grade') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('group.update', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <div class="row">

                                                            <div class="col">
                                                                <label
                                                                    for="Name">{{ trans('Grades_trans.stage_name_ar') }}</label>
                                                                <input id="Name" type="text" name="Name_ar"
                                                                    class="form-control"
                                                                    value="{{ $group->getTranslation("name",'ar') }}">
                                                            </div>



                                                            <div class="col">
                                                                <label
                                                                    for="Name_en">{{ trans('Grades_trans.stage_name_en') }}</label>
                                                                <input id="Name_en" type="text" name="Name_en"
                                                                    class="form-control"
                                                                    value="{{ $group->getTranslation("name",'en') }}">
                                                            </div>
                                                        </div>

                                                        <div class=" form-group">
                                                            <label for="Notes">{{ trans('Grades_trans.Notes') }}</label>
                                                            <textarea class="form-control" name="Notes" rows="3"
                                                                required>{{ $group->notes }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- زر عرض -->

                                    &nbsp;&nbsp;
                                    &nbsp;&nbsp;

                                    <!-- زر تعديل -->

                                    <button data-target="#editGradeModal{{ $group->id }}" data-toggle="modal"
                                        class="btn btn-primary btn-sm">
                                        {{ trans('Grades_trans.Edit') }}
                                    </button>

                                    <!-- مودال التعديل -->
                                    <div class="modal fade" id="editGradeModal{{ $group->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="addGradeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ trans('Grades_trans.add_Grade') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('group.update', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <div class="row">

                                                            <div class="col">
                                                                <label
                                                                    for="Name">{{ trans('Grades_trans.stage_name_ar') }}</label>
                                                                <input id="Name" type="text" name="Name_ar"
                                                                    class="form-control"
                                                                    value="{{ $group->getTranslation("name",'ar') }}">
                                                            </div>



                                                            <div class="col">
                                                                <label
                                                                    for="Name_en">{{ trans('Grades_trans.stage_name_en') }}</label>
                                                                <input id="Name_en" type="text" name="Name_en"
                                                                    class="form-control"
                                                                    value="{{ $group->getTranslation("name",'en') }}">
                                                            </div>
                                                        </div>

                                                        <div class=" form-group">
                                                            <label for="Notes">{{ trans('Grades_trans.Notes') }}</label>
                                                            <textarea class="form-control" name="Notes" rows="3"
                                                                required>{{ $group->notes }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- زر تعديل -->


                                    <!-- زر حذف -->

                                    <button data-target="#deleteModal{{ $group->id }}" data-toggle="modal"
                                        class="btn btn-danger btn-sm">
                                        {{ trans('Grades_trans.Delete') }}
                                    </button>

                                    <!-- مودال الحذف -->
                                    <div class="modal fade" id="deleteModal{{ $group->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ trans('Grades_trans.delete_Grade') }}
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('group.destroy', $group->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        {{ trans('Grades_trans.Warning_Grade') }}
                                                    </div>
                                                    <div class="modal-footer">

                                                        <button type="submit" class="btn btn-danger">
                                                            {{ trans('Grades_trans.submit') }}
                                                        </button>

                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                            {{ trans('Grades_trans.Close') }}
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- مودال الحذف --->




                                </td>
                            </tr>


                            @endforeach


                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- مودال الإضافة ----------------------------------------------------------------------------->

    <div class="modal fade" id="addGradeModal" tabindex="-1" role="dialog" aria-labelledby="addGradeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ trans('Grades_trans.add_Grade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('group.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="Name">{{ trans('Grades_trans.stage_name_ar') }}</label>
                                <input id="Name" type="text" name="Name_ar" class="form-control"
                                    value="{{ old('Name') }}">
                            </div>
                            <div class="col">
                                <label for="Name_en">{{ trans('Grades_trans.stage_name_en') }}</label>
                                <input id="Name_en" type="text" name="Name_en" class="form-control"
                                    value="{{ old('Name_en') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Notes">{{ trans('Grades_trans.Notes') }}</label>
                            <textarea class="form-control" name="Notes" id="Notes"
                                rows="3">{{ old('Notes') }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>


<!--=================================
 body -->


@endsection

@section('js')


@endsection