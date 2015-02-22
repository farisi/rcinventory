<?php

/**
 * Salman Farisi (http://ketikan10jari.wordpress.com)
 * Yahoo Messeger : s4lm4ndrake | skype : salmandriva | http://facebook.com/salmandriva
 */
?>
<div class="row">
    <div class="col-12">
        <div class="col-sm-6">
            <div class="widget-content nopadding">
       
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="glyphicon glyphicon-align-justify"></i>									
                        </span>
                        <h5>Info Pegawai</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered table-striped table-hover">
                            <tbody>
                                {data}
                                <tr>
                                    <td>Nik`</td>
                                    <td>{nik}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Nama
                                    </td>
                                    <td>{nama}</td>
                                </tr>
                                <tr>
                                    <td>
                                        Cabang
                                    </td>
                                    <td>
                                        {cabang}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Divisi
                                    </td>
                                    <td
                                        
                                        {divisi}
                                </td>
                            </tr>
                            {/data}
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div> 
        <div class="col-sm-6">
            <div class="widget-content nopadding">
                <div class="widget-box"> 
                    <div class="widget-title">
                        <span class="icon">
                            <i class="glyphicon glyphicon-align-justify"></i>									
                        </span>
                        <h5>User Login</h5>
                    </div>
                    <div class="widget-content">
                        <form action="dataLogin" method="post" class="form-horizontal" id="basic_validate" novalidate="novalidate">
                            <input type="hidden" name="pegawai_id" value="{pegawai_id}">
                            <div class="form-group">                                    
                                <label class="control-label">User Login</label>
                                <div class="controls">
                                    <input type="text" class="form-control input-small" name="userLogin" id="required" id="userLogin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input type="password" class="form-controll input-small" name="password" id="password" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm</label>
                                <div class="controls">
                                    <input class="input-small form-control" name="confirm_password" id="confirm_password" type="password">
                                </div>                                    
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$("#password_validate").validate({
		rules:{
			password:{
				required: true,
				minlength:3,
				maxlength:20
			},
			confirm_password:{
				required:true,
				minlength:3,
				maxlength:20,
				equalTo:"#password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-group').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error');
			$(element).parents('.form-group').addClass('has-success');
		}  
            });
</script>