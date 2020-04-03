@extends('admin.layouts.masters')

@section('content_main')

<div class="container-fluid">
    <h1 class="mt-4">Quản lý dịch vụ</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
        <li class="breadcrumb-item active">Quản lý dịch vụ</li>
    </ol>
     <div class="card mb-4">
        <div class="card-header">
            <button type="button" class="btn btn-primary"data-toggle="modal" data-target="#AddUserModal">
                <i class="fas fa-plus mr-1"></i>Thêm dịch vụ
            </button>
        </div>

@include('admin.services.modalAdd')

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered"  width="100%" >
                    <thead>
                        <tr>
                            <th>Tên dịch vụ</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="pannel">
                        @include('admin.services.table')
                    </tbody>
                </table>
                <div id="pagination" style="padding-right: 0px">
                    {!! $links !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('js/back.js')}}"></script>
    <script>
        var users = (function () {

            var url = '{{ route('services.index') }}'
            var title = "Do you want delete"
            var cancelButtonText ="Cancel"
            var confirmButtonText = "yes"
            var errorAjax = "Error"
            {{--var errorDelete = "{{trans('members.error_delete')}}"--}}

            var onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                // $('#pannel').on('change', function () {
                // })
                //     .on('click','.simpleConfirm', function (event) {
                //         // back.destroy(event, $(this), url, title, confirmButtonText, cancelButtonText, errorDelete)
                //     })
                $('th span').click(function () {
                    back.ordering(url, $(this), errorAjax)
                })
                $('#btnsearch').click(function () {
                    back.filters(url, errorAjax)
                })
                $('#search').keypress(function(event){
                    var keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        event.preventDefault();
                        $('#btnsearch').focus().click();
                    }
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(users.onReady)
    </script>
@endsection
