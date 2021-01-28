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
            <h3 class="text-themecolor">Тээврийн хэрэгслийн бүртгэл</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Бүртгэл</a></li>
                <li class="breadcrumb-item active">Тээврийн хэрэгсэл</li>
            </ol>
        </div>
        <div class="col-md-7 align-self-center">
            <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal"
                data-target="#exampleModal"> <i class="fa fa-plus" aria-hidden="true"></i> Тээврийн хэрэгсэл бүртгэх</a>
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
                        <table class="table table-bordered vm"
                            style="font-size:10px; color:black; word-wrap:break-word;">
                            <thead style="background-color:#ceedf9; font-size: 10px;">
                                <tr>
                                    <th>№</th>
                                    <th>Төрөл </th>
                                    <th>Парк</th>
                                    <th>Улсын дугаар</th>
                                    <th>Арлын дугаар</th>
                                    <th>Марк</th>
                                    <th>Модель</th>
                                    <th>Үйлдвэрлэсэн он</th>
                                    <th>Хөдөлгүүрийн<br>багтаамж</th>
                                    <th>Хурдны хайрцаг</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($car as $c)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$c->vtypecode}}</td>
                                        <td>{{$c->model_name}}</td>
                                        
                                        <td class='m1'> <a class='btn btn-xs btn-info update' data-toggle='modal' data-target='#exampleModal' data-id="{{$m->model_id}}" tag='{{$m->model_id}}'><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></a> </td>
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
            <form id="form1" action="addcar" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Тээврийн хэрэгсэл бүртгэх цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Үйлдвэрлэгчийн нэр</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control" id="car_id" name="car_id">
                            <select class="form-control select2" id="mark_id" name="mark_id" >
                             
                                @foreach($mark as $m)
                                  
                                    <option value= "{{$m->mark_id}}">  {{$m->mark_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                   
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Загварын нэр</label>
                            <select class="form-control" id="model_id" name="model_id" >
                             
                                @foreach($model as $mo)
                                  
                                    <option value= "{{$mo->model_id}}">  {{$mo->model_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Улсын дугаар</label>
                            <input type="text" class="form-control" id="carno" name="carno" placeholder="9999ААA" maxlength="7">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Арлын дугаар</label>
                            <input type="text" class="form-control" id="vinno" name="vinno" placeholder="" maxlength="17">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Хөдөлгүүрийн марк</label>
                            <input type="text" class="form-control" id="enginecc" name="enginecc" placeholder="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Хөдөлгүүрийн дугаар</label>
                            <input type="text" class="form-control" id="engineid" name="engineid" placeholder="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны багтаамж</label>
                            <input type="text" class="form-control" id="engineid" name="engineid" placeholder="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны төрөл</label>
                            <input type="text" class="form-control" id="engineid" name="engineid" placeholder="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Шатахууны төрөл</label>
                            <select class="form-control select2" id="oil_id" name="oil_id" >
                             
                                @foreach($oil as $o)
                                  
                                    <option value= "{{$o->oil_id}}">  {{$o->oil_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Өнгө</label>
                            <select class="form-control select2" id="oil_id" name="oil_id" >
                             
                                @foreach($colour as $c)
                                  
                                    <option value= "{{$c->colour_id}}">  {{$c->colour_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Зориулалт</label>
                            <select class="form-control select2" id="vtypecode" name="vtypecode" >
                             
                                @foreach($type as $t)
                                  
                                    <option value= "{{$t->vtypecode}}">  {{$t->vtypename}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Үйлдвэрлэсэн он</label>
                            <input type="number" class="form-control" id="manuyear" name="manuyear" maxlength="4">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Хурдны хайрцаг</label>
                            <input type="number" class="form-control" id="speedbox" name="speedbox" maxlength="4">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны төрөл </label>
                            <input type="number" class="form-control" id="speedtype" name="speedtype" maxlength="4">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны багтаамж</label>
                            <input type="number" class="form-control" id="speedcap" name="speedcap" maxlength="4">
                        
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
<script>
     $('#mark_id').change(function() {
        var item=$(this).val();
        console.log(item);
        $('#model_id').empty();
        $.get('modelfill/'+item,function(data){
            $.each(data,function(i,qwe){
                $('#model_id').val(qwe.model_id).trigger('change');
                
            });

        });
    });
</script>
@endsection