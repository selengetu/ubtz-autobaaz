<script>
                $('#addcar').on('click',function(){
                    var title = document.getElementById("modal-title4");
                    title.innerHTML = "Тээврийн хэрэгсэл бүртгэх цонх";
                            $('#formcar').attr('action', 'addcar');
                            $('#mark').val('1');
                            $('#model_id').val('1');
                            $('#carno').val('');
                            $('#vinno').val('');
                            $('#enginecc').val('');
                            $('#engineid').val('1');
                            $('#enginecap').val('1');
                            $('#enginetype').val('');
                            $('#oil_id').val('');
                            $('#colour').val('');
                            $('#vtypecode').val('1');
                            $('#manuyear').val('1');
                            $('#speedbox').val('');
                            $('#speedtype').val('');
                            $('#speedcap').val('');
                            $('.delete').hide();
                
                });

                function updatecar($id){
    
                        var title = document.getElementById("modal-title4");
                        title.innerHTML = "Тээврийн хэрэгсэл засварлах цонх";
                        $('#formcar').attr('action', 'updatecar');
                        $.get('carfill/'+$id,function(data){
                            $.each(data,function(i,qwe){
                                $('#car_id').val(qwe.carid);
                                $('#ct_id').val(qwe.carid);
                                $('#ch_id').val(qwe.carid);
                                $('#mark').val(qwe.mark);
                                $('#model_id').val(qwe.model);
                                $('#carno').val(qwe.carno);
                                $('#vinno').val(qwe.vinno);
                                $('#enginecc').val(qwe.enginecc);
                                $('#engineid').val(qwe.engineid);;
                                $('#enginecap').val(qwe.enginecap);
                                $('#enginetype').val(qwe.enginetype);
                                $('#colour').val(qwe.colour_id);
                                $('#vtypecode').val(qwe.vtypecode);
                                $('#manuyear').val(qwe.manuyear);
                                $('#speedmaintype').val(qwe.speedmaintype);
                                $('#speedbox').val(qwe.speedbox);
                                $('#speedtype').val(qwe.speedtype);
                                $('#speedcap').val(qwe.speedcap);
                                $('#speedid').val(qwe.speedid);
                            });
    
                        });
                        $('.delete').show();
                        };
                        function deletecar(){
                                var itag =  $('#car_id').val();
                            
                                $.ajax(
                                    {
                                        url: "car/delete/" + itag,
                                        type: 'GET',
                                        dataType: "JSON",
                                       

                                    });
                                    location.reload();

            }
        $('#formhud').submit(function(event){
         var pcar = $('#ch_id').val();
         event.preventDefault();

             $.ajax({
                 type: 'POST',
                 url: 'updatehud',
                 data: $('form#formhud').serialize(),
                 success: function(){
                     alert('Мэдээлэл засварлагдлаа');
                     getcar(pcar);
     
                 },
                 error: function (jqXHR, textStatus, errorThrown) {
                     if (jqXHR.status == 500) {
                         alert('Internal error: ' + jqXHR.responseText);
                     } else {
                         alert('Unexpected error.');
                     }
                 }
             }) 
     });
     $('#formtos').submit(function(event){
         var pcar = $('#ct_id').val();
         event.preventDefault();

             $.ajax({
                 type: 'POST',
                 url: 'updatetos',
                 data: $('form#formtos').serialize(),
                 success: function(){
                     alert('Мэдээлэл засварлагдлаа');
                     getcar(pcar);
     
                 },
                 error: function (jqXHR, textStatus, errorThrown) {
                     if (jqXHR.status == 500) {
                         alert('Internal error: ' + jqXHR.responseText);
                     } else {
                         alert('Unexpected error.');
                     }
                 }
             }) 
     });
    </script>
       