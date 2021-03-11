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
            <h3 class="text-themecolor">Жолооч</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Тохиргоо</a></li>
                <li class="breadcrumb-item active">Жолооч</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="#" class="add btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal"
                data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Жолооч бүртгэх</a>
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
                                    <th>№</th>
                                    <th>Жолоочийн код</th>
                                    <th>Жолоочийн нэр</th>
                                    <th>Жолоочийн ангилал</th>
                                    <th>Мэргэшсэн</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                    @foreach($driver as $d)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$d->driver_code}}</td>
                                            <td>{{$d->driver_name}}</td>
                                            <td>{{$d->driver_type}}</td>
                                            <td>{{$d->driver_spec}}</td>
                                            <td class='m1'> <a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#exampleModal' data-id="{{$d->driver_id}}" tag='{{$d->driver_id}}'><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></a> </td>
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
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form1" action="post" method="adddriver">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Жолооч бүртгэх цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-3">
                            <label for="inputAddress">Жолоочийн нэр</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control" id="driver_id" name="driver_id">
                            <input type="text" class="form-control" id="driver_name" name="driver_name" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Жолоочийн код</label>
                            <input type="text" class="form-control" id="driver_code" name="driver_code" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Жолоочийн ангилал</label>
                            <input type="text" class="form-control" id="driver_type" name="driver_type" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Жолоочийн мэргэшсэн</label>
                            <input type="text" class="form-control" id="driver_spec" name="driver_spec" placeholder="">
                        </div>
                       
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-md-5">
                        <button type="button" class="btn btn-danger delete">Устгах</button>
                    </div>
                    <div class="col-md-7" style="display: inline-block; text-align: right;" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                </div>
            </form>
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
    <script>
        $('.update').on('click',function(){
            var title = document.getElementById("modal-title");
            title.innerHTML = "Жолооч засварлах цонх";
            document.getElementById('form1').action = "updatedriver";
            document.getElementById('form1').method ="post"
            var itag=$(this).attr('tag');
            $.get('driverfill/'+itag,function(data){
                $.each(data,function(i,qwe){
                    $('#driver_id').val(qwe.driver_id);
                    $('#driver_name').val(qwe.driver_name);
                    $('#driver_spec').val(qwe.driver_spec);
                    $('#driver_type').val(qwe.driver_type);
                    $('#driver_code').val(qwe.driver_code);
                });

            });
            $('.delete').show();
        });
    </script>
    <script>
        $('.add').on('click',function(){
            var title = document.getElementById("modal-title");
            title.innerHTML = "Жолооч бүртгэх цонх";
            document.getElementById('form1').action = "adddriver"
            document.getElementById('form1').method ="post";
            $('#driver_id').val('');
            $('#driver_name').val('');
            $('#driver_spec').val('');
            $('#driver_type').val('');
            $('#driver_code').val('');
            $('.delete').hide();
        });
        $('.delete').on('click',function(){
            var itag = $('#mark_id').val();

            $.ajax(
                {
                    url: "driver/delete/" + itag,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": itag,
                        "_method": 'DELETE',
                    },
                    success: function () {
                        alert('Жолооч устгагдлаа');
                    }

                });
        
            location.reload();
        });
    </script>
@endsection