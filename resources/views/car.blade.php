@extends('layouts.parent')

@section('style')
<style>
    .table td,
    .table th {
        font-size: 10px;
    }
   
    .disabledTab {
        pointer-events: none;
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

   
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Тээврийн хэрэгсэл</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled disabledTab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Эд анги</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled disabledTab" id="contact-tab" data-toggle="tab" href="#repair" role="tab" aria-controls="contact" aria-selected="false">Засвар</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled disabledTab" id="driver-tab" data-toggle="tab" href="#driver" role="tab" aria-controls="driver" aria-selected="false">Жолооч</a>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                          
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
                                                <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($car as $c)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$c->vtypename}}</td>
                                                    <td>{{$c->parkname}}</td>
                                                    <td>{{$c->carno}}</td>
                                                    <td>{{$c->vinno}}</td>
                                                    <td>{{$c->mark_name}}</td>
                                                    <td>{{$c->model_name}}</td>
                                                    <td>{{$c->manuyear}}</td>
                                                    <td>{{$c->enginecc}} {{$c->engineid}} -{{$c->enginecap}}л </td>
                                                    <td>{{$c->speedbox_name}}- {{$c->speedtype}} {{$c->speedcap}}л</td>
                                                    <td><button onclick="carClicked({{$c->carid}})" data-id="{{$c->carid}}" tag="{{$c->carid}}" class="btn btn-primary btn-sm process"> <i class="fa fa-plus" style="color: rgb(255, 255, 255);"></i></button>
                                                        <button class='btn btn-sm btn-info update' data-toggle='modal' data-target='#exampleModal' data-id="{{$c->carid}}" tag='{{$c->carid}}'><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></button> </td>
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
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                          <div class="col-md-12">
                                <div class="table-responsive m-t-20 no-wrap">
                                    <table class="table table-bordered main"
                                        style="font-size:10px; color:black; word-wrap:break-word;" id="producttable">
                                        <thead style="background-color:#ceedf9; font-size: 10px;">
                                            <tr>
                                              
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
                                        </tbody>
                                    </table>
                                   
                                </div>
                               
                            </div>
                            <div class="col-md-6" >
                             
                                <table class="table table-bordered vm"
                                style="font-size:10px;width:100%; color:black; word-wrap:break-word;" id="carproducttable">
                                <thead style="background-color:#ceedf9; font-size: 10px;" >
                                    <tr>
                                       
                                        <th>Эд ангийн нэр </th>
                                        <th>Явсан км</th>
                                        <th>Эхэлсэн огноо</th>
                                        <th>Дууссан огноо</th>
                                        <th></th>
                                    </tr>
                                </thead>
                               <tbody>
                               </tbody>
                            </table>
                               
                                
                            </div>
                            <div class="col-md-3" >
                                <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal" data-target="#productModal" id="addproduct"> <i class="fa fa-plus" aria-hidden="true"></i> Эд анги бүртгэх</a>
                            </div>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="repair" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                          <div class="table-responsive m-t-20 no-wrap">
                                              <table class="table table-bordered main"
                                                  style="font-size:10px; color:black; word-wrap:break-word;" id="repairtable">
                                                  <thead style="background-color:#ceedf9; font-size: 10px;">
                                                      <tr>
                                                        
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
                                                  </tbody>
                                              </table>
                                             
                                          </div>
                                         
                                      </div>
                                      <div class="col-md-6" >
                                       
                                        <table class="table table-bordered vm" id="carrepairtable"
                                        style="font-size:10px;width:100%; color:black; word-wrap:break-word;">
                                        <thead style="background-color:#ceedf9; font-size: 10px;"  >
                                            <tr>
                                                <th>Огноо</th>
                                                <th>Эд анги</th>
                                                <th>Явсан км</th>
                                                <th>Тайлбар</th>
                                                <th>Жолооч</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                         
                                          
                                      </div>
                                      <div class="col-md-3" >
                                          <a href="#" id="addrepair" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal" data-target="#repairModal"> <i class="fa fa-plus" aria-hidden="true"></i> Засвар бүртгэх</a>
                                      </div>
                                  </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                          <div class="table-responsive m-t-20 no-wrap">
                                              <table class="table table-bordered main"
                                                  style="font-size:10px; color:black; word-wrap:break-word;" id="repairtable">
                                                  <thead style="background-color:#ceedf9; font-size: 10px;">
                                                      <tr>
                                                        
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
                                                  </tbody>
                                              </table>
                                             
                                          </div>
                                         
                                      </div>
                                      <div class="col-md-6" >
                                       
                                        <table class="table table-bordered vm" id="cardrivertable"
                                    style="font-size:10px;width:100%; color:black; word-wrap:break-word;" >
                                    <thead style="background-color:#ceedf9; font-size: 10px;">
                                        <tr>
                                            <th>Нэр</th>
                                            <th>Ангилал</th>
                                            <th>Мэргэшсэн</th>
                                            <th>Эхэлсэн огноо </th>
                                            <th>Дууссан огноо</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                         
                                          
                                      </div>
                                      <div class="col-md-3" >
                                          <a href="#" id="adddriver" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal" data-target="#driverModal"> <i class="fa fa-plus" aria-hidden="true"></i> Жолооч бүртгэх</a>
                                      </div>
                                  </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
          </div>
  
