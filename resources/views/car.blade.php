@extends('layouts.parent')

@section('style')
<style>
    .disabledTab {
        pointer-events: none;
    }
    span{
        cursor: pointer;
    }
    .gradient-seperator {
    width: 20%;
    height: 4px;
    position: relative;
    background-image: linear-gradient(to right, rgba(66, 247, 139, 0.78), #1352a3 104%);
    margin: 20px auto 15px;
    border-radius: 2px;
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
            <a href="#" class="btn waves-effect waves-light btn btn-info pull-right hidden-sm-down" data-toggle="modal" id="addcar"
                data-target="#exampleModal" > <i class="fa fa-plus" aria-hidden="true"></i> Тээврийн хэрэгсэл бүртгэх</a>
        </div>
    </div>

   
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Тээврийн хэрэгсэл</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled disabledTab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Дэлгэрэнгүй </a>
            </li>
          
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                
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
                                      <div class="form-group col-md-3">
                                        <label for="inputEmail4">Парк </label>
                                        <select class="form-control" id="s_parkid" name="s_parkid" onchange="javascript:location.href = 'filter_park/'+this.value;">
                                            <option value= "0">  Бүгд</option>
                                          @foreach($park as $p)
                                            
                                              <option value= "{{$p->parkid}}" @if($p->parkid==$s_parkid) selected @endif>  {{$p->parkname}}</option>
                                            
                                          @endforeach
                                      </select>
                                      </div>
                                      <div class="form-group col-md-3">
                                        <label for="inputEmail4">Төлөв </label>
                                        <select class="form-control" id="s_parkid" name="s_parkid" onchange="javascript:location.href = 'filter_park/'+this.value;">
                                            <option value= "0">  Бүгд</option>
                                            <option value= "1">  Хэвийн</option>
                                            <option value= "2">  Засвар дөхсөн</option>
                                            <option value= "3"> Засвар хийх шаардлагатай</option>
                                      </select>
                                      </div>
                                  </div>
                                <div class="table-responsive m-t-1 no-wrap">
                                    <table class="table table-bordered table-striped" id="example"
                                        style="font-size:12px; color:black; word-wrap:break-word;">
                                        <thead style="background-color:#1890ff; color:#fff; font-size: 12px;">
                                            <tr>
                                                <th>№</th>
                                                <th>Улсын дугаар</th>
                                                <th>Төрөл </th>
                                                <th>Парк</th>
                                                <th>Арлын дугаар</th>
                                                <th>Марк</th>
                                                <th>Модель</th>
                                                <th>Үйлдвэрлэсэн он</th>
                                                <th>Км</th>
                                                <th></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach($car as $c)
                                                <tr>
                                                    <td>{{$no}}</td>
                                                    <td>{{$c->carno}} @if($c->carid == 2 or $c->carid == 4) <img src="{{ url('/assets/images/red.png') }}" style="width: 15px;" data-toggle="tooltip" data-placement="top" title="Засвар хийх хэрэгтэй" /> @elseif($c->carid == 7) <img src="{{ url('/assets/images/yellow.png') }}" style="width: 15px;" data-toggle="tooltip" data-placement="top" title="Хугацаа дөхсөн" /> @endif</td>
                                                    <td>{{$c->vtypename}}</td>
                                                    <td>{{$c->parkname}}</td>
                                                    <td>{{$c->vinno}}</td>
                                                    <td>{{$c->mark_name}}</td>
                                                    <td>{{$c->model_name}}</td>
                                                    <td>{{$c->manuyear}}</td>
                                                    <td>{{$c->carkm}}</td>
                                                    <td><button onclick="carClicked({{$c->carid}})" data-id="{{$c->carid}}" tag="{{$c->carid}}" class="btn btn-info btn-sm process"> <i class="fa fa-plus" style="color: rgb(255, 255, 255);"></i></button>
                                                        <button class='btn btn-sm btn-warning update' data-toggle='modal' data-target='#exampleModal' data-id="{{$c->carid}}" tag='{{$c->carid}}' onclick="updatecar({{$c->carid}})"><i class="fa fa-pencil-square-o" style="color: rgb(255, 255, 255); "></i></button> </td>
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
                                <div class="col-md-4">
                                <div class="card text-white bg-info">
                                    <div class="card-header"><b>ТЭЭВРИЙН ХЭРЭГСЭЛ</b></div>
                                    <div class="card-body">
                                       
                                        <p class="card-text">УЛСЫН ДУГААР: <span id="carnum" style="color:#00008B"></span></p>
                                        <p class="card-text">ЗАГВАР: <span id="carbrand" style="color:#00008B"></span></p>
                                        <p class="card-text">ҮЙЛДВЭРЛЭСЭН ОН:  <span id="cardate" style="color:#00008B"></span></p>
                                         </div>
                                    </div>
                                    <div class="sidebar">
                                        @if (Auth::check())
                                            <div class="block clearfix">
                                                <nav>
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;" onclick= "getdiv('producttable')">
                                                                <img src="{{ url('/assets/images/car.png') }}" style="width: 20px;" class="mr-2" />
                                                                <span id ="sp_producttable" class="sphidden">  Профайл мэдээлэл </span> 
                                                                <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_producttable" style="width: 20px;"
                                                                    class="mr-2" />
                                                        
                                                            </a>
                                                        </li> 
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;"  onclick= "getdiv('carprotable')">
                                                                <img src="{{ url('/assets/images/engine.png') }}" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <span id ="sp_carprotable"  class="sphidden"> Эд анги </span>
                                                        
                                                                    <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_carprotable" style="width: 20px;"
                                                                    class="mr-2" />
                                                         
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;"  onclick= "getdiv('carhudtable')">
                                                                <img src="{{ url('/assets/images/wheel.png') }}" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <span id ="sp_cartostable"  class="sphidden">    Хөдөлгүүр </span>
                                                        
                                                                    <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_carhudtable" style="width: 20px;"
                                                                    class="mr-2" />
                                                         
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;" onclick= "getdiv('cartostable')">
                                                                <img src="{{ url('/assets/images/oil.png') }}" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <span id ="sp_cartostable"  class="sphidden"> Хурдны хайрцаг </span>
                                                                    <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_cartostable" style="width: 20px;"
                                                                    class="mr-2" />
                                                         
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;" onclick= " getdiv('carrepairtable')"; > 
                                                                <img src="{{ url('/assets/images/repair.png') }}" style="width: 20px;"
                                                                    class="mr-2" />
                                                               <span id ="sp_carrepairtable"  class="sphidden"> Техник үйлчилгээ  </span>
                                                               <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_carrepairtable" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <div class="gradient-seperator" style="margin: 0 auto 0 70px;"></div>
                                                         
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" style="color:#404142;" onclick= "getdiv('cardrivertable')">
                                                                <img src="{{ url('/assets/images/driver.png') }}" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <span id="sp_cardrivertable"  class="sphidden">  Жолооч</span>  <img src="{{ url('/assets/images/arrow.png') }}" class="hiddenarrow" id ="arrow_cardrivertable" style="width: 20px;"
                                                                    class="mr-2" />
                                                                    <div class="gradient-seperator" style="margin: 0 auto 0 70px;"></div>
                                                         
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        @endif
                                  
                                    </div>
                                </div>
                          <div class="col-md-8">
                  
                                    <table class="table table-bordered main hiddentable"
                                        style="font-size:12px; color:black; word-wrap:break-word; display:none" id="producttable">
                                        <thead style="background-color:#20aee3; color:#fff; font-size: 12px;">
                                            <tr>
                                              
                                                <th>Төрөл </th>
                                                <th>Парк</th>
                                                <th>Улсын дугаар</th>
                                                <th>Арлын дугаар</th>
                                                <th>Марк</th>
                                                <th>Модель</th>
                                                <th>Үйлдвэрлэсэн он</th>
                                                
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                        
                                    <table class="table table-bordered vm hiddentable"
                             style="font-size:12px;width:100%; color:black; word-wrap:break-word; display:none;" id="carprotable">
                             <thead style="background-color: #20aee3; color:#fff; font-size: 12px;" >
                                 <tr>

                                <th>Эд анги</th>  
                                <th>Марк </th>  
                                <th>№</th>
                                <th>Км</th>
                                <th>Норм</th>
                                <th><a href="#" id="addproduct" class="btn btn-sm waves-effect waves-light btn btn-info  hidden-sm-down" data-toggle="modal" data-target="#productModal"> <i class="fa fa-plus" aria-hidden="true"></i> </a></th>
                                </tr>
                             </thead>
                            <tbody>
                            </tbody>
                         </table>
                             
                             <table class="table table-bordered vm hiddentable"
                             style="font-size:12px;width:100%; color:black; word-wrap:break-word; display:none;" id="cartostable">
                             <thead style="background-color: #20aee3; color:#fff; font-size: 12px;" >
                                 <tr>

                                <th>Хурдны хайрцаг</th>  
                                <th>Төрөл </th>  
                                <th>Багтаамж</th>
                                <th>№</th>
                                <th> </th>
                                </tr>
                             </thead>
                            <tbody>
                            </tbody>
                         </table>
                            
                         <table class="table table-bordered vm hiddentable"
                             style="font-size:12px;width:100%; color:black; word-wrap:break-word; display:none;" id="carhudtable">
                             <thead style="background-color: #20aee3; color:#fff; font-size: 12px;" >
                                 <tr>
                                     <th>Хөдөлгүүр</th>
                                     <th>Хөдөлгүүрийн төрөл</th>
                                     <th>Хөдөлгүүрийн марк</th>
                                     <th>Хөдөлгүүрийн тосны №</th>
                                     <th>Тосны багтаамж</th>
                                     <th> </th>
                                 </tr>
                             </thead>
                            <tbody>
                            </tbody>
                         </table>
                         
                       
                                    
                             <table class="table table-bordered vm hiddentable" id="cardrivertable"
                         style="font-size:12px;width:100%; color:black; word-wrap:break-word; display:none" >
                         <thead style="background-color:#20aee3;color:#fff; font-size: 12px;">
                             <tr>
                                 <th>Нэр</th>
                                 <th>Ангилал</th>
                                 <th>Мэргэшсэн</th>
                                 <th>Эхэлсэн огноо </th>
                                 <th>Дууссан огноо</th>
                                 <th> <a href="#" id="adddriver" class="btn waves-effect waves-light btn btn-sm btn-info hidden-sm-down" data-toggle="modal" data-target="#driverModal"> <i class="fa fa-plus" aria-hidden="true"></i></a></th>
                             </tr>
                         </thead>
                         <tbody>
                         </tbody>
                     </table>
                              
                               
                          
                                    
                             <table class="table table-bordered vm hiddentable" id="carrepairtable"
                             style="font-size:12px;width:100%; color:black; word-wrap:break-word; display:none">
                             <thead style="background-color:#20aee3; color:#fff; font-size: 12px;"  >
                                 <tr>
                                     <th>Огноо</th>
                                     <th>Эд анги</th>
                                     <th>Явсан км</th>
                                     <th>Тайлбар</th>
                                     <th>Жолооч</th>
                                     <th><a href="#" id="addrepair" class="btn btn-sm waves-effect waves-light btn btn-info  hidden-sm-down" data-toggle="modal" data-target="#repairModal"> <i class="fa fa-plus" aria-hidden="true"></i> </a></th>
                                 </tr>
                             </thead>
                             <tbody>
                             </tbody>
                         </table>
                              
                         
                            </div>
                        
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
                    <h5 class="modal-title" id="modal-title4">Тээврийн хэрэгсэл бүртгэх цонх</h5>
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
                            <label for="inputAddress">Явсан км</label>
                            <input type="number" class="form-control" id="carkm" name="carkm" maxlength="10">
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-md-5">
                        <button type="button" class="btn btn-danger delete " onclick="deletecar()">Устгах</button>
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
                    <h5 class="modal-title3" id="modal-title3">Техник үйлчилгээ бүртгэх цонх</h5>
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
 
                            <select class="form-control" id="rproduct_id" name="rproduct_id" >
                             
                                @foreach($product as $p)
                                  
                                    <option value= "{{$p->product_id}}">  {{$p->product_name}}</option>
                                  
                                @endforeach
                            </select>
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Явсан км</label>
                            <input type="number" class="form-control" id="repair_km" name="repair_km" step="0.01">
                        
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputAddress">Хийгдсэн үйлчилгээ</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="text" class="form-control" id="repair_comment" name="repair_comment" maxlength="100">
                        
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
                        <button type="button" class="btn btn-danger delete" onclick="deleterepair()">Устгах</button>
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
                            <label for="inputAddress">Эд ангийн марк</label>
                            <input type="text" class="form-control" id="model_ud" name="model_ud">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Эд ангийн №</label>
                            <input type="number" class="form-control" id="cp_num" name="cp_num" maxlength="10">
                        
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Явсан км</label>
                            <input type="number" class="form-control" id="km" name="km" maxlength="10">
                        
                        </div>
                      
                     
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="col-md-5">
                        <button type="button" class="btn btn-danger delete" onclick="deleteproduct()">Устгах</button>
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
                        <button type="button" class="btn btn-danger" onclick="deletedriver()">Устгах</button>
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
<div class="modal fade " id="tosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formtos" method="post">
                <div class="modal-header">
                    <h5 class="modal-title1" id="modal-title1">Хурдны хайрцаг засварлах цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">

                    <div class="form-group col-md-4">
                            <label for="inputAddress">Хурдны хайрцаг</label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" class="form-control" id="ct_id" name="ct_id" placeholder="">
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
                        <div class="form-group col-md-4">
                            <label for="inputAddress">Тосны №</label>
                            <input type="number" class="form-control" id="speedid" name="speedid" maxlength="4" step="0.01">
                        
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                  
                    <div class="col-md-7" style="display: inline-block; text-align: right;" >
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Хаах</button>
                        <button type="submit" class="btn btn-primary">Хадгалах</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade " id="hudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="formhud" method="post" >
                <div class="modal-header">
                    <h5 class="modal-title1" id="modal-title1">Хөдөлгүүр засварлах цонх</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row">
                    <div class="form-group col-md-4">
                            <label for="inputAddress">Хөдөлгүүр
                            </label>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <select class="form-control" id="enginemaintype" name="enginemaintype" >                        
                                @foreach($engine as $e)
                                    <option value= "{{$e->engine_id}}">  {{$e->engine_name}}</option>
                                @endforeach
                            </select>
                        
                        </div>
                    <div class="form-group col-md-4">
                            <label for="inputAddress">Хөдөлгүүрийн марк</label>
                            <input type="text" class="form-control" id="enginecc" name="enginecc" required>
                            <input type="hidden" class="form-control" id="ch_id" name="ch_id" placeholder="">
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
                    </div>

                </div>
                <div class="modal-footer">
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
getdiv('producttable');
    $('.date-picker').datepicker({ dateFormat: 'dd-mm-yy' });
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
    

        function getdiv(id) {
            $(".hiddenarrow").hide();
            $("#arrow_"+ id +"").show();
            $(".hiddentable").hide();
            $("#"+ id +"").show();
    
        }
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
        getcarpro(carid);
    }
        function getcar($id){
            
            $('#gcar').val($id);
            $('#pcar').val($id);
            $('#rcar').val($id);
            $('#pcar').val($id);
            $.get('carfill/'+$id,function(data){
            $(".main tbody").empty();
            $("#carbrand").empty();
            $("#carnum").empty();
            $("#cardate").empty();
            $("#drivertable tbody").empty();
            $("#repairtable tbody").empty();
            $("#producttable tbody").empty();
            $("#cartostable tbody").empty();
            $("#carprotable tbody").empty();
            $("#carhudtable tbody").empty();
            $.each(data,function(i,qwe){
                console.log(qwe);
               
                var sHtml = " <tr class='table-row' >" +

                    "   <td class='m1'>" + qwe.vtypename + "</td>" +
                    "   <td class='m1'>" + qwe.parkname + "</td>" +
                    "   <td class='m1'>" + qwe.carno + "</td>" +
                    "   <td class='m1'>" + qwe.vinno+ "</td>" +
                    "   <td class='m1'>" + qwe.mark_name + "</td>" +
                    "   <td class='m1'>" + qwe.model_name+ "</td>" +
                    "   <td class='m1'>" + qwe.manuyear+ "</td>" +
                    
                    "</tr>";
                    var sHtml1 = " <tr class='table-row' >" +
                    "   <td class='m1'>" + qwe.speedbox_name + "</td>" +
                    "   <td class='m1'>" + qwe.speedtype + "</td>" +
                    "   <td class='m1'>" + qwe.speedcap + "</td>" +
                    "   <td class='m1'>" + qwe.speedid + "</td>" +
                    "   <td class='m1'><button type='button' class='btn btn-sm btn-primary add' data-toggle='modal' data-target='#tosModal' onclick='updatecar("+qwe.carid+")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>" +
                    "</tr>";
                    var sHtml2 = " <tr class='table-row' >" +

                    "   <td class='m1'>" + qwe.engine_name + "</td>" +
                    "   <td class='m1'>" + qwe.enginecc + "</td>" +
                    "   <td class='m1'>" + qwe.enginetype + "</td>" +
                    "   <td class='m1'>" + qwe.engineid + "</td>" +
                    "   <td class='m1'>" + qwe.enginecap + "</td>" +
                    "   <td class='m1'><button type='button' class='btn btn-sm btn-primary add' data-toggle='modal' data-target='#hudModal' onclick='updatecar("+qwe.carid+")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>" +
                    "</tr>";

                $("#drivertable tbody").append(sHtml);
                $("#repairtable tbody").append(sHtml);
                $("#producttable tbody").append(sHtml);
                $("#cartostable tbody").append(sHtml1);
                $("#carhudtable tbody").append(sHtml2);
                $("#carbrand").append(qwe.mark_name + " - " + qwe.model_name );
                $("#carnum").append(qwe.carno);
                $("#cardate").append(qwe.manuyear);
            });

        });
    }
             
  

    $('#home-tab').on('click',function(){
        $( "#profile-tab" ).addClass("disabled disabledTab");
        $( "#driver-tab" ).addClass("disabled disabledTab");
        $( "#contact-tab" ).addClass("disabled disabledTab");
    });
   
</script>
@include('layouts.sc_car')
@include('layouts.sc_driver')
@include('layouts.sc_product')
@include('layouts.sc_repair')
@endsection