@extends('admin.layout')
@section('title', 'Dasboard')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <table id="userTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10%">STT</th>
                            <th style="width: 30%">Tên</th>
                            <th style="width: 30%">Email</th>
                            <th>Trạng thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @if (in_array($user->id, $followers)))
                                    <td><span class="badge badge-pill badge-success">Đang Follow bạn</span></td>
                                @else
                                    <td><span class="badge badge-pill badge-secondary">Chưa Follow bạn</span></td>
                                @endif
                                @if (in_array($user->id, $followings))
                                    <td><button name="unFollow" value="{{ $user->id }}" class="btn btn-secondary">Unfollow</button></td>
                                @else
                                    <td><button name="follow" value="{{ $user->id }}" class="btn btn-success">Follow</button></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
    <script>
        $(function () {
            $('#userTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
            $('[name="follow"]').click(function () {
                axios.post('/user/action', {
                    'user_id': $(this).val(),
                    'action': 'follow',
                }).then(response => {
                    alert('oke');
                }).catch(error => {
                    alert('error');
                });
            })
            $('[name="unFollow"]').click(function () {
                axios.post('/user/action', {
                    'user_id': $(this).val(),
                    'action': 'unFollow',
                }).then(response => {
                    alert('oke');
                }).catch(error => {
                    alert('error');
                });
            })

        });
    </script>
@endsection

