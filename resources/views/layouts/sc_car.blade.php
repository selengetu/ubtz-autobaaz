<script>
    $('#addcar').on('click',function(){
        var title = document.getElementById("modal-title4");
        $('#q_type').val('1');
        title.innerHTML = "Тээврийн хэрэгсэл бүртгэх цонх";
    
        $('#rproduct_id').val('1');
        $('#repair_date').val('');
        $('#repair_personid').val('1');
        $('#repair_km').val('');
        $('#repair_comment').val('');
        $('.delete').hide();
    
    });
    function deletecar($id){
    
            $.ajax(
                {
                    url: "carrepair/delete/" + $id,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": $id,
                        "_method": 'DELETE',
                    },
                    success: function () {
                        alert('Засвар устгагдлаа');
                    }
    
                });
    
    
                }
                function updatecar($id){
    
                        var title = document.getElementById("modal-title2");
                        title.innerHTML = "Засвар засварлах цонх";
    
                        $('#q_type').val('2');
                      
                        $.get('carrepairfill/'+$id,function(data){
                            $.each(data,function(i,qwe){
    
                                $('#cr_id').val(qwe.cr_id);
                                $('#rcar').val(qwe.car_id);
                                $('#rproduct_id').val(qwe.product_id);
                                $('#repair_comment').val(qwe.repair_comment);
                                $('#repair_km').val(qwe.repair_km);
                                $('#repair_personid').val(qwe.repair_personid);
                                $('#repair_date').val(qwe.repair_date);
                            });
    
                        });
                        $('.delete').show();
                        };
        $('#formcar').submit(function(event){
         
        var itag = $('#r_type').val();
    
        var pcar = $('#rcar').val();
        event.preventDefault();
    
    
        if(itag == 1){
            $.ajax({
                type: 'POST',
                url: 'addcarrepair',
                data: $('form#formrepair').serialize(),
                success: function(){
                    alert('Засвар нэмэгдлээ');
                    getcarrepairs(pcar);
    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                    } else {
                        alert('Unexpected error.');
                    }
                }
            })
    
        }
        if(itag == 2){
            $.ajax({
                type: 'POST',
                url: 'updatecarrepair',
                data: $('form#formrepair').serialize(),
                success: function(){
                    alert('Засвар засварлагдлаа');
                    getcarrepairs(pcar);
    
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                    } else {
                        alert('Unexpected error.');
                    }
                }
            })
    
        }
    
    
    
    });
    function getcarrepairs($id){
        $.get('carrepairsfill/'+$id,function(data){
            $("#carrepairtable tbody").empty();
           
            $.each(data,function(i,qwe){
    
                
                var sHtml = " <tr class='table-row' >" +
    
                    "   <td class='m1'>" + qwe.repair_date + "</td>" +
                    "   <td class='m1'>" + qwe.product_name + "</td>" +
                    "   <td class='m1'>" + qwe.repair_km + "</td>" +
                    "   <td class='m1'>" + qwe.repair_comment+ "</td>" +
                    "   <td class='m1'>" + qwe.driver_name+ "</td>" +
                    "   <td class='m1'><button type='button' class='btn btn-sm btn-primary add' data-toggle='modal' data-target='#repairModal' onclick='updaterepair("+qwe.cr_id+")'><i class='fa fa-pencil' aria-hidden='true'></i></button></td>" +
                    "</tr>";
    
                $("#carrepairtable tbody").append(sHtml);
    
            });
    
        });
    }
    </script>
       