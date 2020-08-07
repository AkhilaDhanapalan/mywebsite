$(document).ready(function(){
    $("#reg_edit_btn").prop('disabled', true);
    $("#reg_del_btn").prop('disabled', true);
    reg_list_details_load();
    $("#txtregid").hide();
    

   var ctrl_name="select_country";
   var ctrl_name_state="select_state";
   var varselectedCountry;
   var genderedit;
    $("#div_country").load('../controller/mycontroller.php',
    {action:'select_reg_country',ctrl_name:ctrl_name},function(){ 
        $("#select_country").change(function(){
            var selectedCountry = $("#select_country option:selected").val();
            // alert(selectedCountry);
            $("#div_state").load('../controller/mycontroller.php',
            {action:'select_reg_state',ctrl_name_state:ctrl_name_state,varselectedCountry:selectedCountry},function(){ 
        
            });
        });
        
    
    });
    $("#reg_submit").click(function(){
        var fname=$("#txtfname").val();
        var lname=$("#txtlname").val();
        var address=$("#txtaddress").val();
        var contact=$("#txt_contact").val();
        var sex=$("input[name='radio_sex']:checked").val();
        var country=$("#select_country").val();
        var state=$("#select_state").val();
        var pincode=$("#txt_pin").val();
        var email=$("#txt_email").val();
        var pwd=$("#txt_pwd").val();
        var conf_pwd=$("#re_pwd").val();

        $.post("../controller/mycontroller.php",{action:"insertUserDetails",'fname': fname,'lname':lname,'address':address,'contact':contact,'sex':sex,'country':country,'state':state,'pincode':pincode,'email':email,'pwd':pwd},function(result){
            //alert(result);
            //console.log(result);
            //$("#reg_list_display").remove();
            $("#reg_list_display").dataTable().fnDestroy()
            reg_list_details_load();
     });
     
       // $("#div_state").load('../controller/mycontroller.php',
       // {action:'select_reg_state',ctrl_name_state:ctrl_name_state,varselectedCountry:selectedCountry},function(){ 
   
       // });
   });
   function reg_list_details_load(){
    
                    $('#reg_list_display').DataTable({
                    "ajax": {
                             'type': 'POST',
                             'url': '../controller/mycontroller.php',
                             'data': {
                                 
                                action: 'regDisplayList',
                               
                             }
                         },
                       "columns": [
                            { "data": "reg_id" },
                            { "data": "reg_fname" },
                            { "data": "reg_lname" },
                            { "data": "reg_address" },
                            { "data": "reg_num" },
                            { "data": "reg_sex" },
                            { "data": "reg_country" },
                            { "data": "country_name" },
                            { "data": "reg_state" },
                            { "data": "state_name" },
                            { "data": "reg_pin" },
                            { "data": "reg_email" },
                            { "data": "reg_date" }
                                ]
                  });
    }
    $('#reg_list_display').on( 'click', 'tr', function () {
        // alert("hai");
        $("#div_pwd").hide();
        $("#div_repwd").hide();
				
        if ( $(this).hasClass('highlighted') ) {
                $(this).removeClass('highlighted');
            }
            else {
                $('tr.highlighted').removeClass('highlighted');
                $(this).addClass('highlighted');
                
                }
                
                $("#reg_submit").prop('disabled', true);
                $("#reg_edit_btn").prop('disabled', false);
                $("#reg_del_btn").prop('disabled', false);
                
            //alert(this.id);
                var tableData = $(this).children("td").map(function() {
                    return $(this).text();
                }).get();
                $("#div_state").load('../controller/mycontroller.php',
            {action:'select_reg_state',ctrl_name_state:ctrl_name_state,varselectedCountry:tableData[6]},function(){ 
                
               $("#"+ctrl_name_state).val(tableData[8]);
            });
                console.log(tableData);
                $("#txtregid").val(tableData[0]);
                
                $("#txtfname").val(tableData[1]);
                $("#txtlname").val(tableData[2]);
                $("#txtaddress").val(tableData[3]);
                $("#txt_contact").val(tableData[4]);
                genderedit=tableData[5];
                                     if(genderedit=="Female") {
                                                $('#radio_female').prop('checked',true);
                                     }
                                     else{
                                                $('#radio_male').prop('checked',true);
                                     }
                
               $("#select_country").val(tableData[6]);
                $("#txt_pin").val(tableData[10]);
                $("#txt_email").val(tableData[11]);
                
                
        });

        $("#reg_edit_btn").click(function(){
            //alert("edit data");
            var editfname=$("#txtfname").val();
            var editlname=$("#txtlname").val();
            var editaddress=$("#txtaddress").val();
            var editcontact=$("#txt_contact").val();
            //alert(editcontact);
            var editsex=$("input[name='radio_sex']:checked").val();
            var editcountry=$("#select_country").val();
            var editstate=$("#select_state").val();
            var editpincode=$("#txt_pin").val();
            var editemail=$("#txt_email").val();
            var editregid=$("#txtregid").val();
            //var conf_pwd=$("#re_pwd").val();
    
            $.post("../controller/mycontroller.php",{action:"insertEditUserDetails",'editfname': editfname,'editlname':editlname,'editaddress':editaddress,'editcontact':editcontact,'editsex':editsex,'editcountry':editcountry,'editstate':editstate,'editpincode':editpincode,'editemail':editemail,'editregid':editregid},function(result){
                //alert(result);
                console.log(result);
                //$("#reg_list_display").remove();
                $("#reg_list_display").dataTable().fnDestroy()
                reg_list_details_load();
            });
        });

    $("#reg_del_btn").click(function(){
    
        var delregid=$("#txtregid").val();
        $.post("../controller/mycontroller.php",{action:"deleteUserDetails",'delregid': delregid},function(result){
            $("#reg_list_display").dataTable().fnDestroy()
            reg_list_details_load();
        });
     
    });
   
});