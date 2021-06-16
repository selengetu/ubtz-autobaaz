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
                                $('#mark').val(qwe.mark);
                                $('#model_id').val(qwe.model);
                                $('#carno').val(qwe.carno);
                                $('#vinno').val(qwe.vinno);
                                $('#enginecc').val(qwe.enginecc);
                                $('#engineid').val(qwe.engineid);;
                                $('#enginecap').val(qwe.enginecap);
                                $('#enginetype').val(qwe.enginetype);
                                $('#oil_id').val(qwe.speedid);
                                $('#colour').val(qwe.colour_id);
                                $('#vtypecode').val(qwe.vtypecode);
                                $('#manuyear').val(qwe.manuyear);
                                $('#speedbox').val(qwe.speedbox);
                                $('#speedtype').val(qwe.speedtype);
                                $('#speedcap').val(qwe.speedcap);
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
    </script>
       