</div>
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formcar" action="addcar" method="post">
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
                            <select class="form-control" id="mark" name="mark" >
                             
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
                            <input type="text" class="form-control" id="enginecap" name="enginecap" placeholder="" step="0.01">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны төрөл</label>
                            <input type="text" class="form-control" id="enginetype" name="enginetype" placeholder="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Шатахууны төрөл</label>
                            <select class="form-control" id="oil_id" name="oil_id" >
                             
                                @foreach($oil as $o)
                                  
                                    <option value= "{{$o->oil_id}}">  {{$o->oil_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Өнгө</label>
                            <select class="form-control" id="colour" name="colour" >
                             
                                @foreach($colour as $c)
                                  
                                    <option value= "{{$c->colour_id}}">  {{$c->colour_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Зориулалт</label>
                            <select class="form-control" id="vtypecode" name="vtypecode" >
                             
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
                            <select class="form-control" id="speedbox" name="speedbox" >
                             
                                @foreach($speedbox as $s)
                                  
                                    <option value= "{{$s->speedbox_id}}">  {{$s->speedbox_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны төрөл </label>
                            <input type="text" class="form-control" id="speedtype" name="speedtype" maxlength="4">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны багтаамж</label>
                            <input type="number" class="form-control" id="speedcap" name="speedcap" maxlength="4" step="0.01">
                        
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
<div class="modal fade " id="repairModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formrepair" method="post">
                <div class="modal-header">
                    <h5 class="modal-title3" id="modal-title3">Засвар бүртгэх цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Огноо</label>
                            <input class="form-control form-control-inline input-medium date-picker" name="repair_date" id="repair_date"
                            size="16" type="text" value="">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Эд анги</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control rcar" id="rcar" name="rcar">
                            <input type="hidden" class="form-control" id="r_type" name="r_type">
                            <input type="hidden" class="form-control" id="cr_id" name="cr_id" maxlength="10"> <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                            <select class="form-control" id="product_id" name="product_id" >
                             
                                @foreach($product as $p)
                                  
                                    <option value= "{{$p->product_id}}">  {{$p->product_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Явсан км</label>
                            <input type="number" class="form-control" id="repair_km" name="repair_km" maxlength="10">
                        
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputAddress">Хийгдсэн үйлчилгээ</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="number" class="form-control" id="repair_comment" name="repair_comment" maxlength="10">
                        
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Жолоочийн нэр</label>
                            <select class="form-control" id="repair_personid" name="repair_personid" >
                             
                                @foreach($driver as $d)
                                  
                                    <option value= "{{$d->driver_id}}">  {{$d->driver_name}}</option>
                                  
                                @endforeach
                            </select>
                        
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
<div class="modal fade " id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formproduct" method="post" >
                <div class="modal-header">
                    <h5 class="modal-title2" id="modal-title2">Эд анги бүртгэх цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Эд ангийн нэр</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control pcar" id="pcar" name="pcar">
                            <input type="hidden" class="form-control" id="cp_id" name="cp_id" maxlength="10">
                            <input type="hidden" class="form-control" id="c_type" name="c_type" maxlength="10">
                            <select class="form-control" id="product_id" name="product_id" >
                             
                                @foreach($product as $p)
                                  
                                    <option value= "{{$p->product_id}}">  {{$p->product_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                   
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Явсан км</label>
                            <input type="number" class="form-control" id="product_km" name="product_km" maxlength="10">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Эхэлсэн огноо</label>
                            <input class="form-control form-control-inline input-medium date-picker" name="product_sdate" id="product_sdate"
                            size="16" type="text" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Дууссан огноо</label>
                            <input class="form-control form-control-inline input-medium date-picker" name="product_fdate" id="product_fdate"
                            size="16" type="text" value="">
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
<div class="modal fade " id="driverModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formdriver" method="post" >
                <div class="modal-header">
                    <h5 class="modal-title1" id="modal-title1">Жолооч бүртгэх цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="inputAddress">Жолоочийн нэр</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control gcar" id="gcar" name="gcar">
                            <input type="hidden" class="form-control" id="cd_id" name="cd_id">
                            <input type="hidden" class="form-control" id="type" name="type">
                            <select class="form-control" id="driver_id" name="driver_id" >
                             
                                @foreach($driver as $d)
                                  
                                    <option value= "{{$d->driver_id}}">  {{$d->driver_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                   
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Эхэлсэн огноо</label>
                            <input class="form-control form-control-inline input-medium date-picker" name="sdate" id="sdate"
                            size="16" type="text" value="">
                        
                        </div>
                      
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Дууссан огноо</label>
                            <input class="form-control form-control-inline input-medium date-picker" name="fdate" id="fdate"
                        size="16" type="text" value="">
                        
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
   $(document).ready(function() {
    $('.date-picker').datepicker({ dateFormat: 'dd-mm-yy' });
    
});
       $('.select2').select2();
     $('#mark_id').change(function() {
        var item=$(this).val();
        console.log(item);
    
        $.get('modelfill/'+item,function(data){
            console.log(data);
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
<script>
      function carClicked(carid) {
        $( "#profile-tab" ).removeClass("disabled disabledTab");
        $( "#driver-tab" ).removeClass("disabled disabledTab");
        $( "#contact-tab" ).removeClass("disabled disabledTab");
        $('#profile-tab').trigger('click');

        
        getcar(carid);
        getcardrivers(carid);
        getcarproducts(carid);
        getcarrepairs(carid);
    }
        function getcar($id){
            console.log($id);
            $('#gcar').val($id);
            $('#pcar').val($id);
            $('#rcar').val($id);
            $.get('carfill/'+$id,function(data){
            $(".main tbody").empty();
            $("#drivertable tbody").empty();
            $("#repairtable tbody").empty();
            $("#producttable tbody").empty();
            $.each(data,function(i,qwe){

               
                var sHtml = " <tr class='table-row' >" +

                    "   <td class='m1'>" + qwe.vtypename + "</td>" +
                    "   <td class='m1'>" + qwe.parkname + "</td>" +
                    "   <td class='m1'>" + qwe.carno + "</td>" +
                    "   <td class='m1'>" + qwe.vinno+ "</td>" +
                    "   <td class='m1'>" + qwe.mark_name + "</td>" +
                    "   <td class='m1'>" + qwe.model_name+ "</td>" +
                    "   <td class='m1'>" + qwe.manuyear+ "</td>" +
                    "   <td class='m1'>" +  qwe.enginecc + " - "+ qwe.engineid + " - "+ qwe.enginecap + "</td>" +
                    "   <td class='m1'>" + qwe.speedbox_name  + " - "+ qwe.speedtype  + " - "+ qwe.speedcap + "</td>" +
                  
                    "</tr>";

                $("#drivertable tbody").append(sHtml);
                $("#repairtable tbody").append(sHtml);
                $("#producttable tbody").append(sHtml);
              

            });

        });
    }
   
    $('#home-tab').on('click',function(){
        $( "#profile-tab" ).addClass("disabled disabledTab");
        $( "#driver-tab" ).addClass("disabled disabledTab");
        $( "#contact-tab" ).addClass("disabled disabledTab");
    });
   
</script>
@include('layouts.sc_driver')
@include('layouts.sc_product')
@include('layouts.sc_repair')
@endsection