<link rel="stylesheet" href="./css/bootstrap.min.css">
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">      
      <div class="nav-collapse">
        <ul class="nav">

          <!-- here comes the important part -->
 
           <li class="dropdown" id="menu1">
             <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
               Login
                <b class="caret"></b>
             </a>
             <div class="dropdown-menu">
<!--                <form style="margin: 0px" accept-charset="UTF-8" action="/sessions" method="post"> -->
               <form id="login" action="<?php echo $fgmembersite->GetSelfScript(); ?>" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">

               <div style="margin:0;padding:0;display:inline">
               <input name="utf8" type="hidden" value="&#x2713;" />
               <input name="authenticity_token" type="hidden" value="4L/A2ZMYkhTD3IiNDMTuB/fhPRvyCNGEsaZocUUpw40=" />
               </div>
                 <fieldset class='textbox' style="padding:10px">
                   <input style="margin-top: 8px" name="UuserName" type="text" placeholder="Username" id="UuserName"  />
                   <br>
                   <input style="margin-top: 8px" type="password" name='UPswd' placeholder="Passsword" id='UPswd' />
                   <input class="btn-primary" input id="submitButton" type="submit" name="Submit" value="Login" />
                   <br>
                   <a style="margin-top: 8px" href="https://www.facebook.com/dialog/oauth?client_id=861882643830735&amp;redirect_uri=http://www.eventprobe.com/?fbTrue=true">
					<img src="./images/login-button.png" alt="Sign in with Facebook"></a>
                 </fieldset>
               </form>
             </div>
           </li>
 
        </ul>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
		// <![CDATA[
		var frmvalidator  = new Validator("login");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();

		frmvalidator.addValidation("UuserName", "req", "Provide Your Username");

		frmvalidator.addValidation("UPswd", "req", "Provide Your Password");

		// ]]>
	</script>


<script src="./js/jquery-1.11.1.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script language="javascript">
    $('.dropdown-toggle').dropdown();
    $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
      });
</script>