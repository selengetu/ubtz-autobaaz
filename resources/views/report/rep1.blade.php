@extends('layouts.parent')

@section('style')
<style>
    .disabledTab {
        pointer-events: none;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Тээврийн хэрэгслийн засварын тайлан</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Тайлан</a></li>
                <li class="breadcrumb-item active">Засварын тайлан </li>
            </ol>
        </div>
       
    </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                    
                        <div class="card">
                            <div class="card-body">
                                <div class="form-row">
                                   
                                    <div class="form-group col-md-3">
                                      <label for="inputPassword4">Төрөл</label>
                                      <select class="form-control" id="s_vtypecode" name="s_vtypecode"  onchange="javascript:location.href = 'filter_vtypecode/'+this.value;" >
                                        <option value= "0">  Бүгд</option>
                                        @foreach($type as $t)
                                          
                                            <option value= "{{$t->vtypecode}} " @if($t->vtypecode==$vtypecode) selected @endif >  {{$t->vtypename}}</option>
                                          
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="inputPassword4">Марк</label>
                                      <select class="form-control" id="s_mark" name="s_mark"  onchange="javascript:location.href = 'filter_mark/'+this.value;">
                                        <option value= "0">  Бүгд</option>
                                       
                                        @foreach($mark as $m)
                                          
                                            <option value= "{{$m->mark_id}}"  @if($m->mark_id==$s_mark) selected @endif>  {{$m->mark_name}}</option>
                                          
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="inputPassword4">Модель</label>
                                      <select class="form-control" id="s_model_id" name="s_model_id" onchange="javascript:location.href = 'filter_model/'+this.value;">
                                        <option value= "0">  Бүгд</option>
                                        @foreach($model as $mo)
                                       
                                            <option value= "{{$mo->model_id}}" @if($mo->model_id==$s_model) selected @endif>  {{$mo->model_name}}</option>
                                          
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputEmail4">Хурдны хайрцаг</label>
                                        <select class="form-control" id="s_speedbox" name="s_speedbox" onchange="javascript:location.href = 'filter_speedbox/'+this.value;">
                                            <option value= "0">  Бүгд</option>
                                          @foreach($speedbox as $s)
                                            
                                              <option value= "{{$s->speedbox_id}}" @if($s->speedbox_id==$s_speedbox) selected @endif>  {{$s->speedbox_name}}</option>
                                            
                                          @endforeach
                                      </select>
                                      </div>
                                  </div>
                                <div class="table-responsive m-t-20 no-wrap">
                                    <table class="table table-bordered vm" id="example"
                                        style="font-size:12px; color:black; word-wrap:break-word;">
                                        <thead style="background-color:#ceedf9; font-size: 12px;">
                                            <tr>
                                                <th>№</th>
                                                <th>Огноо</th>
                                                <th>Төрөл </th>
                                                <th>Парк</th>
                                                <th>Улсын дугаар</th>
                                                <th>Арлын дугаар</th>
                                                <th>Загвар</th>
                                                <th>Хөдөлгүүрийн<br>багтаамж</th>
                                                <th>Хурдны хайрцаг</th>
                                                <th>Км</th>
                                                <th>Эд анги</th>
                                                <th>Тайлбар</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($report as $c)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$c->repair_date}}</td>
                                                    <td>{{$c->vtypename}}</td>
                                                    <td>{{$c->parkname}}</td>
                                                    <td>{{$c->carno}}</td>
                                                    <td>{{$c->vinno}}</td>
                                                    <td>{{$c->mark_name}}- {{$c->model_name}}</td>
                                                    <td>{{$c->enginecc}} {{$c->engineid}} -{{$c->enginecap}}л </td>
                                                    <td>{{$c->speedbox_name}}- {{$c->speedtype}} {{$c->speedcap}}л</td>
                                                    <td>{{$c->repair_km}}</td>
                                                    <td>{{$c->product_name}}</td>
                                                    <td>{{$c->repair_comment}}</td>

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
        </div>


@endsection

@section('scripts')
<script>
   $(document).ready(function() {
    $('.date-picker').datepicker({ dateFormat: 'dd-mm-yy' });

       $('.select2').select2();
     $('#mark_id').change(function() {
        var item=$(this).val();
       
    
        $.get('modelfill/'+item,function(data){
        
            $('#model_id').empty();

            $.each(data,function(i,qwe){
                $('#model_id').append($('<option>', {
                    value: qwe.model_id,
                    text: qwe.model_name
                }));
            });
        
        });
    });
</script>

@endsection