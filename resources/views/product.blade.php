@extends('layouts.parent')

@section('style')
<style>
    .table td,
    .table th {
        font-size: 10px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Тээврийн хэрэгслийн сэлбэг</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Тохиргоо</a></li>
                <li class="breadcrumb-item active">Тээврийн хэрэгслийн сэлбэг</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div>
                         
                        </div>
                        <div class="ml-auto">
                            <select class="form-control select2" id="sexecutor_id" name="sexecutor_id">
                               
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive m-t-20 no-wrap">
                        <table class="table table-bordered vm" id="example"
                            style="font-size:12px; color:black; word-wrap:break-word;">
                            <thead style="background-color:#ceedf9; font-size: 12px;">
                                <tr>
                                <tr>
                                                <th>№</th>
                                                <th>Төрөл </th>
                                                <th>Парк</th>
                                                <th>Улсын дугаар</th>
                                                <th>Арлын дугаар</th>
                                                <th>Загвар</th>
                                                <th>Хөдөлгүүрийн<br>багтаамж</th>
                                                <th>Хурдны хайрцаг</th>
                                                <th>Эд анги</th>
                                            </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($product as $c)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$c->vtypename}}</td>
                                        <td>{{$c->parkname}}</td>
                                        <td>{{$c->carno}}</td>
                                        <td>{{$c->vinno}}</td>
                                        <td>{{$c->mark_name}}- {{$c->model_name}}</td>
                                        <td>{{$c->enginecc}} {{$c->engineid}} -{{$c->enginecap}}л </td>
                                        <td>{{$c->speedbox_name}}- {{$c->speedtype}} {{$c->speedcap}}л</td>
                                        <td>{{$c->product_name}} - {{$c->model_ud}}- {{$c->cp_num}}</td>
                            

                                    </tr>
                                    <?php $no++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <script>
        $(".date-picker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').dataTable( {
                "language": {
                    "lengthMenu": " _MENU_ бичлэг",
                    "zeroRecords": "Бичлэг олдсонгүй",
                    "info": "_PAGE_ ээс _PAGES_ хуудас" ,
                    "infoEmpty": "Бичлэг олдсонгүй",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Хайлт:",
                    "paginate": {
                        "first":      "Эхнийх",
                        "last":       "Сүүлийнх",
                        "next":       "Дараагийнх",
                        "previous":   "Өмнөх"
                    },
                },
                "pageLength": 10
            } );
        } );
    </script>
  
@endsection